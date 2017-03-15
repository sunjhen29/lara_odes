<div class="panel panel-default">
  <div class="panel-heading"><b><h4>REA NZ</h4></b></div>
    
  <div class="panel-body">
        
    {{ csrf_field() }}
    
    <div class="form-group">  
        {!! Form::label('batch_name','Batch Name',['class'=>'control-label col-md-3 col-sm-3']) !!}
        <div class="col-md-3 col-sm-3 custom">
          {!! Form::text('batch_name',session('batch_name'),['class'=>'form-control input-sm', 'required','readonly']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('state','State',['class'=>'control-label col-md-3 col-sm-3']) !!}
        <div class="col-md-1 col-sm-1 custom">
          {!! Form::text('state','NZ', ['class'=>'form-control input-sm', 'required', 'readonly']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('listing_id','Listing ID',['class'=>'control-label col-md-3 col-sm-3']) !!}
        <div class="col-md-3 col-sm-3 custom">
          {!! Form::text('listing_id', null, ['class'=>'form-control input-sm']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('property_id','Property ID',['class'=>'control-label col-md-3 col-sm-3']) !!}
        <div class="col-md-3 col-sm-3 custom">
          {!! Form::text('property_id', null, ['class'=>'form-control input-sm']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('list_date','List Date',['class'=>'control-label col-md-3 col-sm-3']) !!}
        <div class="col-md-2 col-sm-2 custom">
          {!! Form::text('list_date', $results->batch_date, ['class'=>'form-control input-sm', 'pattern'=>'^(((0[1-9]|[12]\d|3[01])/(0[13578]|1[02])/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)/(0[13456789]|1[012])/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])/02/((19|[2-9]\d)\d{2}))|(29/02/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$', 'readonly']) !!}
        </div>
        {!! Form::label('site_area','Site Area',['class'=>'control-label col-md-2 col-sm-2']) !!}
        <div class="col-md-2 col-sm-2 custom">
          {!! Form::text('site_area', 'RENT',['class'=>'form-control input-sm', 'readonly']) !!}
        </div>
        {!! Form::hidden('scrape_date','Scrape Date',['class'=>'control-label col-md-2']) !!}
        <div class="col-md-2 custom">
          {!! Form::hidden('scrape_date', null,['class'=>'form-control input-sm', 'pattern'=>'^(((0[1-9]|[12]\d|3[01])/(0[13578]|1[02])/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)/(0[13456789]|1[012])/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])/02/((19|[2-9]\d)\d{2}))|(29/02/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$']) !!}
        </div>
        {!! Form::hidden('url','URL',['class'=>'control-label col-md-2']) !!}
        <div class="col-md-2 custom">
          {!! Form::hidden('url', null,['class'=>'form-control input-sm']) !!}
        </div>
    </div>
    
    @include('reanz.form')
   
  </div> <!-- end of body -->
  
  <div class="panel-footer">
    <div class="form-group">
      <div class="col-md-2 col-md-offset-10 col-sm-2 col-sm-offset-10">
        <button type="submit" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-check"></span>  Submit</button>
      </div>
    </div>
  </div>
  
</div> <!-- end of panel -->

@if($errors->any())
  <ul class="alert alert-danger">
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
  </ul>
@endif