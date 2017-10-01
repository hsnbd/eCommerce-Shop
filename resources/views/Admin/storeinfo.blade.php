@extends('Admin.adminMaster')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>Change Store Info</h1>
        </div><!-- /.page-header -->
        <div class="page-link">
        </div>
        <br/><br/>
        <div class="row">
            <div class="col-xs-12">

                <h6 class="text-center text-success"><strong>{{ Session::get('msg') }}</strong></h6>
                <form class="form-horizontal" role="form" method="POST" action="{{route('store.info')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" value="{{$allinfo->email}}" name="email" class="col-xs-10 col-sm-5" />
                        </div>
                        <p class="text-center text-danger">{{ $errors->first('email') }}</p>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Phone </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" value="{{$allinfo->phone}}" name="phone" class="col-xs-10 col-sm-5" />
                        </div>
                        <p class="text-center text-danger">{{ $errors->first('phone') }}</p>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Address </label>
                        <div class="col-sm-9">
                            <textarea name="address"  class="col-xs-10 col-sm-5">{{$allinfo->address}}</textarea>
                        </div>
                        <p class="text-center text-danger">{{ $errors->first('address') }}</p>
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