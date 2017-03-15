@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-md-6">
    <h3><b>System Users</b></h3>
  </div>
  <div class="col-md-2 col-md-offset-4">
    <a href="{{ url('/admin/setup/sysusers/add') }}" class="btn btn-success btn-md addbutton pull-right"><span class="glyphicon glyphicon-plus"></span> ADD USER</a>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-hover">
      <thread>
        <tr>
          <th>OPERATOR ID</th>
          <th>USERNAME</th>
          <th>FIRSTNAME</th>
          <th>LASTNAME</th>
          <th>E-MAIL</th>
          <th>ACCESS LEVEL</th>
          <th>ACTIONS</th>
          <th>DATE ADDED</th>
        </tr>
      </thread>
      <tbody>
        @foreach($results as $record)
        <tr>
          <td>{{ $record->operator_id }}</td>
          <td>{{ $record->name }}</td>
          <td>{{ $record->firstname }}</td>
          <td>{{ $record->lastname }}</td>
          <td>{{ $record->email }}</td>
          <td>{{ $record->access_level }}</td>
          <td>
            <a href="{{ url('/admin/setup/sysusers/'.$record->id.'/edit') }}" class="btn btn-info btn-xs">MODIFY</a>
            <a class="btn btn-danger btn-xs delete" data-toggle="modal" data-target="#delete-modal" data-id="{{ $record->id }}">DELETE</a>
          </td>
          <td>{{ $record->created_at }}</td>
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
        <form class="form-horizontal" action="/admin/setup/sysusers/delete" method="post">
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
