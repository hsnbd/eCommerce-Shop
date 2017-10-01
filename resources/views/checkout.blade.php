@extends('master')
@section('content')
    <style>
        .checkout {
            padding: 90px 0;
            background: #fff;

        }
    </style>

<!-- //banner-top -->
<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3>Check Out</h3>
    </div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
    <div class="container">
        <h3>My Shopping Bag</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                {{csrf_field()}}
                @php
                    $regular_price = 0;
                    $actual_price = 0;
                @endphp
                @foreach($product as $pdt)

                <tr class="rem1">
                    <td class="invert-closeb">
                        <div class="rem">
                            <div class="close1" id="close{{$pdt->id}}" style="left: 25%;"> </div>
                        </div>
                    </td>
                    <td class="invert-image">
                        <a href="">
                            @if($pdt->default_picture == "1" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}"))
                                <img  class="pro-image-front" src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture1}}" style="width: 100px;"  />
                            @elseif($pdt->default_picture == "2" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture2}"))
                                <img  class="pro-image-front" src="{{url('/')}}/images/product/product-2-{{$pdt->id}}.{{$pdt->picture2}}" style="width: 100px;" />
                            @elseif($pdt->default_picture == "3" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture3}"))
                                <img  class="pro-image-front" src="{{url('/')}}/images/product/product-3-{{$pdt->id}}.{{$pdt->picture3}}" style="width: 100px;" />
                            @elseif(file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}"))
                                <img  class="pro-image-front" src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture1}}" style="width: 100px;" />
                            @elseif(file_exists("images/product/product-2-{$pdt->id}.{$pdt->picture2}"))
                                <img  class="pro-image-front" src="{{url('/')}}/images/product/product-2-{{$pdt->id}}.{{$pdt->picture2}}"  style="width: 100px;"/>
                            @elseif(file_exists("images/product/product-3-{$pdt->id}.{$pdt->picture3}"))
                                <img  class="pro-image-front" src="{{url('/')}}/images/product/product-3-{{$pdt->id}}.{{$pdt->picture3}}" style="width: 100px;" />
                            @else
                                <img  class="pro-image-front" src="{{url('/')}}/images/no-images.jpg" style="width: 100px;"  />
                            @endif
                        </a>
                    </td>
                    <td class="invert">
                        <div class="quantity" style="width: 150px;">
                            <div class="quantity-select">
                                {{csrf_field()}}

                                <div id="minus{{$pdt->id}}" class="entry value-minus minus">&nbsp;</div>
                                @php
                                $spdtid = Session::get('pdtid');
                                $sqtyid = session::get('qtyid');
                                $index = array_search($pdt->id,$spdtid);
                                @endphp
                                <div id="entry{{$pdt->id}}" class="entry value"><span>{{$sqtyid[$index]}}</span></div>
                                <div id="plus{{$pdt->id}}" class="entry value-plus active plus"></div>
                                <div id="change{{$pdt->id}}" class="btn btn-warning change" style="margin-top: 10px;">Change</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">{{$pdt->title}}</td>
                    <td class="invert">
                        Price <div id="pprice{{$pdt->id}}"><span>৳{{PriceCal($pdt->price,$pdt->vat,0)}}
                                @php
                                    $actual_price += PriceCal($pdt->price,$pdt->vat,$pdt->discount) * $sqtyid[$index];
                                    $regular_price += PriceCal($pdt->price,$pdt->vat,0) * $sqtyid[$index];
                                @endphp

                            </span></div>
                        <p>Vat: {{$pdt->vat}}%</p>
                        <p>Dis: {{$pdt->discount}}%</p>
                    </td>
                    <td>
                        Total  <div id="subtotal{{$pdt->id}}">৳<span>{{PriceCal($pdt->price,$pdt->vat,$pdt->discount)*$sqtyid[$index]}}</span></div>
                        <div id="subtotal_descount{{$pdt->id}}">৳<del>{{PriceCal($pdt->price,$pdt->vat,0)*$sqtyid[$index]}}</del></div>
                    </td>
                </tr>
                @endforeach

            @php
                /*
               Session::flush("pdtid");
               Session::flush("qtyid");
               Session::flush("totalPrice");
               Session::flush("stitle");
               Session::flush("spicture");
               */

                //print_r(Session::get("pdtid"));
                //print_r(Session::get("qtyid"));
            @endphp
                <!--quantity-->
                <!--quantity-->
            </table>
        </div>
        <div class="checkout-left">
            @if(Auth::check())
                <form action="{{url('purchase/confirm')}}" method="post" class="col-md-4">
                    {{csrf_field()}}
                    <input type="hidden" name="shippingid" id="shippingid" value="0" />
                    <div class="form-group">

                        <input type="radio" checked="" name="choice" value="1" />
                        <label for="choice" >New Address</label>
                    </div>
                    <div class="form-group">

                        <input type="radio"  name="choice" value="2" />
                        <label for="choice" >Existing Address</label>
                    </div>


                    <div id="new-address" >
                        <div class="form-group ">
                            <label for="name" >Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" />
                        </div>
                        <div class="form-group ">
                            <label for="address">Address</label>
                            <input type="text" class="form-control " name="address" placeholder="Address" />
                        </div>
                        <div class="form-group ">
                            <label for="contact">Contact</label>
                            <input type="text" name="contact" class="form-control " placeholder="Contact Number" />
                        </div>
                    </div>
                    <div id="existing-address">
                    </div>
                    <input class="btn btn-warning" type="submit" value="Save" />
                </form>

                <script>
                    $(document).ready(function() {

                        $("#existing-address").hide();
                        $('input[name=choice]').change(function() {
                            var val = $('input[name=choice]:checked').val();
                            if (val == 1) {
                                $("#new-address").show();
                                $("#existing-address").hide();
                            }
                            else {
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('shipping.existing_address')}}",
                                    data: {
                                        '_token': $('input[name=_token]').val()
                                    },
                                    success: function(data) {
                                        $("#existing-address").html(data);
                                    }
                                });

                                $("#new-address").hide();
                                $("#existing-address").show();
                            }
                        });
                        $(document).on('click', '.existing_address_box', function (e) {

                            $("#shippingid").val($(this).attr("id"));
                        });
                        $(document).on('click', '.existing_address_box', function (e) {
                            $('.existing_address_box').removeClass('active')
                            $(this).addClass('active');
                        });
                    });
                </script>
                @else
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-warning">
                                    Login
                                </button>
                                <a>
                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}"> --}}
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                @endif

            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>Shopping basket</h4>

                <ul>
                    <li>Total Price <i>-</i>  ৳ <span id="regular_price">{{$regular_price}}</span></li>
                    <li>Discount  <i>-</i> ৳ <span id="total_discount">{{$regular_price - $actual_price}}</span></li>
                    <li>Grand Total <i>-</i> ৳ <span id="grand_total"> {{$actual_price}}</span></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //check out -->
