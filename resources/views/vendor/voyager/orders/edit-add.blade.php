@extends('voyager::master')

@section('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@if(isset($dataTypeContent->id))
  @section('page_title','Edit '.$dataType->display_name_singular)
@else
  @section('page_title','Add '.$dataType->display_name_singular)
@endif

@section('page_header')
  <h1 class="page-title">
    <i class="{{ $dataType->icon }}"></i> @if(isset($dataTypeContent->id)){{ 'Edit' }}@else{{ 'New' }}@endif {{ $dataType->display_name_singular }}
  </h1>
@stop

@section('content')
  <div class="page-content container-fluid">
    <div class="row">
      <div class="col-md-12">

        <div class="panel panel-bordered">

          <div class="panel-heading">
            <h3 class="panel-title">@if(isset($dataTypeContent->id)){{ 'Edit' }}@else{{ 'Add New' }}@endif {{ $dataType->display_name_singular }}</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form"
                action="@if(isset($dataTypeContent->id)){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->id) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                method="POST" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
          @if(isset($dataTypeContent->id))
            {{ method_field("PUT") }}
          @endif

          <!-- CSRF TOKEN -->
            {{ csrf_field() }}

            <div class="panel-body">

              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

            <!-- If we are editing -->
              @if(isset($dataTypeContent->id))
                    <?php $dataTypeRows = $dataType->editRows; ?>
              @else
                    <?php $dataTypeRows = $dataType->addRows; ?>
              @endif

                <?php
                $order = App\Order::find($dataTypeContent->id);
                $orderDetails = $order->orderDetails;
                ?>

              <div class="row">
                @foreach($orderDetails as $orderItem)
                  <div class="col-md-3">
                    <div class="row">
                      <div class="col-md-6 col-xs-12">
                        <td rowspan="2" class="cart-item-preview">
                          <img class="img-responsive" src="{{ Voyager::image($orderItem->product->thumb_image) }}"
                               alt="gambar-product">
                        </td>
                      </div>

                      <div class="col-md-6 col-xs-12">
                        <td class="cart-item-name">
                          <a target="_blank" href="/detail-coffee/{{$orderItem->product->id}}">{{ $orderItem->product->name }}</a>
                          <p class="cart-item-brew-method">{{ $orderItem->option }}</p>
                        </td>
                        <td class="cart-item-quantity">
                          <p class="cart-item-price-new">{{ $orderItem->quantity }} x
                            Rp. {{ number_format($orderItem->price) }}</p>
                        </td>
                        <td class="cart-item-subtotal">
                          <p class="cart-subtotal">Rp. {{ number_format($orderItem->price * $orderItem->quantity) }}</p>
                        </td>
                        {{--<a href="{{ url('order/delete/'.$orderItem->id) }}" class="btn btn-danger">hapus</a>--}}
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <hr/>
              @foreach($dataTypeRows as $row)
                <div class="form-group col-md-6">
                  <label for="name"><strong>{{ $row->display_name }}</strong></label>
                  @if($row->field == 'status')
                    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                  @else
                    <p>{{$dataTypeContent[$row->field]}}</p>
                  @endif

                  @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                    {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                  @endforeach
                </div>
              @endforeach

            </div><!-- panel-body -->

            <div class="panel-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

          <iframe id="form_target" name="form_target" style="display:none"></iframe>
          <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
            <input name="image" id="upload_file" type="file"
                   onchange="$('#my_form').submit();this.value='';">
            <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
            {{ csrf_field() }}
          </form>

        </div>
      </div>
    </div>
  </div>
@stop

@section('javascript')
  <script>
      $('document').ready(function () {
          $('.toggleswitch').bootstrapToggle();

          $('.side-body input[data-slug-origin]').each(function (i, el) {
              $(el).slugify();
          });
      });
  </script>
  <script src="{{ config('voyager.assets_path') }}/lib/js/tinymce/tinymce.min.js"></script>
  <script src="{{ config('voyager.assets_path') }}/js/voyager_tinymce.js"></script>
  <script src="{{ config('voyager.assets_path') }}/js/slugify.js"></script>
@stop
