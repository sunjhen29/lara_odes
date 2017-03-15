<div class="panel-body">
        
      {!! Form::token() !!}
      
      {!! Form::hidden('user_id', \Auth::guard('web')->user()->id, ['class'=>'form-control']) !!}

      
      <div class="form-group">  
        {!! Form::label('sick_leave','Sick Leave',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-7 custom">
          {!! Form::text('sick_leave', null, ['class'=>'form-control']) !!}
        </div>
      </div>
      
      <div class="form-group">  
        {!! Form::label('vacation_leave','Force/Vacation Leave',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-7 custom">
          {!! Form::text('vacation_leave', null, ['class'=>'form-control']) !!}
        </div>
      </div>
      
      <div class="form-group">  
        {!! Form::label('paternity_leave', 'Paternity Leave',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-7 custom">
          {!! Form::text('paternity_leave', null, ['class'=>'form-control']) !!}
        </div>
      </div>
      
      <div class="form-group">  
        {!! Form::label('singleparent_leave', 'Single-Parent Leave',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-7 custom">
          {!! Form::text('singleparent_leave', null, ['class'=>'form-control']) !!}
        </div>
      </div>
      
      <div class="form-group">  
        {!! Form::label('emergency_leave', 'Emergency Leave',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-7 custom">
          {!! Form::text('emergency_leave', null, ['class'=>'form-control']) !!}
        </div>
      </div>
      
      <div class="form-group">  
        {!! Form::label('other_leave', 'Other Leave',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-7 custom">
          {!! Form::text('other_leave', null, ['class'=>'form-control']) !!}
        </div>
      </div>
    
      <hr style="height:1px;border:none;color:#D3D3D3;background-color:#D3D3D3;">
      
      <div class="col-md-offset-8">
        {!! Form::submit('SUBMIT', ['class'=>'btn btn-info']) !!}
        <a role="button" class="btn btn-info" href="{{ url('admin/setup/leave/view') }}">CANCEL</a>
      </div>

</div>
      

      
