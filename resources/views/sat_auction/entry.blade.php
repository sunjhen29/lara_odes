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
        {!! Form::token() !!}
          @include('sat_auction.form',['status'=>'E'])
        {!! Form::close() !!}
    </div>
</div>


<div id="search_modal"class="modal">
    <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Property Search</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" id="frmLookup" class="form-horizontal" action="/sat_auction/entry/lookup">
                <div class="box-body">
                    <div class="input-group input-group-sm">
                        {!! Form::select('locality', \App\Sat_Auction::select('suburb')->distinct()->pluck('suburb','suburb'), session('locality'), ['class'=>'form-control input-sm', 'required']) !!}
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat">Search</button>
                    </span>
                    </div>
                </div>
            </form>

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>State</th>
                            <th>Property</th>
                            <th>Suburb</th>
                            <th>Type</th>
                            <th>Agency Name</th>
                            <th>Bed</th>
                        </tr>
                    </thead>
                    <tbody id="records-list">
                    </tbody>
                </table>
            </div>
        </div>

    <!-- Validation Error Section -->
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


</div><!-- /.modal -->


</div> <!-- end of container -->
@endsection

@push('scripts')
<script>
    $(document).ready(function() {

       $("#frmLookup").submit(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })

            e.preventDefault();
            var formData = {
                suburb: $("select[name='locality']").val(),
            }

            console.log($("select[name='locality']").val());

            $.ajax({
                type: 'POST',
                url: "{{ url('/sat_auction/entry/lookup') }}",
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#records-list > tr').remove();
                    $.each(data, function (index, value) {
                        var report = '<tr><td>' + value.state +'</td>';
                            report += "<td><a onClick='generate(" + value.id +  ")'><strong>";
                            report += value.unit_no;
                            if (value.unit_no != ''){
                                report += '/';
                            }
                            report += value.street_no + ' ' + value.street_name ;
                            report += '</strong></a></td>';
                            report += '<td>' + value.suburb + '</td>';
                            report += '<td>' + value.property_type + '</td>';
                            report += '<td>' + value.agency_name + '</td>';
                            report += '<td>' + value.bedroom  + '</td></tr>';
                            $('#records-list').append(report);
                    });
                    $('#prod_date').val($('#production_date').val());
                },
                error: function (data) {
                    $('#records-list').remove();
                    console.log('Error:', data);
                }
            });
        });


        $('#frmLookup').submit();


        $("select[name='locality']").change(function(){
            $('#frmLookup').submit();
        });




    } );

    function generate(slug)
    {
        $('#search_modal').modal('hide');
        //$property = $(this).data('id');
        $property = slug;

        console.log($property);
        //$.get('/sat_auction/search_property/' + $property , function (data) {
            $.get('/sat_auction/search_property_id/' + $property , function (data) {
            console.log(data);
            if (data.state){

                $("select[name='state']").val(data.state.toUpperCase()).css('background-color',data.color);
                $("input[name='unit_no']").val(data.unit_no).css('background-color',data.color);
                $("input[name='street_no']").val(data.street_no).css('background-color',data.color);
                $("input[name='street_name']").val(data.street_name).css('background-color',data.color);
                $("input[name='street_ext']").val(data.street_ext).css('background-color',data.color);
                $("input[name='street_direction']").val(data.street_direction).css('background-color',data.color);
                $("input[name='suburb']").val(data.suburb).css('background-color',data.color);
                $("input[name='post_code']").val(data.post_code).css('background-color',data.color);

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

                $("select[name='sale_type']").focus();

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
    }



$(document).ready(function(){

    $('#data_table').DataTable( {
        //'ajax' : '/sat_auction/entry/lookup',
        //"columns": [
        //    { "data": "state" },
        //    { "data": "unit_no" },
        //    { "data": "suburb" },
        //    { "data": "property_type" },
        //    { "data": "agency_name" },
        //    { "data": "bedroom" }
        //],

        //"columnDefs": [
        //    {
        //        // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
       //         "render": function ( data, type, row ) {
        //            var address = row['unit_no'] != '' ? row['unit_no'] + '/' : '' ;
        //                address = address + row['street_no'] + ' ';
        //                address = address + row['street_name'] + ' ';
        //                address = address + row['street_direction'];

        //            return '<strong><a class="generate"  data-id="' + address + '">' + address + '</a></strong>' ;
        //        },
        //        "targets": 1
        //    },

       // ],

        "oSearch": {
            "sSearch": "Abbotsford"
        },



        'paging' : false,

        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                        .appendTo( $(column.header()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                            );

                            column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                        } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );

    //$(function () {
      //  $("#data_table").DataTable({
        //    "scrollY": "500px",
         //   "scrollCollapse": true,
         //   "paging":         false
       // });
   // });

    $('.generate').click(function(){
        $('#search_modal').modal('hide');
        $property = $(this).data('id');

        console.log($property);
        $.get('/sat_auction/search_property/' + $property , function (data) {
            console.log(data);
            if (data.state){

                $("select[name='state']").val(data.state.toUpperCase()).css('background-color',data.color);
                $("input[name='unit_no']").val(data.unit_no).css('background-color',data.color);
                $("input[name='street_no']").val(data.street_no).css('background-color',data.color);
                $("input[name='street_name']").val(data.street_name).css('background-color',data.color);
                $("input[name='street_ext']").val(data.street_ext).css('background-color',data.color);
                $("input[name='street_direction']").val(data.street_direction).css('background-color',data.color);
                $("input[name='suburb']").val(data.suburb).css('background-color',data.color);
                $("input[name='post_code']").val(data.post_code).css('background-color',data.color);

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

                $("select[name='sale_type']").focus();

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

