<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;
use App\Product;
use Cart;
use Auth;
use Carbon\Carbon;
use App\Order;
use DB;
use Indonesia;

class OrderController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function show($orderId) {
        $order = Order::find($orderId);
        return view('frontend.pages.checkout', compact('order'));
    }

    public function showMobile($orderId) {
        $order = Order::find($orderId);
        return view('mobile.pages.checkout', compact('order'));
    }

    public function delete($id) {
        $orderDetail = OrderDetail::find($id);
        $orderDetail->delete();
        return back();
        return redirect()->back();
        return view('frontend.pages.checkout', compact('order'));
    }

    public function getAddressData(Request $request) {
        $input = $request->all();
        switch($input['type']):
            case 'kota':
                $return = '<option value=""></option>';
                $return .= "<option value='' selected>Pilih Kota</option>";
                foreach(Indonesia::findProvince($input['id'], ['cities'])->cities as $row)
                    $return .= "<option value='$row->id'>$row->name</option>";
                return $return;
                break;
            case 'kecamatan':
                $return = '<option value=""></option>';
                $return .= "<option value='' selected>Pilih Kecamatan</option>";
                foreach(Indonesia::findCity($input['id'], ['districts'])->districts     as $row)
                    $return .= "<option value='$row->id'>$row->name</option>";
                return $return;
                break;
        endswitch;
    }

    public function postOrderSummary(Request $request, $id) {
        $input = $request->all();
        $order = Order::find($id);

        if ($order->unique_code == null) {
            $uniqueCodes = Order::where('amount', $order->amount)
                ->where('status', Order::WAITING_PAYMENT)
                ->where('created_at', '>', Carbon::now()->subDays(3))
                ->pluck('unique_code')
                ->toArray();
            $order->unique_code = $this->generateUniqueCode($order->amount, $uniqueCodes);
        }
        $order->transfer_amount = $order->amount + $order->unique_code;
        $order->recipient_name = $input['lblNama'];
        $order->province = Indonesia::findProvince($input['lblProvinsi'])->name;
        $order->city = Indonesia::findCity($input['lblKota'])->name;
        $order->district = Indonesia::findDistrict($input['lblKecamatan'])->name;
        $order->address = $input['lblJalan'] . ', Kode Pos : ' . $input['lblPos'];
        $order->phone_number = $input['lblHp'];

        $order->save();
        return redirect('/order/summary/'.$order->id);
        return view('frontend.pages.pembayaran', compact('order'));
    }

    public function getHistory() {
        $orderHistory = Order::where('user_id', Auth::user()->id)->paginate(10);
        return view('frontend.pages.panelTransaksi', compact('orderHistory'));
    }

    public function getOrderSummary($id) {
        $order = Order::find($id);
        if ($order->user_id != null && $order->user_id != Auth::user()->id) {
            return response()->view('errors.403');
        }
        return view('frontend.pages.pembayaran', compact('order'));
    }

    public function getOrderSummaryMobile($id) {
        $order = Order::find($id);
        if ($order->user_id != null && $order->user_id != Auth::user()->id) {
            return response()->view('errors.403');
        }
        return view('mobile.pages.pembayaran', compact('order'));
    }

    public function paymentConfirmation(Request $request, $id) {
        $order = Order::find($id);
        $input = $request->all();

        $order->bank_account_name = $input['lblSender'];
        $order->confirmation_transfer_amount = $input['lblAmount'];
        $order->status = Order::PAYMENT_CONFIRMED;
        $order->save();
        return redirect('/order/summary/'.$order->id);
    }

    private function generateUniqueCode($amount, $array) {
        $max = (count($array) > 1000 ? 2000 : 1000);
        $arr = array_diff(range(0, $max), $array);
        return array_rand($arr, 1);
    }
}