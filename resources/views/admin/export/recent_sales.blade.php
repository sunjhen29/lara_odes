@extends('layouts.admin.admin',['title'=>'Export','icon'=>'fa fa-file-text'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Recent Sales</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <form method="post">
            {{ csrf_field() }}
            <div class="col-md-1">
              <label for="job_name" class="control-label">Job Name</label>
            </div>
            <div class="col-md-2">
              <select class="form-control" id="job_name" name="job_name">
                <option>Interest Auction Results</option>
              </select>
            </div>
            <div class="col-md-1">
              <label for="job_name" class="control-label">Batch Date</label>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control aussie_date" id="job_date" name="job_date" size="13" value="{{ $default_date }}" required>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">View Batches</button>
            </div>
          </form>
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    @if($results)
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><strong></strong></h3>

        <div class="box-tools">
          <div>
            <a href="{{ url('/admin/export/interest/'.$batch->id) }}"><button class="btn btn-success btn-md addbutton pull-right"><i class="fa fa-download" aria-hidden="true"></i>  Export to CSV</button></a>
            <a href="{{ url('/admin/export/interest/'.$batch->id.'/excel') }}"><button class="btn btn-success btn-md addbutton pull-right"><i class="fa fa-file-excel-o" aria-hidden="true"></i>  Export to Excel</button></a>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>Batch Name</th>
            <th>Records</th>
            <th>Status</th>
          </tr>
          @foreach($results as $result)
            <tr>
              <td>{{ $result->batch_name }}</td>
              <td>{{ $result->records }}</td>
              <td></td>
            </tr>
          @endforeach
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <!-- <strong><span></span></strong> -->
      </div>
    </div> <!-- /.box -->
    @endif
  </div>
</div>
@endsection

