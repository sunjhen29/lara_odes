@extends('layouts.reanz')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open(array('role'=>'form','url'=>'/reanz/add','action'=>'POST','class'=>'form-horizontal'))!!}
          
        {!! Form::token() !!}
        
        @if(substr(session('batch_name'),13,-3) == 'S' || substr(session('batch_name'),13,-3) == 's' )
                @include('reanz.sale')
            @else(substr(session('batch_name'),13,-3) == 'R' || substr(session('batch_name'),13,-3) == 'r')
                @include('reanz.rent')
            @endif
        
        {!! Form::close() !!}
      
    </div><!-- end of column -->
</div> <!-- end of row -->    
</div> <!-- end of container -->
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $("input[name='listing_id']").blur(function(){
        $.get('/reanz/search/' + $("input[name='listing_id']").val(), function (data) {
            
            console.log(data);
            if (data.property_id) $("input[name='property_id']").val(data.property_id);
            if (data.property_address) $("input[name='property_address']").val(data.property_address);
            if (data.price_guide) $("input[name='price_guide']").val(data.price_guide);
            if (data.bedrooms) $("input[name='bedrooms']").val(data.bedrooms);
            if (data.bathrooms) $("input[name='bathrooms']").val(data.bathrooms);
            if (data.car_spaces) $("input[name='car_spaces']").val(data.car_spaces);
            if (data.auction_date) $("input[name='auction_date']").val(data.auction_date);
            if (data.land_size) $("input[name='land_size']").val(data.land_size);
            if (data.floor_size) $("input[name='floor_size']").val(data.floor_size);
            if (data.agency_name) $("input[name='agency_name']").val(data.agency_name);
            if (data.agent) $("input[name='agent']").val(data.agent);
            if (data.agent_mobile) $("input[name='agent_mobile']").val(data.agent_mobile);
            if (data.agent1) $("input[name='agent1']").val(data.agent1);
            if (data.agent_mobile1) $("input[name='agent_mobile1']").val(data.agent_mobile1);
            }); 
    });
});
</script>
@endpush


