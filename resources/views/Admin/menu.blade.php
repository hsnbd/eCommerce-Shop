@extends('admin.adminMaster')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <h1>Menu Management</h1>
        </div><!-- /.page-header -->
        <br/><br/>
        <div class="row">
            <div class="col-xs-10">
                <h6 class="text-center text-success">{{ Session::get('msg') }}</h6>
                <h4 class="text text-info">Select category for the menu</h4>
                <form class="form-horizontal" role="form" method="POST" action="{{route('menu.management')}}">
                    {{ csrf_field() }}
                    @foreach($allCat as $cat)
                        @foreach($allmenu as $menu)
                        @if($menu->catid == $cat->id)
                            @php
                                $mcatid = $menu->catid;
                                break;
                            @endphp
                        @endif

                        @endforeach
                            <label class="checkbox-inline"><input type="checkbox" <?php echo(isset($mcatid) && $cat->id == $mcatid) ? "checked" : ""?> name="menu[]" value="{{$cat->id}}">{{$cat->name}}</label>
                    @endforeach
                    <button class="btn btn-info btn-xs" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>
                </form>

            </div>
        </div>
    </div>

@endsection