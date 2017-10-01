@extends('admin.adminMaster')
@section('content')
<div class="page-content">
    <div class="page-header">
        <h1> View Product</h1>
    </div><!-- /.page-header -->
    <div class="page-link">
        <a href="{{url('/')}}/product/view" class="btn btn-primary">View Product</a>
        <a href="{{url('/')}}/product/create" class="btn btn-primary">Add Product</a>

    </div>
    <br/><br/>
    <div class="row">
        <div class="col-xs-12">



            <div class="page-content">


                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">
                            <div class="col-xs-12">
                                <p class="text-center text-danger">{{Session::get('msg')}}
                                <table id="simple-table" class="table  table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>vat</th>
                                            <th>Discount</th>
                                            <th>Category & Sub Category </th>
                                            <th>Picture</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($allproduct as $products)
                                    <tr>
                                        <td>{{$products->title}}</td>
                                        <td>{{$products->price}}</td>
                                        <td>{{$products->vat}}</td>
                                        <td>{{$products->discount}}</td>
                                        <td>
                                            <p>{{$products->cname}}</p>
                                            <p>{{$products->scname}}</p>
                                        </td>
                                        <td>

                                            @if($products->default_picture == "1" && file_exists("images/product/product-1-{$products->id}.{$products->picture1}"))
                                            <img src="{{url('/')}}/images/product/product-1-{{$products->id}}.{{$products->picture1}}" width='100' />
                                            @elseif($products->default_picture == "2" && file_exists("images/product/product-1-{$products->id}.{$products->picture2}"))
                                            <img src="{{url('/')}}/images/product/product-2-{{$products->id}}.{{$products->picture2}}" width='100' />
                                            @elseif($products->default_picture == "3" && file_exists("images/product/product-1-{$products->id}.{$products->picture3}"))
                                            <img src="{{url('/')}}/images/product/product-3-{{$products->id}}.{{$products->picture3}}" width='100' />
                                            @elseif(file_exists("images/product/product-1-{$products->id}.{$products->picture1}"))
                                            <img src="{{url('/')}}/images/product/product-1-{{$products->id}}.{{$products->picture1}}" width='100' />
                                            @elseif(file_exists("images/product/product-2-{$products->id}.{$products->picture2}"))
                                            <img src="{{url('/')}}/images/product/product-2-{{$products->id}}.{{$products->picture2}}" width='100' />
                                            @elseif(file_exists("images/product/product-3-{$products->id}.{$products->picture3}"))
                                            <img src="{{url('/')}}/images/product/product-3-{{$products->id}}.{{$products->picture3}}" width='100' />
                                            @else
                                            <img src="{{url('/')}}/images/no-images.jpg" width='100' />
                                            @endif

                                        </td>
                                        <td> <a class="glyphicon glyphicon-pencil btn btn-warning" href="{{url('/')}}/product/edit/{{$products->id}}"></a>
                                            <a class="glyphicon glyphicon-trash  btn btn-danger" href="{{url('/')}}/product/delete/{{$products->id}}"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div><!-- /.span -->
                        </div><!-- /.row -->
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>







        </div>
    </div>
</div>

@endsection