@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-md-12">
    <h3><b>Leave Setup</b></h3>
  </div>
  
  <!-- <div class="form-group">
    <a href="{{ url('admin/setup/leave/add') }}" class="btn btn-success btn-md addbutton pull-right"><span class="glyphicon glyphicon-plus"></span> ADD USER</a>
  </div> -->

  <div class="row">
    <div class="col-md-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>OPERATOR ID</th>
            <th>NAME</th>
            <th>SICK LEAVE</th>
            <th>VACATION LEAVE</th>
            <th>PATERNITY LEAVE</th>
            <th>SINGLE-PARENT LEAVE</th>
            <th>EMERGENCY LEAVE</th>
            <th>OTHER LEAVE</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          @foreach($results as $result)
            <tr>
              <td>{{ $result->operator_id }}</td>
              <td>{{ $result->firstname.' '.$result->lastname }}</td>
              <td>{{ $result->leave['sick_leave'] }}</td>
              <td>{{ $result->leave['vacation_leave'] }}</td>
              <td>{{ $result->leave['paternity_leave'] }}</td>
              <td>{{ $result->leave['singleparent_leave'] }}</td>
              <td>{{ $result->leave['emergency_leave'] }}</td>
              <td>{{ $result->leave['other_leave'] }}</td>
              <td>
                <a href="{{ url('admin/setup/leave/'.$result->profile['id'].'/edit') }}" class="btn btn-info btn-xs">MODIFY</a>
              </td>
            </tr>
          @endforeach  
        </tbody>
      </table>
     
    </div> <!-- end of col-->
  </div> <!-- end of row-->
  
  </div> <!-- end of container-->

<div id="delete-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>DELETE</b></h4>
      </div>
        <form class="form-horizontal" action="/admin/setup/application/delete" method="post">
          <div class="modal-body">
            <h4>Are you sure you want to delete?</h4>
            {{ csrf_field() }}
            <input name="delete_id" id="delete_id" type="hidden" value="" />
          </div> <!-- end of modal body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger">Yes</button> <!-- data dismiss? -->
              <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
            </div>
        </form> <!-- end of form horizontal -->
    </div><!-- end of modal content -->
  </div> <!-- end of modal dialog -->
</div> <!-- end of modal -->

@endsection

@push('scripts')
<script>
  $(document).on('click', '.delete', function() {
      $('#delete_id').val($(this).data("id"));
  });
</script>
@endpush
