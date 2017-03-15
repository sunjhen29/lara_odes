@extends('layouts.admin.admin',['title'=>'Setup','icon'=>'fa fa-clock-o'])

@section('content')
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">View User Info</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <ul class="products-list product-list-in-box">
        @if(isset($results))
        @foreach($results as $result)
        <li class="item">
          <div class="product-img">
            <img src="{{ asset('/images/userprofile/'.$result->id.'.jpg') }}" alt="User Image">
          </div>
          <div class="product-info">
            <a href="javascript:void(0)" class="product-title">{{ $result->operator_id.' | '.$result->firstname.' '.$result->lastname }}
              <span class="label label-warning pull-right">{{ $result->name }}</span></a>
                        <span class="product-description">
                          {{ $result->profile['contact_no'] }}
                        </span>
                        <span class="product-description">
                          {{ $result->profile['address'] }}
                        </span>
                        <span class="product-description">
                          <a href="{{ url('/admin/setup/userprofile/'.$result->profile['id'].'/edit') }}" class="btn btn-info btn-xs">Update Profile</a>
                        </span>
          </div>
        </li>
        @endforeach
        @endif
      </ul>
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">

    </div><!-- /.box-footer -->
  </div><!-- /.box -->
@endsection
