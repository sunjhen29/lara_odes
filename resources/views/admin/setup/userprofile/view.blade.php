@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-md-12">
    <h3><b>Update User Profile</b></h3>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-hover">
      <thread>
        <tr>
          <th>PHOTO</th>
          <th>OPERATOR ID</th>
          <th>USERNAME</th>
          <th>NAME</th></th>
          <th>CONTACT NO.</th>
          <th>ADDRESS</th>
          <th>ACTION</th>
        </tr>
      </thread>
      @if(isset($results))
      <tbody>
        @foreach($results as $result)
          <tr>
            <td><img src="{{ asset('/images/userprofile/'.$result->id.'.jpg') }}" class="img-thumbnail" height="60" width="60"></td>
            <td>{{ $result->operator_id }}</td>
            <td>{{ $result->name }}</td>
            <td>{{ $result->firstname.' '.$result->lastname }}</td>     
            <td>{{ $result->profile['contact_no'] }}</td>
            <td>{{ $result->profile['address'] }}</td>
            <td>
              <a href="{{ url('/admin/setup/userprofile/'.$result->profile['id'].'/edit') }}" class="btn btn-info btn-xs">UPDATE PROFILE</a>
            </td>
          </tr>
        @endforeach
      </tbody>
      @endif
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
        <form class="form-horizontal" action="/admin/setup/userprofile/delete" method="post">
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
