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


<div id="search_modal"class="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Find Property</h4>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <th>State</th>
                        <th>Property Address</th>
                        <th class="text-center">Prop. Type</th>
                        <th>Agency Name</th>
                        <th>B</th>
                        <th>B</th>
                        <th>C</th>
                    </tr>
                    @foreach ($results as $result)
                        <tr>
                            <td>{{ $result->state }}</td>
                            <td><a><strong>{{ $result->address }}</strong></a></td>
                            <td class="text-center">{{ $result->property_type }}</td>
                            <td>{{ substr($result->agency_name,0,15) }}</td>
                            <td>{{ $result->bedroom }}</td>
                            <td>{{ $result->bathroom }}</td>
                            <td>{{ $result->car }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div>  <!-- /.modal-dialog -->
</div><!-- /.modal -->


</div> <!-- end of container -->
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('#search_modal').modal('show');

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

        $("input[name='street_name']").blur(function() {
            $address = $("select[name='state']").val() + ' ' + $("input[name='unit_no']").val() + ' ' + $("input[name='street_no']").val() + ' ' + $("input[name='street_name']").val() + ' ' + $("input[name='street_ext']").val();
            $property = slug($address);
            console.log($property);
            $.get('/sat_auction/search_suburb/' + $property , function (data) {
                console.log(data);
                if (data.state){
                    $('#suburbs').append('<option>'+data.suburb+'</option>');
                }
            })
        });

        //$("input").focusin(function(){
          //  $(this).css("background-color", "yellow");
        //});
        //$("input").focusout(function(){
          //  $(this).css("background-color", "white");
        //});


        $("input[name='suburb']").blur(function(){
            $address = $("select[name='state']").val() + ' ' + $("input[name='unit_no']").val() + ' ' + $("input[name='street_no']").val() + ' ' + $("input[name='street_name']").val()+ ' ' + $("input[name='street_ext']").val() + ' ' + $("input[name='suburb']").val();
            $property = slug($address);
            $.get('/sat_auction/search_property/' + $property , function (data) {
                console.log(data);
                if (data.state){
                    $("input[name='agency_name']").val(data.agency_name).css('background-color',data.color);
                    $("select[name='property_type']").val(data.property_type).css('background-color',data.color);
                    $("select[name='sale_type']").val(data.sale_type).css('background-color',data.color);
                    $("input[name='sold_price']").val(data.sold_price).css('background-color',data.color);
                    $("input[name='bedroom']").val(data.bedroom).css('background-color',data.color);
                    $("input[name='bathroom']").val(data.bathroom).css('background-color',data.color);
                    $("input[name='car']").val(data.car).css('background-color',data.color);

                    if(data.contract_date != ''){
                        var original_date = data.contract_date;
                        contract_date = original_date.split("-").reverse().join("/");
                        $("input[name='contract_date']").val(contract_date).css('background-color',data.color);
                    }
                } else {
                    alert(data.message);
                    $("input[name='agency_name']").val('').prop('readonly',false).css('background-color','#ffe6f3');
                    $("input[name='bedroom']").val('').prop('readonly',false).css('background-color','#ffe6f3');;
                    $("input[name='sold_price']").val('').prop('readonly',false).css('background-color','#ffe6f3');
                    $("input[name='contract_date']").val('').prop('readonly',false).css('background-color','#ffe6f3');
                    $("select[name='sale_type']").val('Sold At Auction').prop('readonly',false).css('background-color','#ffe6f3');
                    $("input[name='bathroom']").val('').prop('readonly',false).css('background-color','#ffe6f3');
                    $("input[name='car']").val('').prop('readonly',false).css('background-color','#ffe6f3');
                    $("select[name='property_type']").val('HO').prop('readonly',false).css('background-color','#ffe6f3');

                }
            })
        });

        @if(session('last_record'))
            $("select[name='state']").val('{{ session('last_record')->state }}').change();
        @endif

    });
</script>


@endpush

