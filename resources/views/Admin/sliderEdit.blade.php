@extends('admin.adminMaster')
@section('content')
<div class="page-content">
    <div class="page-header">
        <h1>Update Slider Details</h1>
    </div><!-- /.page-header -->

    <br/><br/>
    <div class="row">
        <div class="col-xs-12">

            <h6 class="text-center text-success">{{ Session::get('message') }}</h6>
            <form class="form-horizontal" role="form" method="POST" action="{{url('/')}}/slider/update/{{$allslider->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Url  </label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" value="{{$allslider->url}}"  name="url" class="col-xs-10 col-sm-5" />
                    </div>
                    <p class="text-center text-danger">{{ $errors->first('url') }}</p>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Picture  </label>
                    <div class="col-sm-9">
                        <input type="file" name="picture"  />
                       <br/>
                        @if(file_exists("images/slider/slide-img-{$allslider->id}.{$allslider->picture}"))
                        <img src="{{url('/')}}/images/slider/slide-img-{{$allslider->id}}.{{$allslider->picture}}" width='100' height="100" />
                    @else
                    <img src="{{url('/')}}/images/noimage.gif" alt="No Image Avilable" width="100" height="100">
                   @endif
                    </div>
                   
                    <p class="text-center text-danger">{{ $errors->first('picture') }}</p>
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