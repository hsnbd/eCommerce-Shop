@extends('master')
@section('content')
    <div class="related-product">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h4 class="text-center">You Search For !!</h4>
                </div>
                @foreach($results as $relpdt)
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
    @endsection