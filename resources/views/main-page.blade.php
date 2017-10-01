@extends('master')
@section('content')
<style>
    
    .item-info-product h4 {
	height: 100px; 
    }

</style>

<!-- //banner-top -->
<!-- banner -->
<div class="banner-grid">
    <div id="visual">
        <div class="slide-visual">

            <ul class="slide-group">
                @foreach($allslide as $slide)
                @if(file_exists("images/slider/slide-img-{$slide->id}.{$slide->picture}"))
                <li><img class="img-responsive" src="{{url('/')}}/images/slider/slide-img-{{$slide->id}}.{{$slide->picture}}" alt="Dummy Image" style="width: 100%; height:600px; " /></li>
                @endif
                @endforeach;
            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <script type="text/javascript" src="{{url('/')}}/asset/js/pignose.layerslider.js"></script>
    <script type="text/javascript">
//<![CDATA[
$(window).load(function () {
    $('#visual').pignoseLayerSlider({
        play: '.btn-play',
        pause: '.btn-pause',
        next: '.btn-next',
        prev: '.btn-prev'
    });
});
    </script>

</div>




<div class="product-easy">
    <div class="container">

        <script src="{{url('/')}}/asset/js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
$(document).ready(function () {
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true   // 100% fit in a container
    });
});

        </script>
        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Latest Designs</span></li> 
                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Special Offers</span></li> 

                </ul>				  	 
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                        @php $c=1  @endphp
                        @foreach($alldata[3] as $pdt)
                        @php 
                        $realprice = PriceCal($pdt->price, $pdt->vat, 0) ;
                        $discountprice = PriceCal($pdt->price, $pdt->vat, $pdt->discount) ;
                        
                        @endphp
                        @if($c%4==1)
                        <div class="row">
                        @endif
                        <div class="col-md-3 product-men yes-marg">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    
                                  @if($pdt->default_picture == "1" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture1}}"  />
                    @elseif($pdt->default_picture == "2" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture2}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-2-{{$pdt->id}}.{{$pdt->picture2}}"  />
                    @elseif($pdt->default_picture == "3" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture3}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-3-{{$pdt->id}}.{{$pdt->picture3}}"  />
                    @elseif(file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture1}}"  />
                    @elseif(file_exists("images/product/product-2-{$pdt->id}.{$pdt->picture2}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-2-{{$pdt->id}}.{{$pdt->picture2}}"  />
                    @elseif(file_exists("images/product/product-3-{$pdt->id}.{$pdt->picture3}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-3-{{$pdt->id}}.{{$pdt->picture3}}"  />
                    @else
                    <img  class="pro-image-front" src="{{url('/')}}/images/no-images.jpg"  />
                    @endif

                    @if($pdt->default_picture == "1" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture1}}"  />
                    @elseif($pdt->default_picture == "2" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture2}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-2-{{$pdt->id}}.{{$pdt->picture2}}"  />
                    @elseif($pdt->default_picture == "3" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture3}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-3-{{$pdt->id}}.{{$pdt->picture3}}"  />
                    @elseif(file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture1}}"  />
                    @elseif(file_exists("images/product/product-2-{$pdt->id}.{$pdt->picture2}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-2-{{$pdt->id}}.{{$pdt->picture2}}"  />
                    @elseif(file_exists("images/product/product-3-{$pdt->id}.{$pdt->picture3}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-3-{{$pdt->id}}.{{$pdt->picture3}}"  />
                    @else
                    <img  class="pro-image-back" src="{{url('/')}}/images/no-images.jpg"  />
                    @endif<div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{url('/')}}/{{Replace($pdt->cname)}}/{{Replace($pdt->scname)}}/{{$pdt->id}}/{{Replace($pdt->title)}}" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="{{url('/')}}/{{Replace($pdt->cname)}}/{{Replace($pdt->scname)}}/{{$pdt->id}}/{{Replace($pdt->title)}}">{{$pdt->title}}</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">৳ @php echo $discountprice  @endphp</span>
                                        @if ($discountprice != $realprice )
                                        <del>৳ @php echo $realprice @endphp</del>
                                        @endif
                                    </div>
                                    <a href="#" id="add-to-chart{{$pdt->id}}" class="item_add single-item hvr-outline-out home-add-to-cart button2">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        @if($c%4==0)
                        </div>
                        @endif
                        @php $c++; @endphp
                        @endforeach
                        <div class="clearfix"></div>
                       
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                         @php $c=1 @endphp
                        @foreach($alldata[4] as $pdt)
                        @if($c%4==1)
                        <div class="row">
                        @endif
                        <div class="col-md-3 product-men yes-marg">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    
                                  @if($pdt->default_picture == "1" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture1}}"  />
                    @elseif($pdt->default_picture == "2" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture2}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-2-{{$pdt->id}}.{{$pdt->picture2}}"  />
                    @elseif($pdt->default_picture == "3" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture3}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-3-{{$pdt->id}}.{{$pdt->picture3}}"  />
                    @elseif(file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture1}}"  />
                    @elseif(file_exists("images/product/product-2-{$pdt->id}.{$pdt->picture2}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-2-{{$pdt->id}}.{{$pdt->picture2}}"  />
                    @elseif(file_exists("images/product/product-3-{$pdt->id}.{$pdt->picture3}"))
                    <img  class="pro-image-front" src="{{url('/')}}/images/product/product-3-{{$pdt->id}}.{{$pdt->picture3}}"  />
                    @else
                    <img  class="pro-image-front" src="{{url('/')}}/images/no-images.jpg"  />
                    @endif

                    @if($pdt->default_picture == "1" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture1}}"  />
                    @elseif($pdt->default_picture == "2" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture2}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-2-{{$pdt->id}}.{{$pdt->picture2}}"  />
                    @elseif($pdt->default_picture == "3" && file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture3}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-3-{{$pdt->id}}.{{$pdt->picture3}}"  />
                    @elseif(file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture1}}"  />
                    @elseif(file_exists("images/product/product-2-{$pdt->id}.{$pdt->picture2}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-2-{{$pdt->id}}.{{$pdt->picture2}}"  />
                    @elseif(file_exists("images/product/product-3-{$pdt->id}.{$pdt->picture3}"))
                    <img  class="pro-image-back" src="{{url('/')}}/images/product/product-3-{{$pdt->id}}.{{$pdt->picture3}}"  />
                    @else
                    <img  class="pro-image-back" src="{{url('/')}}/images/no-images.jpg"  />
                    @endif
                                    <div class="men-cart-pro">
                                        <div class="{{url('/')}}/{{Replace($pdt->cname)}}/{{Replace($pdt->scname)}}/{{$pdt->id}}/{{Replace($pdt->title)}}" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="{{url('/')}}/{{Replace($pdt->cname)}}/{{Replace($pdt->scname)}}/{{$pdt->id}}/{{Replace($pdt->title)}}">{{$pdt->title}}</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">৳ @php echo PriceCal($pdt->price, $pdt->vat, $pdt->discount) @endphp</span>
                                        
                                        <del>৳ @php echo PriceCal($pdt->price, $pdt->vat, 0) @endphp</del>
                                        
                                    </div>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
                                </div>
                            </div>
                        </div>
                        @if($c%4==0)
                        </div>
                        @endif
                        @php $c++; @endphp
                        @endforeach
                        {{csrf_field()}}
                        <div class="clearfix"></div>						
                    </div>

                </div>	
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('click','.home-add-to-cart',function () {
            var ids = $(this).attr('id');
            ids = ids.substr(12);
            var qty = '1';
            $.ajax({
                type:"POST",
                url: "{{route('cart.add.home')}}",
                data:{
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
        $(document).on('click','.close-btn',function () {
           var ids = $(this).attr('id');
           ids = ids.substr(10);
            $(this).parent().hide();
           $.ajax({
               type: 'POST',
               url: "{{route('cart.remove.home')}}",
               data:{
                   'pid': ids,
                   '_token': $('input[name=_token]').val()
               },
               success:function(data){
                   if(data > 0){
                       $('#totalAmount').text(data);
                       var items = parseInt($('#simpleCart_quantity').text());
                       items--;
                       $('#simpleCart_quantity').text(items);

                   }else{
                       $('#totalAmount').text(0);
                       $('#simpleCart_quantity').text(0);
                   }
               }
           });
        });
    });
</script>

@php
    /*
   Session::flush("pdtid");
   Session::flush("qtyid");
   Session::flush("totalPrice");
   Session::flush("stitle");
   Session::flush("spicture");
   */


@endphp


@endsection