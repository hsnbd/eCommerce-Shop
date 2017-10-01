@extends('admin.adminMaster')
@section('content')
<div class="page-content">
    <div class="page-header">
        <h1>ADD UNIT</h1>
    </div><!-- /.page-header -->
    <div class="page-link">
        
        <a href="{{url('/')}}/unit/add" class="btn btn-primary">Add Unit</a>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-xs-12">

            <h6 class="text-center text-success">{{ Session::get('messege') }}</h6>
            <form class="form-horizontal" role="form" method="POST" action="{{url('/')}}/unit/create">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Unit Name </label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" placeholder="Unit Name" name="name" class="col-xs-10 col-sm-5" />
                    </div>
                    <p class="text-center text-danger">{{ $errors->first('name') }}</p>
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
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>Unit Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allunits as $unit)
                    <tr>

                        <td>{{$unit->name}}</td>
                        <td>
                            <a class="glyphicon glyphicon-edit btn btn-warning" href="{{url('/')}}/unit/edit/{{$unit->id}}"></a>
                            <a class="glyphicon glyphicon-trash btn btn-danger" href="{{url('/')}}/unit/delete/{{$unit->id}}" ></a>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection