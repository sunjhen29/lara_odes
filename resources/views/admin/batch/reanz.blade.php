@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-md-10">
    <h3>REA NZ</h3>
  </div>
  <div class="col-md-2">
    <button id="btn-add" name="btn-add" class="btn btn-success btn-md addbutton pull-right"><span class="glyphicon glyphicon-plus"></span> Add New Record</button>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-hover">
      <thread>
        <tr>
          <th>ID</th>
          <th>App</th>
          <th>Job Name</th>
          <th>Job No.</th>
          <th>Batch Date</th>
          <th>Status</th>
          <th>Records</th>
          <th>Remarks</th>
          <th>Date Added</th>
          <th>Export Date</th>
          <th>Actions</th>
        </tr>
      </thread>
      <tbody id="batch-list" name="batch-list">
        @foreach($batches as $batch)
        <tr id="batch{{$batch->id}}">
          <td>{{ $batch->id }}</td>
          <td>{{ $batch->application }}</td>
          <td>{{ $batch->job_name }}</td>
          <td>{{ $batch->jobnumber }}</td>
          <td>{{ $batch->batch_date }}</td>
          <td>{{ $batch->job_status }}</td>
          <td>{{ $batch->records }}</td>
          <td>{{ $batch->remarks }}</td>
          <td>{{ $batch->created_at }}</td>
          <td>{{ $batch->export_date }}</td>

          <td>
            <button class="btn btn-warning btn-xs btn-detail open-modal" data-toggle="modal" data-target="#myModal" value="{{$batch->id}}">Modify</button>
            <button class="btn btn-danger btn-xs btn-delete delete-batch" value="{{$batch->id}}">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div> <!-- end of col-->
</div> <!-- end of row-->
  
</div> <!-- end of container>

<!-- MODAL -->
<div id="myModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h4 class="modal-title"><b>Batch Form</b><button type="button" class="close" data-dismiss="modal">&times;<h4></h4></button></div>
            <div class="modal-body">
        
            {!! Form::open(array('role'=>'form','class'=>'form-horizontal','name'=>'frmBatch', 'id' => 'frmBatch'))!!}
      
              <div class="form-group">
                {!! Form::label('application','Application',['class'=>'control-label col-sm-4']) !!}
                  <div class="col-sm-5">
                    {!! Form::text('application','REA NZ Keying',['class'=>'form-control','required','readonly']) !!}
                  </div>
              </div>
              
              <div class="form-group">
                {!! Form::label('jobnumber','Job Number',['class'=>'control-label col-sm-4']) !!}
                  <div class="col-sm-5">
                    {!! Form::text('jobnumber',null,['class'=>'form-control','pattern'=>'[0-9]{4}', 'required']) !!}
                  </div>
              </div>
              
              <div class="form-group">
                {!! Form::label('job_name','Job Name',['class'=>'control-label col-sm-4']) !!}
                  <div class="col-sm-5">
                    {!! Form::select('job_name', ['REA NZ Keying'=>'REA NZ Keying'], null, ['class'=>'form-control','required']) !!}
                  </div>
              </div>
              
              <div class="form-group">
                {!! Form::label('batch_date','Date',['class'=>'control-label col-sm-4']) !!}
                  <div class="col-sm-5">
                    {!! Form::text('batch_date',null,['class'=>'form-control','placeholder'=>'dd/mm/yyyy','pattern'=>'^(((0[1-9]|[12]\d|3[01])/(0[13578]|1[02])/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)/(0[13456789]|1[012])/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])/02/((19|[2-9]\d)\d{2}))|(29/02/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$', 'required']) !!}
                  </div>
              </div>
              
              <div class="form-group">
                {!! Form::label('job_status','Status',['class'=>'control-label col-sm-4']) !!}
                  <div class="col-sm-5">
                    {!! Form::select('job_status', ['Open'=>'Open','Closed'=>'Closed','Pending'=>'Pending'], null, ['class'=>'form-control','pattern'=>'[aA-zZ]{1,25}']) !!}
                  </div>
              </div>
              
              <div class="form-group">
                {!! Form::label('records','Records',['class'=>'control-label col-sm-4']) !!}
                  <div class="col-sm-5">
                    {!! Form::text('records',null,['class'=>'form-control','pattern'=>'[0-9]']) !!}
                  </div>
              </div>
                    
              <div class="form-group">
                {!! Form::label('remarks','Remarks',['class'=>'control-label col-sm-4']) !!}
                  <div class="col-sm-5">
                    {!! Form::text('remarks',null,['class'=>'form-control','pattern'=>'[aA-zZ]']) !!}
                  </div>
              </div>
              
              <hr>
              
              <div class="form-group">
                <div class="col-sm-5 col-sm-offset-4">
                  <button type="submit" class="btn btn-primary" id="btn-save" value="add">Save</button>
                  <input type="hidden" id="batch_id" name="batch_id" value="0">
                </div>  
              </div>
            
              {!! Form::close() !!}   
                
          </div> <!-- end of modal body -->
    </div> <!-- end of modal content -->
  </div> <!-- end of modal dialog -->
