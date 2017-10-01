@extends('master')
@section('content')
<link rel="stylesheet" href="{{url('/')}}/asset/css/flexslider.css" type="text/css" media="screen" />
<link href="{{url('/')}}/asset/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="{{url('/')}}/asset/js/imagezoom.js"></script>
<script src="{{url('/')}}/asset/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="{{url('/')}}/asset/js/bootstrap-3.1.1.min.js"></script>
<style>
    .bootstrap-tab.animated.wow.slideInUp.animated {
        padding-left: 116px;
    }
    a#add-to-chart:focus {
    display: none;
}
    .checkout {
        background: #fff;
    }
    .add-review input[type="text"], .add-review input[type="email"], .add-review textarea {
        outline: none;
        padding: 10px;
        border: 1px solid #D2D2D2;
        width: 48.35%;
        font-size: 15px;
        color: #FDA30E;
        margin: 0 5px;
        margin-bottom: 22px;
    }
    div#review-store {
        background: #ddd;
        padding: 20px;
        margin-top: 50px;
    }

    .review-style {
        padding: 20px;
        background: #666;
        color: #fff;
        margin:10px;

    }
    .review-style h4,.review-style p {
        color: #fff;
    }
    .review-style:hover {
        background: #333;
    }
</style>


<!-- //banner-top -->
<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3>Single</h3>
    </div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
    <div class="container">
        <div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <!-- FlexSlider -->
                    <script>
