
    
    <div class="form-group">
        {!! Form::label('property_address','Property Address',['class'=>'control-label col-md-3 col-sm-3']) !!}
        <div class="col-md-6 col-sm-6 custom">
          {!! Form::text('property_address', null,['class'=>'form-control input-sm', 'required']) !!}
        </div>
    </div>
      
    <div class="hidden">
        {!! Form::label('unit_no','Unit No.',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('unit_no', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('st_no_pref','Street No. Prefix.',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('st_no_pref', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('street_no','Street No.',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('street_no', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('st_no_suffix','Street No. Suffix',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('st_no_suffix', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('street_name','Street Name',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('street_name', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('street_type','Street Type',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('street_type', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('quadrant','Quadrant',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('quadrant', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('suburb','Suburb',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('suburb', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('city','City',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('city', null,['class'=>'form-control input-sm']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('price_guide','Price Guide',['class'=>'control-label col-md-3 col-sm-3']) !!}
        <div class="col-md-6 col-sm-6 custom">
          {!! Form::text('price_guide', null,['class'=>'form-control input-sm']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('bedrooms','Bedrooms',['class'=>'control-label col-md-3 col-sm-3']) !!}
        <div class="col-md-1 col-sm-1 custom">
          {!! Form::text('bedrooms', null,['class'=>'form-control input-sm', 'pattern'=>'[0-9]{1,2}']) !!}
        </div>
        {!! Form::label('bathrooms','Bathrooms',['class'=>'control-label col-md-2 col-sm-2']) !!}
        <div class="col-md-1 col-sm-1 custom">
          {!! Form::text('bathrooms', null,['class'=>'form-control input-sm', 'pattern'=>'[0-9]{1,2}']) !!}
        </div>
        {!! Form::label('car_spaces','Car Spaces',['class'=>'control-label col-md-2 col-sm-2']) !!}
        <div class="col-md-1 col-sm-1 custom">
          {!! Form::text('car_spaces', null,['class'=>'form-control input-sm', 'pattern'=>'[0-9]{1,2}']) !!}
        </div>
    </div>
    
    <div class="hidden">
        {!! Form::label('sale_method','Sale Method',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('sale_method', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('auction_day','Auction Day',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('auction_day', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('auction_time','Auction Time',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('auction_time', null,['class'=>'form-control input-sm']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('auction_date','Auction Date',['class'=>'control-label col-md-3 col-sm-3']) !!}
        <div class="col-md-2 col-sm-2 custom">
          {!! Form::text('auction_date',null,['class'=>'form-control input-sm aussie_date', 'pattern'=>'^(((0[1-9]|[12]\d|3[01])/(0[13578]|1[02])/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)/(0[13456789]|1[012])/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])/02/((19|[2-9]\d)\d{2}))|(29/02/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('land_size','Land Size',['class'=>'control-label col-md-3 col-sm-3']) !!}
        <div class="col-md-2 col-sm-2 custom">
          {!! Form::text('land_size', null,['class'=>'form-control input-sm land_size']) !!}
        </div>
        {!! Form::label('floor_size','Floor Size',['class'=>'control-label col-md-2 col-sm-2']) !!}
        <div class="col-md-2 col-sm-2 custom">
          {!! Form::text('floor_size', null,['class'=>'form-control input-sm', 'pattern'=>'[aA-zZ0-9\s\.]{1,10}']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('agency_name','Agency Name',['class'=>'control-label col-md-3 col-sm-3']) !!}
        <div class="col-md-6 col-sm-6 custom">
          {!! Form::text('agency_name', null,['class'=>'form-control input-sm', 'required']) !!}
        </div>
        {!! Form::hidden('agency_id','Agency ID',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::hidden('agency_id', null,['class'=>'form-control input-sm']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('agent','Agent',['class'=>'control-label col-md-4 col-sm-4']) !!}
        {!! Form::label('agent_mobile','Contact',['class'=>'control-label col-md-3 col-sm-3']) !!}
    </div>
    
    <div class="form-group">
        <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 custom">
          {!! Form::text('agent', null,['class'=>'form-control input-sm', 'pattern'=>'[aA-zZ\s\'\.\-/&/]{1,25}']) !!}
        </div>
        <div class="col-md-3 col-sm-3 custom">
          {!! Form::text('agent_mobile', null,['class'=>'form-control input-sm', 'pattern'=>'[0-9\s\-]{1,25}']) !!}
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 custom">
          {!! Form::text('agent1', null,['class'=>'form-control input-sm', 'pattern'=>'[aA-zZ\s\'\.\-/&/]{1,25}']) !!}
        </div>
        <div class="col-md-3 col-sm-3 custom">
          {!! Form::text('agent_mobile1', null,['class'=>'form-control input-sm', 'pattern'=>'[0-9\s\-]{1,25}']) !!}
        </div>
    </div>
    
    <div class="hidden">
        {!! Form::label('agent_id','Agent ID',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('agent_id', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('agent_phone','Agent Phone',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('agent_phone', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('direct_dial','Agent Direct Dial',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('direct_dial', null,['class'=>'form-control input-sm']) !!}
        </div>
        {!! Form::label('photo_count','Photo Count',['class'=>'control-label col-md-3']) !!}
        <div class="col-md-6 custom">
          {!! Form::text('photo_count', null,['class'=>'form-control input-sm']) !!}
        </div>
    </div>
   
