@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-md-10">
    <h3><b>EP 90 Stats Output</b></h3>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <form id="frmProductionReport" class="form-inline" style="border:1px solid darkgray; padding:20px; border-radius: 5px;">
      <div class="form-group">
          <label for="production_date">Production Date</label>
            <input type="text" class="form-control aussie_date" id="production_date" name="production_date" placeholder="dd/mm/yyyy" required pattern='^(((0[1-9]|[12]\d|3[01])/(0[13578]|1[02])/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)/(0[13456789]|1[012])/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])/02/((19|[2-9]\d)\d{2}))|(29/02/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$'>
      </div>
      <button type="submit" id="btn-search" class="btn btn-primary">View Logs</button>
    </form> <!-- end of master form-->                
  </div> <!-- end of panel body-->
</div> <!-- end of row-->  

<br>

<div class="row" id="results_table">
  <div class="col-md-9">
    <h3 style="margin-top:0">Logs Table</h3>
  </div>
  <div class="col-md-3">
    {!! Form::open(array('role'=>'form','url'=>'/admin/export/stats_output','method'=>'GET','class'=>'form-inline'))!!}
    {!! Form::token() !!}
      <div class = "input-group pull-right">
         <input type="hidden" name="prod_date" id="prod_date" value="" class="form-control"/>
         {!! Form::submit('Export Text File',['class'=>'btn btn-primary']) !!}
      </div><!-- /input-group -->
    {!! Form::close() !!}
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Action</th>
          <th>Job Number</th>
          <th>Batch Name</th>
          <th>Record ID</th>
          <th>Start</th>
          <th>End</th>
        </tr>
      </thead>
      <tbody id="records-list">
      </tbody>
    </table>
  </div> <!-- end of col-->
</div> <!-- end of row-->
  
</div> <!-- end of container> -->

@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('#results_table').hide();
      
    // search button ajax
    $("#frmProductionReport").submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        
        e.preventDefault(); 
        var formData = {
            production_date: $('#production_date').val(),
        }

        $.ajax({
            type: 'POST',
            url: "{{ url('/admin/export/stats') }}",
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                
                if(data == ""){
                  $('#results_table').hide();
                } else {
                  $('#results_table').show();
                }
                
                $('#records-list > tr').remove();
                $.each(data, function (index, value) {
                  var report = '<tr><td>' + value.action +'</td>';
                  report += '<td>' + value.jobnumber_id + '</td>';
                  report += '<td>' + value.batch_name + '</td>';
                  report += '<td>' + value.record_id + '</td>';
                  report += '<td class="text-right">' + value.start + '</td>';
                  report += '<td class="text-right">' + value.end + '</td></tr>';
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
});
  
</script>
@endpush