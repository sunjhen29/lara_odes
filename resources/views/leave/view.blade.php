@extends('layouts.app')

@section('content')
<div class="container-fluid">
  
  <div class="row">
    <div class="col-md-11">
      <h2>{{ Auth::guard('web')->user()->firstname.' '.Auth::guard('web')->user()->lastname }} ({{ $results->operator_id }})</h2>
    </div>
    
    <div class="col-md-1">
      <img src="{{ asset('/images/userprofile/'.Auth::guard('web')->user()->id.'.jpg') }}" class="img-thumbnail" height="100" width="100" />
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th></th>
            <th class="text-center">SICK LEAVE</th>
            <th class="text-center">VACATION LEAVE</th>
            <th class="text-center">PATERNITY LEAVE</th>
            <th class="text-center">SINGLE-PARENT LEAVE</th>
            <th class="text-center">EMERGENCY LEAVE</th>
            <th class="text-center">OTHER LEAVE</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>LEAVE</td>
              <td class="text-center">{{ $results->leave['sick_leave'] }}</td>
              <td class="text-center">{{ $results->leave['vacation_leave'] }}</td>
              <td class="text-center">{{ $results->leave['paternity_leave'] }}</td>
              <td class="text-center">{{ $results->leave['singleparent_leave'] }}</td>
              <td class="text-center">{{ $results->leave['emergency_leave'] }}</td>
              <td class="text-center">{{ $results->leave['other_leave'] }}</td>
            </tr>
            <tr>
              <td>APPROVED</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>REMAINING</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
        </tbody>
      </table>
    </div> <!-- end of col-->
  </div> <!-- end of row-->

<hr>

  <div class='row'>
    <div class="col-md-12">
    <div class="form-group">
      <a href="{{ url('/leave/add') }}" class="btn btn-success btn-md addbutton pull-right"><span class="glyphicon glyphicon-plus"></span> FILE LEAVE FORM</a>
    </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">DATE ADDED</th>
            <th class="text-center">TYPE OF LEAVE</th>
            <th class="text-center">FROM</th>
            <th class="text-center">TO</th>
            <th class="text-center">NO. OF DAYS</th>
            <th class="text-center">REASON</th>
            <th class="text-center">STATUS</th>
            <th class="text-center">APPROVED BY</th>
            <th class="text-center">ACTION</th>
          </tr>
        </thead>
        <tbody>
          @foreach($results->leaves as $result)
            <tr>
              <td class="text-center">{{ $result->created_at }}</td>
              <td class="text-center">{{ $result->leave_type }}</td>
              <td class="text-center">{{ $result->date_from }}</td>
              <td class="text-center">{{ $result->date_to }}</td>
              <td class="text-center">{{ $result->no_days }}</td>
              <td class="text-center">{{ $result->reason }}</td>
              <td class="text-center">{{ $result->status }}</td>
              <td class="text-center">{{ $result->approved_by }}</td>
              <td class="text-center">
                @if ($result->status == 'PENDING' || $result->status == 'APPROVED' || $result->status == 'DECLINED')
                  <a href="{{ url('/leave/'.$result->id.'/edit') }}" class="btn btn-info btn-xs disabled">MODIFY</a>
                  <a class="btn btn-danger btn-xs delete disabled" data-toggle="modal" data-target="#delete-modal" data-id="{{ $result->id }}">DELETE</a>
                  <a href="{{ url('/leave/'.$result->id.'/status') }}" class="btn btn-primary btn-xs disabled">SEND</a>
                @else 
                  <a href="{{ url('/leave/'.$result->id.'/edit') }}" class="btn btn-info btn-xs">MODIFY</a>
                  <a class="btn btn-danger btn-xs delete" data-toggle="modal" data-target="#delete-modal" data-id="{{ $result->id }}">DELETE</a>
                  <a href="{{ url('/leave/'.$result->id.'/status') }}" class="btn btn-primary btn-xs">SEND</a>
                @endif
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
        <form class="form-horizontal" action="/leave/delete" method="post">
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
