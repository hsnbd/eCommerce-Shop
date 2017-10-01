@extends('admin.adminMaster')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>Change The Social Link</h1>
        </div><!-- /.page-header -->
        <div class="page-link">
        </div>
        <br/><br/>
        <div class="row">
            <div class="col-xs-12">

                <h6 class="text-center text-success"><strong>{{ Session::get('msg') }}</strong></h6>
                <form class="form-horizontal" role="form" method="POST" action="{{route('social.manage-link')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Facebook </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" value="{{$social_link->facebook}}" name="facebook" class="col-xs-10 col-sm-5" />
                        </div>
                        <p class="text-center text-danger">{{ $errors->first('facebook') }}</p>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Twitter </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" value="{{$social_link->twitter}}" name="twitter" class="col-xs-10 col-sm-5" />
                        </div>
                        <p class="text-center text-danger">{{ $errors->first('twitter') }}</p>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Instagram </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" value="{{$social_link->instagram}}" name="instagram" class="col-xs-10 col-sm-5" />
                        </div>
                        <p class="text-center text-danger">{{ $errors->first('instagram') }}</p>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Youtube </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" value="{{$social_link->youtube}}" name="youtube" class="col-xs-10 col-sm-5" />
                        </div>
                        <p class="text-center text-danger">{{ $errors->first('youtube') }}</p>
                    </div>
                    <div class="space-4"></div>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Change
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection