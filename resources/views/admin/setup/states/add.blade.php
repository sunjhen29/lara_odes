@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><b>Add State</b></h4></div>
        {!! Form::open(array('role'=>'form','url'=>'/admin/setup/states/add','action'=>'POST','class'=>'form-horizontal'))!!}
          @include('admin.setup.states.form')
        {!! Form::close() !!}
            </div>
        </div>
    </div><!-- end of column -->
</div> <!-- end of row -->    
</div> <!-- end of container -->
@endsection


