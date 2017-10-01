@extends('admin.adminMaster')
@section('content')
<div class="page-content">
    <div class="page-header">
        <h1>ADD Slider Details</h1>
    </div><!-- /.page-header -->

    <br/><br/>
    <div class="row">
        <div class="col-xs-12">
            <div class="row">

                <div class="col-md-4 col-md-offset-3"> 
                   @if (Session::has('message'))
                        <br>
                        <br>
                        <p class="alert alert-success">{{ Session::get('message')}}</p>
                        @endif
                </div>
            </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{url('/')}}/slide/create" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Url  </label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" value="{{old('url')}}" placeholder="Paste Url Here" name="url" class="col-xs-10 col-sm-5" />
                            </div>
                            <p class="text-center text-danger">{{ $errors->first('url') }}</p>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Picture  </label>
                            <div class="col-sm-9">
                                <input type="file" name="picture"  />
                            </div>
                            <p class="text-center text-danger">{{ $errors->first('picture') }}</p>
                        </div>

                        <div class="space-4"></div>

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

                    </form>
                </div>

                <br>
                <br>
                <div class="row">

                    <div class="col-md-4 col-md-offset-3"> 
                        @if (Session::has('msg'))
                        <br>
                        <br>
                        <p class="alert alert-danger">{{ Session::get('msg') }}</p>
                        @endif
                    </div>
                </div>
                <br>
                <br>
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>Slider Url</th>
                            <th>Slider Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allslider as $slider)
                        <tr>

                            <td>{{$slider->url}}</td>
                            <td>
                                @if(file_exists("images/slider/slide-img-{$slider->id}.{$slider->picture}"))
                                <img src="{{url('/')}}/images/slider/slide-img-{{$slider->id}}.{{$slider->picture}}" width="100" height="100"></td>
                            @else 
                    <img src="{{url('/')}}/images/noimage.gif" width="100" height="100">
                    @endif
                    <td>
                        <a class="glyphicon glyphicon-edit btn btn-warning" href="{{url('/')}}/slider/edit/{{$slider->id}}"></a>
                        <a class="glyphicon glyphicon-trash btn btn-danger" href="{{url('/')}}/slider/delete/{{$slider->id}}" ></a>
                    </td>
                    @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @endsection