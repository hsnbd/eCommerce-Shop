@extends('master')
@section('content')

<!-- banner -->

<!-- //banner-top -->
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Electronics</h3>
	</div>
</div>
<!-- //banner -->
<!-- Electronics -->
<div class="electronics">
	<div class="container">
		<div class="clearfix"></div>
			<div class="ele-bottom-grid">
				<h3><span>Latest </span>Collections</h3>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
				@php $c=1  @endphp
				@foreach($allCatPdt as $pdt)
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
	</div>
</div>
<!-- //Electronics -->
<!-- //product-nav -->
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
@endsection