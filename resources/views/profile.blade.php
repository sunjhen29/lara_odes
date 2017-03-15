@extends('layouts.dataentry.dataentry')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <img src="img/user.jpg" class="img-responsive thumbnail" alt="San Fran" width="100%">
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

      <form>
        <div class="form-group">
          <label class="control-label for="email">Employee No.</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" value="000642" readonly>

        </div>
        <div class="form-group">
          <label class="control-label for="email">Employee Name</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" value="DOCTOLERO, SUNDAY N." readonly>
        </div>
        <div class="form-group">
          <label class="control-label for="email">Shift Schedule</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" value="FIRST SHIFT" readonly>
        </div>
        <div class="form-group">
          <label class="control-label for="email">Department</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" value="PRODUCTION" readonly>
        </div>
      </form>


    </div>
  </div>

</div> <!-- end of container -->
@endsection
