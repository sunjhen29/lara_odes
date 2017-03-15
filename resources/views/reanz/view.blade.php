@extends('layouts.reanz')

@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-md-9">
      <h3>{{ $results->job_name.' '.$results->batch_date }}</h3>
      <h4>{{ session('batch_name') }}</h4>
      <h4>{{ session('jobnumber')->job_number }}</h4>
    </div>
  </div>
  
  <div class="row">
  <div class="col-md-12">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Listing Id</th>
          <th>Property ID</th>
          <th>List Date</th>
          <th>Property Address</th>
          <th>Price Guide</th>
          <th>Bed</th>
          <th>Bath</th>
          <th>Car</th>
          <th>Agency Name</th>
          <th>Agent</th>
          <th>Agent Mobile</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($results->reanzs as $result)
          <tr>
            <td>{{ $result->id }}</td>
            <td>{{ $result->listing_id }}</td>
            <td>{{ $result->property_id }}</td>
            <td>{{ $result->list_date }}</td>
            <td>{{ $result->property_address }}</td>
            <td>{{ $result->price_guide }}</td>
            <td>{{ $result->bedrooms }}</td>
            <td>{{ $result->bathrooms }}</td>
            <td>{{ $result->car_spaces }}</td>
            <td>{{ $result->agency_name }}</td>
            <td>{{ $result->agent }}</td>
            <td>{{ $result->agent_mobile }}</td>
            <td class="text-center">
              <a href="{{ url('/reanz/'.$result->id.'/edit') }}" class="btn btn-info btn-xs">Modify</a></button>
              <a class="btn btn-danger btn-xs delete" data-toggle="modal" data-target="#delete-modal" data-id="{{ $result->id }}">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <b><span>{{ count($results) != 0 ? count($results->reanzs).' Records Found' : '0 Record' }}</span></b>
  </div> <!-- end of col-->
  </div> <!-- end of row-->
</div> <!-- end of container -->

<div id="delete-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>DELETE</b></h4>
      </div>
        <form class="form-horizontal" action="/reanz/delete" method="post">
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