</div> <!-- end of modal -->

@endsection

@push('scripts')
<script>
$(document).ready(function(){
    var url = "{{ url('/admin/batch') }}";

    //display modal form for batch editing
    $('.open-modal').click(function(){
        var batch_id = $(this).val();

        $.get(url + '/' + batch_id, function (data) {
            //success data
            //console.log(data);
            $('#batch_id').val(data.id);
            $('#application').val(data.application);
            $('#jobnumber').val(data.jobnumber);
            $('#job_name').val(data.job_name);
            $('#batch_date').val(data.batch_date);
            $('#job_status').val(data.job_status);
            $('#records').val(data.records);
            $('#remarks').val(data.remarks);
            $('#btn-save').html("Update");
            $('#btn-save').val("update");
            //$('#myModal').modal('show');
        }) 
    });

    //display modal form for creating new batch
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmBatch').trigger("reset");
        $('#btn-save').html("Save");
        $('#myModal').modal('show');
        $('#application').focus();
    });

    //delete task and remove it from list
    $('.delete-batch').click(function(){
        var batch_id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        
        $.ajax({
            type: "DELETE",
            url: url + '/' + batch_id,
            success: function (data) {
                console.log(data);
                $("#batch" + batch_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new task / update existing task
    $("#frmBatch").submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        
        e.preventDefault(); 
        
        var formData = {
            jobnumber: $('#jobnumber').val(),
            application: $('#application').val(),
            job_name: $('#job_name').val(),
            batch_date: $('#batch_date').val(),
            job_status: $('#job_status').val(),
            records: $('#records').val(),
            remarks: $('#remarks').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var batch_id = $('#batch_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + batch_id + '/edit';
        }

        //console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#myModal').modal('hide')
                var batch = '<tr id="batch' + data.id + '"><td>' + data.id + '</td>';
                batch += '<td>' + data.application +'</td>';
                batch += '<td>' + data.job_name + '</td>';
                batch += '<td>' + data.jobnumber + '</td>';
                batch += '<td>' + data.batch_date + '</td>';
                batch += '<td>' + data.job_status + '</td>';
                batch += '<td>' + data.records + '</td>';
                batch += '<td>' + data.remarks + '</td>';
                batch += '<td>' + data.created_at + '</td><td>' + data.export_date + '</td>'
                batch += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" data-toggle="modal" data-target="#myModal" value="' + data.id + '">Modify</button>';
                batch += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '"> Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#batch-list').append(batch);
                } else { //if user updated an existing record
                    $("#batch" + batch_id).replaceWith( batch );
                }
                $('#frmBatch').trigger("reset");
                
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    
    var isCtrl = false;
    var isShift = false;
    
    $(window).keydown(function(e){
      if(e.keyCode == 17){
        isCtrl = true;
      }
      if(e.keyCode == 16){
        isShift = true;
      }
      if(e.keyCode == 65 && isCtrl == true && isShift == true){
        e.preventDefault();
        $('#btn-save').val("add");
        $('#frmBatch').trigger("reset");
        $('#btn-save').html("Save");
        $('#myModal').modal('show');
        $('#application').focus();
      }
    });
    
    $(window).keyup(function(e) {
			isCtrl = false;
			isShift = false;
			return;
		});


});
</script>
@endpush
