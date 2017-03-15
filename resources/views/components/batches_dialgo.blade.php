<div id="myModal" class="modal modal-primary">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Batch</h4>
            </div>
            {!! Form::open(array('role'=>'form','class'=>'form-horizontal','name'=>'frmBatch', 'id' => 'frmBatch'))!!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('application','Application',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('application',$application,['class'=>'form-control','required','readonly']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('jobnumber','Job Number',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('jobnumber',null,['class'=>'form-control','pattern'=>'[0-9]{4}', 'required', 'autofocus']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('job_name','Job Name',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::select('job_name', ['Interest Auction Results'=>'Interest Auction Results'], null, ['class'=>'form-control','required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('batch_date','Date',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('batch_date',null,['class'=>'form-control aussie_date','placeholder'=>'dd/mm/yyyy','pattern'=>'^(((0[1-9]|[12]\d|3[01])/(0[13578]|1[02])/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)/(0[13456789]|1[012])/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])/02/((19|[2-9]\d)\d{2}))|(29/02/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$', 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('job_status','Status',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::select('job_status', ['Open'=>'Open','Closed'=>'Closed','Pending'=>'Pending'], null, ['class'=>'form-control','pattern'=>'[aA-zZ]{1,25}']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('remarks','Remarks',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('remarks',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <input type="hidden" id="batch_id" name="batch_id" value="0">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline" id="btn-save" value="add">Save</button>
            </div>

            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->












var url = "{{ url('/admin/batch') }}";

//Update :: display modal form for batch editing
$('.open-modal').click(function(){
var batch_id = $(this).val();
$.get(url + '/' + batch_id, function (data) {
//success data
//console.log(data);
$('#batch_id').val(data.id);
$('#application').val(data.application);
$('#jobnumber').val(data.jobnumber);
$('#job_name').val(data.job_name);
$('#batch_date').val(data.batch_date);
$('#job_status').val(data.job_status);
$('#remarks').val(data.remarks);
$('.modal-title').html('Update Record');
$('#btn-save').html("Update");
$('#btn-save').val("update");
$('#jobnumber').focus();
//$('#myModal').modal('show');
})
});

//Add :: display modal form for creating new batch
/* $('#btn-add').click(function(){
$('#btn-save').val("add");
$('#frmBatch').trigger("reset");
$('#btn-save').html("Save");
$('#myModal').modal('show');
$('#jobnumber').focus();
}); */



//Delete ::
$('.delete-batch').click(function(){
$('#confirm').val($(this).data("id"));
});

$('#confirm').click(function(){
var batch_id = $(this).val();

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
}
});

$.ajax({
type: "DELETE",
url: url + '/' + batch_id,
success: function (data) {
console.log(data);
$("#batch" + batch_id).remove();
},
error: function (data) {
console.log('Error:', data);
}
});

$('#delete-modal').modal('hide');
});


//create new task / update existing task
/*$("#frmBatch").submit(function (e) {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
}
})

//e.preventDefault();

var formData = {
jobnumber: $('#jobnumber').val(),
application: $('#application').val(),
job_name: $('#job_name').val(),
batch_date: $('#batch_date').val(),
job_status: $('#job_status').val(),
remarks: $('#remarks').val(),
}

//used to determine the http verb to use [add=POST], [update=PUT]
var state = $('#btn-save').val();

var type = "POST"; //for creating new resource
var batch_id = $('#batch_id').val();;
var my_url = url;

if (state == "update"){
type = "PUT"; //for updating existing resource
my_url += '/' + batch_id + '/edit';
}

//console.log(formData);

$.ajax({

type: type,
url: my_url,
data: formData,
dataType: 'json',
success: function (data) {
console.log(data);
$('#myModal').modal('hide')
var batch = '<tr id="batch' + data.id + '"><td>' + data.id + '</td>';
    batch += '<td>' + data.application +'</td>';
    batch += '<td>' + data.job_name + '</td>';
    batch += '<td>' + data.jobnumber + '</td>';
    batch += '<td>' + data.batch_date + '</td>';
    batch += '<td>' + data.job_status + '</td>';
    batch += '<td>0</td>';
    batch += '<td>' + data.remarks + '</td>';
    batch += '<td>' + data.created_at + '</td><td></td>';
    batch += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" data-toggle="modal" data-target="#myModal" value="' + data.id + '">Modify</button>';
        batch += '<button class="btn btn-danger btn-xs btn-delete delete-batch" data-toggle="modal" data-target="#delete-model" data-id="' + data.id + '"> Delete</button></td></tr>';


if (state == "add"){ //if user added a new record
$('#batch-list').append(batch);
} else { //if user updated an existing record
$("#batch" + batch_id).replaceWith( batch );
}
$('#frmBatch').trigger("reset");

},
error: function (data) {
console.log('Error:', data);
}
});
*/
});

var isCtrl = false;
var isShift = false;

$(window).keydown(function(e){
if(e.keyCode == 17){
isCtrl = true;
}
if(e.keyCode == 16){
isShift = true;
}
if(e.keyCode == 65 && isCtrl == true && isShift == true){
e.preventDefault();
$('#btn-save').val("add");
$('#frmBatch').trigger("reset");
$('#btn-save').html("Save");
$('#myModal').modal('show');
$('#application').focus();
}
});

$(window).keyup(function(e) {
isCtrl = false;
isShift = false;
return;
});