<!-- //product-nav -->
    <script>
        $(document).ready(function () {
            $(document).on('click','.plus',function (e) {
                var ids = $(this).attr('id');
                ids = ids.substr(4);
                var qty = $('#entry'+ids).text();
                qty++;
                $('#entry'+ids).text(qty);
            });
            $(document).on('click','.minus',function () {
               var ids = $(this).attr('id');
               ids = ids.substr(5);
               var qty = $('#entry'+ids).text();
               if(qty >1){
                   qty--;
               }
               $('#entry'+ids).text(qty);
            });
            $(document).on('click','.change',function () {
                var ids = $(this).attr('id');
                ids = ids.substr(6);
                var regPrice = $('#regular_price').text();
                var qty = $('#entry'+ids).text();
                $.ajax({
                    type:"POST",
                    url: "{{route('cart.update.checkout')}}",
                    data:{
                        'pid': ids,
                        'qty': qty,
                        'regular_price': regPrice,
                        '_token': $('input[name=_token]').val()
                    },
                    success:function (data) {
                        alert(data['msg']);
                        if(data['status'] == 2){
                            $('#totalAmount').text(data['Total']);
                            $('#qty-'+ids).text(qty);
                            $('#subtotal'+ids).text(data['subtotal']);
                            $('#subtotal_descount'+ids).text(data['subtotal-del']);
                            $('#regular_price').text(data['regular_price']);
                            $('#total_discount').text(data['discount_price']);
                            $('#grand_total').text(data['Total']);
                        }
                    }
                });

            });

            $(document).on('click','.close1',function () {
                var ids = $(this).attr('id');
                ids = ids.substr(5)
                $(this).parent().parent().parent().hide();
                //alert(ids);
                $.ajax({
                    type:"POST",
                    url:"{{route('cart.remove.checkout')}}",
                    data:{
                        'pid': ids,
                        'regular_price': $('#regular_price').text(),
                        '_token': $('input[name=_token]').val()
                    },
                    success:function (data) {
                        if (data['Total'] > 0) {
                            $('#totalAmount, #grand_total').text(data['Total']);
                            $('#total_discount').text(data['discount_price']);
                            $('#regular_price').text(data['regular_price']);

                            var items = parseInt($('#simpleCart_quantity').text());
                            items--; //minus an items
                            $('#simpleCart_quantity').text(items);
                            $("#item-close" + ids).parent().hide();
                        }
                        else {
                            self.location="<?php echo url('/') ?>";
                        }
                    }
                });
            });
        });


    </script>

@endsection
