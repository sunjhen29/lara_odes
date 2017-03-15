@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-md-10">
    <h3><b>View Entry Logs</b></h3>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-hover">
      <thread>
        <tr>
          <th>#</th>
          <th>Application</th>
          <th>Job Name</th>
          <th>Date</th>
          <th>Batch Name</th>
          <th>Record ID</th>
          <th>User ID</th>
          <th>Action</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Job Number</th>
        </tr>
      </thread>
      <tbody>
        @foreach($entry_logs as $entry_log)
          <tr>
            <td>{{ $entry_log->id  }}</td>
            <td>{{ $entry_log->log->application }}</td>
            <td>{{ $entry_log->log->job_name }}</td>
            <td>{{ $entry_log->log->batch_date }}</td>
            <td>{{ $entry_log->batch_name }}</td>
            <td>{{ $entry_log->record_id }}</td>
            <td>{{ $entry_log->user_id }}</td>
            <td>{{ $entry_log->action }}</td>
            <td>{{ $entry_log->start }}</td>
            <td>{{ $entry_log->end }}</td>
            <td>{{ $entry_log->job_log->job_number }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div> <!-- end of col-->
</div> <!-- end of row-->
</div><!-- end of container -->
@endsection

