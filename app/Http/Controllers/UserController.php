<?php

namespace App\Http\Controllers;

use App\User;
use Mockery\Exception;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class Usercontroller extends Controller
{
    public function saveProfile(Request $request) {
        if (!Auth::check()) {
            return back()->withInput()->with('error', 'Anda tidak berhak menambahkan artikel');
        }

        try {
            $input = $request->all();

            $user = User::find(Auth::user()->id);
            $user->name = $input['lblNama'];
            $user->email = $input['lblEmail'];

            $file = $request->file('lblAvatarFile');

            if (!empty($file)) {
                $filename = Str::random(20);

                $path = 'users'.'/'.date('F').date('Y').'/';
                $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

                $image = Image::make($file)->encode($file->getClientOriginalExtension(), 75);

                Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public');
                $user->avatar = $fullPath;
            }

            if (isset($input['lblChangePassword'])) {
                if (Hash::check($input['lblPassword'], $user->password)) {
                    if ($input['lblNewPassword'] == $input['lblNewPasswordConf']) {
                        $user->password = Hash::make($input['lblNewPassword']);
                    } else {
                        return back()->withInput()->with('error', 'Password baru dan konfirmasi password yang anda masukkan tidak cocok');
                    }
                } else {
                    return back()->withInput()->with('error', 'Password yang anda masukkan salah');
                }
            }

            $user->save();
            return redirect('/customer/edit')->with('status', 'Profile berhasil diubah');
        } catch (Exception $e) {

        }
    }

    public function saveProfileMobile(Request $request) {
        if (!Auth::check()) {
            return back()->withInput()->with('error', 'Anda tidak berhak menambahkan artikel');
        }

        try {
            $input = $request->all();

            $user = User::find(Auth::user()->id);
            $user->name = $input['lblNama'];
            $user->email = $input['lblEmail'];

            $file = $request->file('lblAvatarFile');

            if (!empty($file)) {
                $filename = Str::random(20);

                $path = 'users'.'/'.date('F').date('Y').'/';
                $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

                $image = Image::make($file)->encode($file->getClientOriginalExtension(), 75);

                Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public');
                $user->avatar = $fullPath;
            }

            if (isset($input['lblChangePassword'])) {
                if (Hash::check($input['lblPassword'], $user->password)) {
                    if ($input['lblNewPassword'] == $input['lblNewPasswordConf']) {
                        $user->password = Hash::make($input['lblNewPassword']);
                    } else {
                        return back()->withInput()->with('error', 'Password baru dan konfirmasi password yang anda masukkan tidak cocok');
                    }
                } else {
                    return back()->withInput()->with('error', 'Password yang anda masukkan salah '. $input['lblPassword'] . $user->password);
                }
            }

            $user->save();
            return redirect('/customer/akun')->with('status', 'Profile berhasil diubah');
        } catch (Exception $e) {

        }
    }

    public function savePortfolio(Request $request) {
        $input = $request->all();
        $user = Auth::user();
        $user->portfolio = $input['lblPortfolio'];
        $user->save();

        return redirect('/customer/portfolio')->with('status', 'Profile berhasil diubah');
    }
}
