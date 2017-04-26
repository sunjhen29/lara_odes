@extends('layouts.dataentry.dataentry',['title'=>'Saturday Auction App','folder'=>'sat_auction'])

@section('content')
<div class="container">
<div class="row">
    <!-- Horizontal Form -->
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ session('batch_details')->job_name.' '.session('batch_details')->batch_date }}</h3>
        </div>
        {!! Form::open(array('role'=>'form','url'=>'/sat_auction/entry','action'=>'POST','class'=>'form-horizontal'))!!}
          @include('sat_auction.form',['status'=>'E'])
        {!! Form::close() !!}
    </div>
</div>
</div> <!-- end of container -->
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $("input[name='suburb']").blur(function(){
        $.get('/sat_auction/search_post_code/' + $("input[name='suburb']").val() + '/' + $("select[name='state']").val() , function (data) {
            console.log(data);
            if (data.post_code){
                $("input[name='post_code']").val(data.post_code);
            } else {
                $("input[name='post_code']").val("");
            }
        })
    });

    @if(session('last_record'))
        $("select[name='state']").val('{{ session('last_record')->state }}').change();
    @endif

});
</script>

<script>
    $(document).ready(function(){

        var slug = function(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                    replace(/-+/g, '-').
                    replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }



        $("input[name='suburb']").blur(function(){

            $address = $("select[name='state']").val() + ' ' + $("input[name='unit_no']").val() + ' ' + $("input[name='street_no']").val() + ' ' + $("input[name='street_name']").val()+ ' ' + $("select[name='street_ext']").val() + ' ' + $("input[name='suburb']").val();

            $property = slug($address);

            console.log($property);

            $.get('/sat_auction/search_property/' + $property , function (data) {
                console.log(data);
                if (data.state){
                    $("input[name='agency_name']").val(data.agency_name).prop('readonly',true).css('background-color','yellow');
                    $("select[name='property_type']").val(data.property_type).prop('readonly',true).css('background-color','yellow');
                    $("select[name='sale_type']").val(data.sale_type).prop('readonly',true).css('background-color','yellow');
                    $("input[name='sold_price']").val(data.sold_price).prop('readonly',true).css('background-color','yellow');

                    if(data.contract_date != ''){
                        var original_date = data.contract_date;
                        contract_date = original_date.split("-").reverse().join("/");
                        $("input[name='contract_date']").val(contract_date).prop('readonly',true).css('background-color','yellow');
                    }
                    $("input[name='bedroom']").val(data.bedroom).prop('readonly',true).css('background-color','yellow');
                    $("input[name='bathroom']").val(data.bathroom).prop('readonly',true).css('background-color','yellow');
                    $("input[name='car']").val(data.car).prop('readonly',true).css('background-color','yellow');


                } else {
                    $("input[name='agency_name']").val('').prop('readonly',false);
                    $("input[name='bedroom']").val('').prop('readonly',false);
                    $("input[name='sold_price']").val('').prop('readonly',false);
                    $("input[name='contract_date']").val('').prop('readonly',false);
                    $("input[name='sale_type']").val('').prop('readonly',false);
                    $("input[name='bathroom']").val('').prop('readonly',false);
                    $("input[name='car']").val('').prop('readonly',false);
                    $("select[name='property_type']").val('HO').prop('readonly',false);

                }
            })
        });

        @if(session('last_record'))
            $("select[name='state']").val('{{ session('last_record')->state }}').change();
        @endif

    });
</script>


@endpush

