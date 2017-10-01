@extends('admin.adminMaster')
@section('content')
<div class="page-content">
    <div class="page-header">
        <h1>Prduct Page</h1>
    </div><!-- /.page-header -->
    <div class="page-link">
        <a href="{{url('/')}}/product/view" class="btn btn-primary">View Product</a>
        <a href="{{url('/')}}/product/create" class="btn btn-primary">Add Product</a>

    </div>
    <br/><br/>
    <div class="row">
        <div class="col-xs-12">

            <h6 class="text-center text-success">{{Session::get('messege')}}</h6>
            <form class="form-horizontal" role="form" method="POST" action="{{url('/')}}/product/add" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Title </label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" name="title" placeholder="product title" class="col-xs-10 col-sm-5"  value="{{old('title')}}"/>
                    </div>
                    <h6 class="text-center text-danger">{{$errors->first('title')}}</h6>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Description</label>

                    <div class="col-sm-4">
                        <textarea class="form-control text" id="form-field-1" value="{{old('descr')}}" name="descr" placeholder="Description" width="300px"></textarea>
                        <h6 class="text-danger">{{$errors->first('descr')}}</h6> 
                    </div>

                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Price </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="price" value="{{old('price')}}" placeholder="Price" class="col-xs-10 col-sm-5" />
                    </div>
                    <h6 class="text-center text-danger">{{$errors->first('price')}}</h6>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Vat </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="vat" placeholder="vat" value="{{old('vat')}}" class="col-xs-10 col-sm-5" />
                    </div>
                    <h6 class="text-center text-danger">{{$errors->first('vat')}}</h6>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Discout </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="discount" placeholder="discout" value="{{old('discount')}}" class="col-xs-10 col-sm-5" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Stock </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="stock" value="{{old('stock')}}" placeholder="stock" class="col-xs-10 col-sm-5" />
                    </div>
                    <h6 class="text-center text-danger">{{$errors->first('stock')}}</h6>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Weight </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="weight" value="{{old('weight')}}" placeholder="weight" class="col-xs-10 col-sm-5" />
                    </div>
                    <h6 class="text-center text-danger">{{$errors->first('weight')}}</h6>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right " for="form-field-2"> Category </label>

                    <div class="col-sm-9">

                        <select name="categoriesid" id="catid">
                            <option value="0">Choose Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h6 class="text-danger">{{$errors->first('categoriesid')}}</h6>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right " for="form-field-2"> Sub Category </label>

                    <div class="col-sm-9">

                        <select name="subcategoriesid" id="scatid">
                            <option value="0">Choose Category First</option>

                        </select>
                    </div>
                    <h6 class="text-danger">{{$errors->first('subcategory')}}</h6>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right " for="form-field-2"> Unit </label>

                    <div class="col-sm-9">
                        <select name="unitsid" >
                            <option value="0">Choose Unit</option>
                            @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h6 class="text-danger">{{$errors->first('unitsid')}}</h6>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right " for="form-field-2"> Size </label>

                    <div class="col-sm-9">
                        <select name="sizeid" id="Size">
                            <option value="0">Select Size</option>
                            @foreach($size as $size)
                            <option value="{{$size->id}}">{{$size->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right " for="form-field-2"> Default Picture </label>

                    <div class="col-sm-9">
                        <select name="default_pic">

                            <option value="0">Select Picture</option>

                            <option value="1">Picture1</option>
                            <option value="2">Picture2</option>
                            <option value="3">Picture3</option>

                        </select>
                    </div>
                    <h6 class="text-danger">{{$errors->first('unitsid')}}</h6>

                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Picture 1 </label>

                    <div class="col-sm-9">
                        <input type="file" id="form-field-2" name="picture1" class="col-xs-10 col-sm-5" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Picture 2 </label>

                    <div class="col-sm-9">
                        <input type="file" id="form-field-2" name="picture2" class="col-xs-10 col-sm-5" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Picture 3 </label>

                    <div class="col-sm-9">
                        <input type="file" id="form-field-2" name="picture3"  class="col-xs-10 col-sm-5" />
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('change','#catid',function (e) {
            var cat = $("#catid").val();
            $("#scatid").html("");
            if (cat == 0) {
                $("#scatid").append('<option value="0">Choose Category First</option>');
            }
<?php
foreach ($categories as $cat) {
    echo "else if(cat == {$cat->id}){";
    foreach ($subcategories as $scat) {
        if ($scat->categoriesid == $cat->id) {
            echo "$('#scatid').append('<option value=\"{$scat->id}\">{$scat->name}</option>');";
        }
    }
    echo "}";
}
?>

        });
    });
</script>
@endsection