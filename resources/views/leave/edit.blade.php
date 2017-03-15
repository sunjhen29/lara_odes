@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><b>Modify Leave Form</b></h4></div>
        {!! Form::model($results,array('role'=>'form','url'=>'/leave/'.$results->id.'/update','action'=>'POST','class'=>'form-horizontal'))!!}
          @include('leave.form')
        {!! Form::close() !!}
            </div>
        </div>
    </div><!-- end of column -->
</div> <!-- end of row -->    
</div> <!-- end of container -->
@endsection