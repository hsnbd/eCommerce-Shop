@extends('admin.adminMaster')
@section('content')
<div class="page-content">
    <div class="page-header">
        <h1>Edit SUB CATEGORY</h1>
    </div><!-- /.page-header -->
    <div class="page-link">

        <div class="page-link">

            <a href="{{url('/')}}/category/add" class="btn btn-primary">Add Category</a>

        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-xs-12">

            <h6 class="text-center text-success">{{ Session::get('messege') }}</h6>
            <form class="form-horizontal" role="form" method="POST" action="{{url('/')}}/update/{{$subcategory->id}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sub Category Name </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" name="name" value="{{$subcategory->name}}" class="col-xs-10 col-sm-5" />
                    </div>
                    <h6 class="text-center text-danger">{{ $errors->first('name') }}</h6>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right " for="form-field-2"> Category </label>

                    <div class="col-sm-9">
                        <select name="categoriesid">
                               @foreach($category as $cat)
                               @if($subcategory->categoriesid == $cat->id)
                               <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                               @else 
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endif
                               @endforeach
                           
                            
                        </select>
                        <h6 class=" text-danger">{{$errors->first('categoriesid')}}</h6>
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

@endsection