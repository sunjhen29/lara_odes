@extends('layouts.dataentry.dataentry')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <img src="/images/userprofile/{{ $results->profile_image ? $results->profile_image : 'user.jpg'}}" class="img-responsive thumbnail" alt="User Image" width="100%">

      <div class="list-group">
        <a href="{{ url('dataentry') }}" class="list-group-item active"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
        <a href="{{ url('profile') }}" class="list-group-item"><i class="glyphicon glyphicon-user"></i> Profile</a>
        <a href="{{ url('/logout') }}" class="list-group-item"><i class="glyphicon glyphicon-off"></i> Log Out</a>
     </div>
    </div>

    <div class="col-sm-9">
      <div class="page-header">
        <h1>Profile</h1>
      </div>

        {!! Form::model($results,array('role'=>'form','url'=>'/profile/'.$results->id.'/edit','action'=>'POST', 'files'=>'true'))!!}

        {{ csrf_field() }}

        <div class="form-group">
          <label class="control-label">Employee No.</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{ Auth::guard('web')->user()->operator_id }}" readonly>
        </div>

        <div class="form-group">
          <label class="control-label">Employee Name</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{ strtoupper(Auth::guard('web')->user()->lastname.', '.Auth::guard('web')->user()->firstname) }}" readonly>
        </div>

        <div class="form-group">
          {!! Form::label('contact_no','Contact No.',['class'=>'control-label']) !!}
          {!! Form::text('contact_no', null, ['class'=>'form-control', 'required']) !!}
        </div>

       <div class="form-group">
          {!! Form::label('address','Home Address',['class'=>'control-label']) !!}
          {!! Form::text('address', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('user_img','User Image',['class'=>'control-label']) !!}
          {!! Form::file('user_img', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Update Profile', ['class'=>'btn btn-info']) !!}
        </div>

        {!! Form::close() !!}

    </div>
  </div>

</div> <!-- end of container -->
@endsection
