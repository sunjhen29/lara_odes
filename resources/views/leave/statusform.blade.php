<div class="panel-body">
        
      {!! Form::token() !!}
        
      <div class="form-group">
        {!! Form::hidden('user_id', Auth::guard('web')->user()->id, ['class'=>'form-control', 'readonly','required']) !!}
      </div>
    
      <div class="form-group">  
        {!! Form::label('leave_type','Leave Type',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-7 custom">
          {!! Form::select('leave_type', $leave_type, null, ['class'=>'form-control', 'disabled']) !!}
        </div>
      </div>
      
      <div class="form-group">  
        {!! Form::label('date_from','Date From',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-7 custom">
          {!! Form::text('date_from', null, ['class'=>'form-control aussie_date', 'readonly']) !!}
        </div>
      </div>
      
      <div class="form-group">  
        {!! Form::label('date_to','Date To',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-7 custom">
          {!! Form::text('date_to', null, ['class'=>'form-control date1', 'readonly']) !!}
        </div>
      </div>
      
      <div class="form-group">  
        {!! Form::label('no_days','No. of Days',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-7 custom">
          {!! Form::text('no_days', null, ['class'=>'form-control', 'readonly']) !!}
        </div>
      </div>
      
      <div class="form-group">  
        {!! Form::label('reason','Reason',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-7 custom">
          {!! Form::textarea('reason', null, ['class'=>'form-control', 'readonly']) !!}
        </div>
      </div>
      
          {{ Form::hidden('status', 'PENDING', ['id' => 'status']) }}

      <hr style="height:1px;border:none;color:#D3D3D3;background-color:#D3D3D3;">
      
      <div class="col-md-offset-8">
        {!! Form::submit('SUBMIT', ['class'=>'btn btn-info']) !!}
        <a role="button" class="btn btn-info" href="{{ url('/leave/view') }}">CANCEL</a>
      </div>

</div>
      

      
