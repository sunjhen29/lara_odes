@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-md-11">
    <h3><b>Application Setup</b></h3>
  </div>
  <div class="col-md-1">
    <a href="{{ url('/admin/setup/application/add') }}" class="btn btn-success btn-md addbutton pull-right"><span class="glyphicon glyphicon-plus"></span> Add Application</a>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>APPLICATION NAME</th>
          <th>FOLDER PATH</th>
          <th>ENTRY TYPE</th>
          <th>STATUS</th>
          <th>DESCRIPTION</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
         @foreach($results as $record)
          <tr>
            <td>{{ $record-> application_name }}</td>
            <td>{{ $record-> folder_path }}</td>
            <td>{{ $record-> entry_type }}</td>
            <td>{{ $record-> status }}</td>
            <td>{{ $record-> description }}</td>
            <td>
              <a href="{{ url('/admin/setup/application/'.$record->id.'/edit') }}" class="btn btn-info btn-xs">MODIFY</a>
              <a class="btn btn-danger btn-xs delete" data-toggle="modal" data-target="#delete-modal" data-id="{{ $record->id }}">DELETE</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <b><span>{{ count($record) != 0 ? count($record->applications).' Records Found' : '0 Record' }}</span></b>
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
