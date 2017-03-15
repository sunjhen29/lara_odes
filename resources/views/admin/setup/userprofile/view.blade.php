@extends('layouts.admin.admin',['title'=>'Setup','icon'=>'fa fa-clock-o'])

@section('content')
<div class="row">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><strong>User Profile</strong></h3>
          <div class="box-tools">

          </div>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table id="data_table" class="table table-hover">
            <thead>
            <tr>
              <th>PHOTO</th>
              <th>OPERATOR ID</th>
              <th>USERNAME</th>
              <th>NAME</th></th>
              <th>CONTACT NO.</th>
              <th>ADDRESS</th>
              <th>ACTION</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($results))
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
              @endif
            </tbody>
            <tfoot></tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</div>
@endsection
