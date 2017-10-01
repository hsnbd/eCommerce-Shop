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
            @foreach($products as $pdt)
            @foreach($subcategories as $scat)
            @if($scat->id == $pdt->subcategoriesid)
            @php 
            $catid = $scat->categoriesid ;
            break;
            @endphp
            @endif
            @endforeach

            <form class="form-horizontal" role="form" method="POST" action="{{url('/')}}/product/update/{{$pdt->id}}" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Title </label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" name="title" value="{{$pdt->title}}" class="col-xs-10 col-sm-5" />
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Description</label>

                    <div class="col-sm-4">
                        <textarea class="form-control text" id="form-field-1"name="descr" placeholder="Description" width="300px">{{$pdt->description}}</textarea>

                    </div>

                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Price </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="price" value="{{$pdt->price}}" placeholder="Price" class="col-xs-10 col-sm-5" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Vat </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="vat" placeholder="vat" value="{{$pdt->vat}}" class="col-xs-10 col-sm-5" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Discout </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="discount" placeholder="discout" value="{{$pdt->discount}}" class="col-xs-10 col-sm-5" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Stock </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="stock" value="{{$pdt->stock}}" placeholder="stock" class="col-xs-10 col-sm-5" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Weight </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="weight" value="{{$pdt->weight}}" placeholder="weight" class="col-xs-10 col-sm-5" />
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right " for="form-field-2"> Category </label>

                    <div class="col-sm-9">

                        <select name="categoriesid" id="catid">
                            <option value="0">Choose Category</option>
                            @foreach($categories as $category)
                            @if('$category == $catid')
                            <option selected value="{{$category->id}}">{{$category->name}}</option>
                            @else
                            <option  value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right " for="form-field-2"> Sub Category </label>

                    <div class="col-sm-9">

                        <select name="subcategoriesid" id="scatid">
                            @foreach($subcategories as $scat)
                            @if($scat->categoriesid == $catid)
                            @if($scat->id == $pdt->subcategoriesid)
                            <option selected value="{{$scat->id}}">{{$scat->name}}</option>
                            @else
                            <option  value="{{$scat->id}}">{{$scat->name}}</option>
                            @endif
                            @endif
                            @endforeach


                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right " for="form-field-2"> Unit </label>

                    <div class="col-sm-9">
                        <select name="unitsid" >
                            @foreach($units as $unit)
                            @if($unit->id == $pdt->unitsid)
                            <option  selected value="{{$unit->id}}">{{$unit->name}}</option>
                            @else
                            <option   value="{{$unit->id}}">{{$unit->name}}</option>
                            @endif
                            @endforeach



                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right " for="form-field-2"> Size </label>

                    <div class="col-sm-9">
                        <select name="sizeid">
                            @foreach($size as $size)
                            @if($size->id == $pdt->size)
                            <option  selected value="{{$size->id}}">{{$size->name}}</option>
                            @else  
                            <option value="{{$size->id}}">{{$size->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right " for="form-field-2"> Default Picture </label>

                    <div class="col-sm-9">
                        <select name="default_pic">
                            <option value="2" @if($pdt->default_picture == "1") selected @endif>Picture 1</option>
                            <option value="2" @if($pdt->default_picture == "2") selected @endif>Picture 2</option>
                            <option value="2" @if($pdt->default_picture == "3") selected @endif>Picture 3</option>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Picture 1 </label>
                    
                    <div class="col-sm-9">
                        <input type="file" id="form-field-2" name="picture1" class="col-xs-10 col-sm-5" />
                        @if(file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}"))
                        <img src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture1}}" width="50" height="50">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Picture 2 </label>

                    <div class="col-sm-9">
                        <input type="file" id="form-field-2" name="picture2" class="col-xs-10 col-sm-5" />
                        @if(file_exists("images/product/product-2-{$pdt->id}.{$pdt->picture2}"))
                        <img src="{{url('/')}}/images/product/product-1-{{$pdt->id}}.{{$pdt->picture2}}" width="50" height="50">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Picture 3 </label>

                    <div class="col-sm-9">
                        <input type="file" id="form-field-2" name="picture3"  class="col-xs-10 col-sm-5" />
                        @if(file_exists("images/product/product-3-{$pdt->id}.{$pdt->picture3}"))
                        <img src="{{url('/')}}/images/product/product-3-{{$pdt->id}}.{{$pdt->picture3}}" width="50" height="50">
                        @endif
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

            @endforeach
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#catid").change(function () {
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