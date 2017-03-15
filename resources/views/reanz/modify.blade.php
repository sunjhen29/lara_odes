@extends('layouts.reanz')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        
        {!! Form::model($record,array('role'=>'form','url'=>'/reanz/'.$record->id.'/update','action'=>'POST','class'=>'form-horizontal'))!!}
            
            @if(substr(session('batch_name'),13,-3) == 'S')    
                @include('reanz.sale')
            @else(substr(session('batch_name'),13,-3) == 'R')
                @include('reanz.rent')
            @endif
            
        {!! Form::close() !!}
    </div><!-- end of column -->
</div> <!-- end of row -->    
</div> <!-- end of container -->
@endsection



