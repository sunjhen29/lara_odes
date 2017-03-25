@extends('layouts.dataentry.dataentry',['title'=>'REA NZ Keying','folder'=>'reanz'])

@section('content')
<div class="container">
<div class="row">
    <!-- Horizontal Form -->
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ session('batch_details')->job_name.' '.session('batch_details')->batch_date }}</h3>
        </div>

        {!! Form::open(array('role'=>'form','url'=>'/reanz/entry','action'=>'POST','class'=>'form-horizontal'))!!}
            @if(substr(session('batch_name'),13,-3) == 'S' || substr(session('batch_name'),13,-3) == 's' )
                @include('reanz.form',['status'=>'E','site_area'=>'SALE'])
            @elseif(substr(session('batch_name'),13,-3) == 'R' || substr(session('batch_name'),13,-3) == 'r')
                @include('reanz.form',['status'=>'E','site_area'=>'RENT'])
            @endif
        {!! Form::close() !!}
    </div>
</div>

</div> <!-- end of container -->
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $("input[name='listing_id']").blur(function(){
        $.get('/reanz/search/' + $("input[name='listing_id']").val(), function (data) {
            console.log(data);
            //if (data.property_id) $("input[name='property_id']").val(data.property_id);
            //if (data.property_address) $("input[name='property_address']").val(data.property_address);
            //if (data.list_date) $("input[name='list_date']").val(data.list_date);
            //if (data.price_guide) $("input[name='price_guide']").val(data.price_guide);
            //if (data.bedrooms) $("input[name='bedrooms']").val(data.bedrooms);
            //if (data.bathrooms) $("input[name='bathrooms']").val(data.bathrooms);
            //if (data.car_spaces) $("input[name='car_spaces']").val(data.car_spaces);
            //if (data.auction_date) $("input[name='auction_date']").val(data.auction_date);
            //if (data.land_size) $("input[name='land_size']").val(data.land_size);
            //if (data.floor_size) $("input[name='floor_size']").val(data.floor_size);
            //if (data.agency_name) $("input[name='agency_name']").val(data.agency_name);
            //if (data.first_agent_name) $("input[name='first_agent_name']").val(data.first_agent_name);
            //if (data.first_agent_mobile) $("input[name='first_agent_mobile']").val(data.first_agent_mobile);
            //if (data.second_agent_name) $("input[name='second_agent_name']").val(data.second_agent_name);
            //if (data.second_agent_mobile) $("input[name='second_agent_mobile']").val(data.second_agent_mobile);
            if (data[0]) $("input[name='property_address']").val(data[0]);
            if (data[1]) $("input[name='property_id']").val(data[1]);
            if (data[2]) $("input[name='price_guide']").val(data[2]);
            if (data[3]) $("input[name='agency_name']").val(data[3]);
            if (data[4]) $("input[name='bedrooms']").val(data[4]);
            if (data[5]) $("input[name='bathrooms']").val(data[5]);
            if (data[6]) $("input[name='car_spaces']").val(data[6]);
            if (data[7]) $("input[name='land_size']").val(data[7]);
            if (data[8]) $("input[name='floor_size']").val(data[8]);
            if (data[9]) $("input[name='first_agent_name']").val(data[9]);
            if (data[10]) $("input[name='first_agent_mobile']").val(data[10]);
            if (data[11]) $("input[name='second_agent_name']").val(data[11]);
            if (data[12]) $("input[name='second_agent_mobile']").val(data[12]);
            if (data[13]) $("input[name='list_date']").val(data[13]);
            if (data[14]) $("input[name='auction_date']").val(data[14]);
            }); 
    });

    $("auction_date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("list_date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //$("input[name='list_date']").val("{{ $results->batch_date }}");
});
</script>
@endpush