// Can also be used with $(document).ready()
$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
});
                    </script>

                    <!-- //FlexSlider-->
                    <ul class="slides">
                        @if(file_exists("images/product/product-1-{$allpdt->id}.{$allpdt->picture1}"))
                        <li data-thumb="{{url('/')}}/images/product/product-1-{{$allpdt->id}}.{{$allpdt->picture1}}">
                            <div class="thumb-image"> <img src="{{url('/')}}/images/product/product-1-{{$allpdt->id}}.{{$allpdt->picture1}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        @endif
                        @if(file_exists("images/product/product-2-{$allpdt->id}.{$allpdt->picture2}"))
                        <li data-thumb="{{url('/')}}/images/product/product-2-{{$allpdt->id}}.{{$allpdt->picture2}}">
                            <div class="thumb-image"> <img src="{{url('/')}}/images/product/product-2-{{$allpdt->id}}.{{$allpdt->picture2}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        @endif
                        @if(file_exists("images/product/product-3-{$allpdt->id}.{$allpdt->picture3}"))
                        <li data-thumb="{{url('/')}}/images/product/product-3-{{$allpdt->id}}.{{$allpdt->picture3}}">
                            <div class="thumb-image"> <img src="{{url('/')}}/images/product/product-3-{{$allpdt->id}}.{{$allpdt->picture3}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        @endif

                    </ul>
                    <div class="clearfix"></div>
                </div>	
            </div>
        </div>

        <div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
            <h3>{{$allpdt->title}}</h3>
            @php 
            $realprice = PriceCal($allpdt->price, $allpdt->vat, 0); 
            $discountprice = PriceCal($allpdt->price, $allpdt->vat, $allpdt->discount); 
            @endphp
            <p>
                <span class="item_price">৳ @php echo $discountprice  @endphp</span>
                @if ($discountprice != $realprice )
                <del>৳ @php echo $realprice @endphp</del>
                @endif

             @php

            $pdtid = Session::get("pdtid");
            $qtyid = Session::get("qtyid");
            
            if($pdtid){
               $index = array_search($allpdt->id,$pdtid);
               if($index !== FALSE){
                $value = $qtyid[$index];
               }else{
                $value = 1;
               }
            }else{
            $value= 1;
            }
            @endphp
            <div style="height:20px;"> </div>
            <div class="quantity"> 
                <div class="quantity-select">   
                    {{csrf_field()}}
                    <input type="hidden" id="ids" value="{{$allpdt->id}}"/>
                    <div id="minus" class="entry value-minus">&nbsp;</div>
                    <div id="entry{{$allpdt->id}}" class="entry value"><span>{{$value}}</span></div>
                    <div id="plus" class="entry value-plus active">&nbsp;</div>
                </div>
            </div>
            <div style="height:20px;"> </div>
           
            
            <div class="occasion-cart">
                <a href="#" id="add-to-chart" class="item_add hvr-outline-out button2">Add to cart</a>
                <a href="#" id="remove-chart{{$allpdt->id}}" class="btn btn-danger remove-btn" <?php echo(isset($index)&& $index !== FALSE) ? "":"style='display:none'" ?>>Remove</a>
            </div>

        </div>
        <div class="clearfix"> </div>

        <div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="bs-examplebs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews({{App\ReviewProduct::where('product_id',$allpdt->id)->count()}})</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                        <h5>Product  Description</h5>
                        <p>{{$allpdt->description}}</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                        <div class="bootstrap-tab-text-grids">
                                    <div class="add-review">
                                        <h4>add a review</h4>
                                        <form id="product-review" method="post" action="{{route('review.product')}}">
                                            {{csrf_field()}}
                                            <input type="text" placeholder="Enter Your Name" id="user-name" required="">
                                            <input type="email" placeholder="Enter Your Email" id="user-email" required="">
                                            <input type="hidden" id="pid" value="{{$allpdt->id}}" >
                                            <textarea type="text" placeholder="Enter Your Message" id="user-message" required=""></textarea>
                                            <input type="submit" value="SEND">
                                        </form>
                                    </div>
                            <script>
                                $(document).ready(function(e){
                                    $(document).on('submit','#product-review',function(e){
                                        e.preventDefault();
                                        var pid =  $('#pid').val();
                                        var name = $('#user-name').val();
                                        var email = $('#user-email').val();
                                        var message = $('#user-message').val();
                                        //alert(msg);
                                        $.ajax({
                                            type:'post',
                                            url: "{{route('review.product')}}",
                                            data:{
                                                'pid' : pid,
                                                'email': email,
                                                'name' : name,
                                                'message' :message,
                                                '_token': $('input[name=_token]').val()
                                            },
                                            success:function(data){
                                                //alert(data);
                                                $('#review-store').append(data);
                                            }
                                        });

                                    });
                                });
                            </script>
                            <div class="container">
                                <div class="row">
                                    @if(App\ReviewProduct::where('product_id',$allpdt->id)->count() != 0)
                                    <div id="review-store" class="col-md-8">
                                        @foreach($allreview as $review)
                                        <div class="review-style">
                                            <h4> <strong>Name: </strong>{{$review->user_name}}</h4>
                                            <p><strong>Message: </strong>{{$review->message}}</p>
                                            <p><strong>Review Time:</strong>{{$review->created_at}}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                        @endif
                                </div>
                            </div>
                            {{$allreview->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="related-product">
<div class="container">
    <div class="row">
        <div class="title">
            <h4>You May Interested Those Product Also !!</h4>
        </div>
        @foreach($allscat as $relpdt)
            @php
                $realprice = PriceCal($relpdt->price, $relpdt->vat, 0) ;
                $discountprice = PriceCal($relpdt->price, $relpdt->vat, $relpdt->discount) ;

            @endphp
            <div class="col-md-3 product-men yes-marg">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">

                        @if($relpdt->default_picture == "1" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture1}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-1-{{$relpdt->id}}.{{$relpdt->picture1}}"  />
                        @elseif($relpdt->default_picture == "2" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture2}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-2-{{$relpdt->id}}.{{$relpdt->picture2}}"  />
                        @elseif($relpdt->default_picture == "3" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture3}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-3-{{$relpdt->id}}.{{$relpdt->picture3}}"  />
                        @elseif(file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture1}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-1-{{$relpdt->id}}.{{$relpdt->picture1}}"  />
                        @elseif(file_exists("images/product/product-2-{$relpdt->id}.{$relpdt->picture2}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-2-{{$relpdt->id}}.{{$relpdt->picture2}}"  />
                        @elseif(file_exists("images/product/product-3-{$relpdt->id}.{$relpdt->picture3}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-3-{{$relpdt->id}}.{{$relpdt->picture3}}"  />
                        @else
                            <img  class="pro-image-front" src="{{url('/')}}/images/no-images.jpg"  />
                        @endif

                        @if($relpdt->default_picture == "1" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture1}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-1-{{$relpdt->id}}.{{$relpdt->picture1}}"  />
                        @elseif($relpdt->default_picture == "2" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture2}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-2-{{$relpdt->id}}.{{$relpdt->picture2}}"  />
                        @elseif($relpdt->default_picture == "3" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture3}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-3-{{$relpdt->id}}.{{$relpdt->picture3}}"  />
                        @elseif(file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture1}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-1-{{$relpdt->id}}.{{$relpdt->picture1}}"  />
                        @elseif(file_exists("images/product/product-2-{$relpdt->id}.{$relpdt->picture2}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-2-{{$relpdt->id}}.{{$relpdt->picture2}}"  />
                        @elseif(file_exists("images/product/product-3-{$relpdt->id}.{$relpdt->picture3}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-3-{{$relpdt->id}}.{{$relpdt->picture3}}"  />
                        @else
                            <img  class="pro-image-back" src="{{url('/')}}/images/no-images.jpg"  />
                        @endif<div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="{{url('/')}}/{{Replace($relpdt->cname)}}/{{Replace($relpdt->scname)}}/{{$relpdt->id}}/{{Replace($relpdt->title)}}" class="link-product-add-cart">Quick View</a>
                            </div>
                        </div>

                    </div>
                    <div class="item-info-product ">
                        <h4><a href="{{url('/')}}/{{Replace($relpdt->cname)}}/{{Replace($relpdt->scname)}}/{{$relpdt->id}}/{{Replace($relpdt->title)}}">{{$relpdt->title}}</a></h4>
                        <div class="info-product-price">
                            <span class="item_price">৳ @php echo $discountprice  @endphp</span>
                            @if ($discountprice != $realprice )
                                <del>৳ @php echo $realprice @endphp</del>
                            @endif
                        </div>
                        <a href="#" id="add-to-chart{{$relpdt->id}}" class="item_add single-item hvr-outline-out home-add-to-cart button2">Add to cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
<script>
    $(document).ready(function (e) {
        $(document).on('click', '#minus', function (e) {
            var ids = $('#ids').val();
            var qnty = $('#entry'+ids).text();
            if(qnty>1){
                qnty--;
            }
            $('#entry'+ids).text(qnty);
        });
        $(document).on('click', '#plus', function (e) {
            var ids = $('#ids').val();
            var qnty = $('#entry'+ids).text();
            qnty++;
            $('#entry'+ids).text(qnty);
        });
        /**/
        $(document).on('click','#add-to-chart',function(e){
            var ids = $('#ids').val();
            var qty = $('#entry'+ids).text();
            $.ajax({
                type:'POST',
                url : "{{route('cart.add')}}",
                data: {
                    'pid': ids,
                    'qty': qty,
                    '_token': $('input[name=_token]').val()
                },
                success:function(data){
                    alert(data['msg']);
                    if(data['status'] == 1){
                        var items = parseInt($('#simpleCart_quantity').text());
                        items++;
                        $('#simpleCart_quantity').text(items);
                        var cartItems = "<div class='single-cart-item'>"
                        cartItems += "<div class='pdt-image'><img src=\"{{url('/')}}/images/product/"+data['picture']+"\"/></div>";
                        cartItems += "<div class='pdt-text'><h4>"+data['title']+"</h4></div>";
                        cartItems += "<i id='item-close"+ids+"' class='glyphicon glyphicon-remove pull-right close-btn'></i>";
                        cartItems += "<span id='qty-"+ids+"' class='qntity'></span> X " ;
                        cartItems += "<span class='qntity'>"+data['price']+"</span>";
                        cartItems += "</div>";
                        $(".cart-product-item").append(cartItems);
                    }
                    $('#totalAmount').text(data['Total']);
                    $('#remove-chart'+ids).show();
                    $('#qty-'+ids).text(qty);
                }
            });
            return false;
        });

        $(document).on('click','.close-btn', function(){

            var ids = $(this).attr("id");
            ids = ids.substr(10);
            $(this).parent().hide();
            $.ajax({
                type: "POST",
                url:"{{route('cart.remove')}}",
                data:{
                    'pid': ids,
                    '_token': $('input[name=_token]').val()
                },
                success: function(data) {
                    if (data > 0) {
                        $("#totalAmount").text(data);
                        var items = parseInt($('#simpleCart_quantity').text());

                        items--; //minus an items
                        $('#simpleCart_quantity').text(items);
                        $('#remove-chart'+ids).hide();
                    }
                    else {
                        $("#totalAmount").text(0);
                        $('#simpleCart_quantity').text(0);
                        $('#remove-chart'+ids).hide();
                    }

                }
            });

        });
        $(document).on('click','.remove-btn',function () {
            var ids = $(this).attr("id");
            ids = ids.substr(12);
            $(this).hide();
            $.ajax({
                type:"POST",
                url:"{{route('cart.remove.single')}}",
                data: {
                    'pid': ids,
                    '_token': $('input[name=_token]').val()
                },
                success:function (data) {
                    if (data > 0) {
                        $("#totalAmount").text(data);
                        var items = parseInt($('#simpleCart_quantity').text());

                        items--; //minus an items
                        $('#simpleCart_quantity').text(items);
                        $('#item-close'+ids).parent().hide();
                    }
                    else {
                        $("#totalAmount").text(0);
                        $('#simpleCart_quantity').text(0);
                    }
                }
            });
        });
    });
</script>


<!-- //single -->
<!-- //product-nav -->

@endsection

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