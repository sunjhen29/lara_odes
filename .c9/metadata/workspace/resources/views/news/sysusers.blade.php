{"filter":false,"title":"sysusers.blade.php","tooltip":"/resources/views/news/sysusers.blade.php","undoManager":{"mark":7,"position":7,"stack":[[{"start":{"row":0,"column":0},"end":{"row":175,"column":0},"action":"remove","lines":["@extends('layouts.news')","","@section('content')","<div class=\"container-fluid\">","","<div class=\"row\">","  <div class=\"col-md-10\">","    <h3><b>Export Operator Stats</b></h3>","  </div>","  <div class=\"col-md-2\">","    <button type=\"button\" class=\"btn btn-info btn-md addbutton pull-right\" data-toggle=\"modal\" data-target=\"#myModal1\">EXPORT FILE</button>","  </div>","</div>","","<div class=\"row\">","  <div class=\"col-md-12 col-md-offset-0\">","    <div class=\"panel panel-default\">","      <div class=\"panel-body\">","        <form class=\"form-inline\">","          ","          <div class=\"form-group\">","            <label for=\"publication_date\">PRODUCTION DATE</label>","              <input type=\"text\" class=\"form-control\" id=\"production_date\" name=\"production_date\" size=\"13\">","          </div>","                        ","          <button type=\"submit\" class=\"btn btn-info\">SUBMIT</button>","          <!-- BUTTON <button type=\"button\" class=\"btn btn-info btn-md\" data-toggle=\"modal\" data-target=\"#myModal1\">ADD PUBLICATION</button> -->","                              ","        </form> <!-- end of master form-->                ","      </div> <!-- end of panel body-->","    </div> <!-- end of class panel-->","  </div> <!-- end of col-->","</div> <!-- end of row-->  ","","<!-- table -->","","<div class=\"row\">","  <div class=\"col-md-12\">","    <table class=\"table table-hover\">","      <thread>","        <tr>","          <th>ACTIVITY</th>","          <th>JOB NUMBER</th>","          <th>OPERATOR</th>","          <th>JULIAN DATE</th>","          <th>TIME 1</th>","          <th>TIME 2</th>","          <th>RECORDS</th>","      </thread>","      <tbody>","        <tr>","          <td>E</td>","          <td>05401</td>","          <td>135NZ-S SEP</td>","          <td>16270</td>","          <td>02 33</td>","          <td>02 33</td>","          <td>91</td>","        </tr>","","      </tbody>","    </table>","  </div>","</div>","","</div> <!-- end of container>","","<!-- MODALS -->","","<!-- <div id=\"myModal1\" class=\"modal fade\" role=\"dialog\">","  <div class=\"modal-dialog\">","    <div class=\"modal-content\">","      <div class=\"modal-header\">","        <h4 class=\"modal-title\"><b>ADD DOWNLOAD</b></h4>","      </div>","        ","        <form class=\"form-horizontal\">","          <div class=\"modal-body\">","                  ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"state\">State</label>","                <div class=\"col-sm-5\">","                  <select class=\"form-control\" id=\"state\" name=\"state\">","                    <option>--</option>","                    <option>NZ</option>","                    <option>ACT</option>","                    <option>NSW</option>","                  </select>","                </div>","            </div>","                  ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"publication_name\">Publication Name</label>","                <div class=\"col-sm-7\">","                  <select class=\"form-control\" id=\"publication_name\" name=\"publication_name\">","                    <option>--</option>","                    <option>HERALD HOMES</option>","                    <option>HERALD MID WEEK HOMES</option>","                    <option>HERALD ON SUNDAY HOMES</option>","                  </select>","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"code\">Publication Code</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"code\" name=\"code\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"description\">Application</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"description\" name=\"description\">","                </div>","            </div>","          ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"publication_date\">Publication Date</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"publication_date\" name=\"publication_date\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"pages\">Pages</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"pages\" name=\"pages\">","                </div>","            </div>","          ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"remarks\">Remarks</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"remarks\" name=\"remarks\">","                </div>","            </div>","                  ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"status\">Status</label>","                <div class=\"col-sm-5\">","                  <select class=\"form-control\" id=\"status\" name=\"status\">","                    <option>OPEN</option>","                    <option>CLOSED</option>","                    <option>PENDING</option>","                  </select>","                </div>","            </div>","              ","          </div> <!-- end of modal body -->","            ","            <!-- <div class=\"modal-footer\">","              <button type=\"submit\" class=\"btn btn-default\" data-dismiss=\"modal\">Add Download</button>","              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>","            </div>","            ","        </form> <!-- end of form horizontal -->    ","    </div><br> <!-- end of modal content -->","  </div> <!-- end of modal dialog -->","</div> <!-- end of modal -->","              ","          </div> <!-- end of modal body -->","            ","            <!-- <div class=\"modal-footer\">","              <button type=\"submit\" class=\"btn btn-default\" data-dismiss=\"modal\">Update Record</button>","              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>","            </div>","            ","        </form> <!-- end of form horizontal -->    ","    </div><br> <!-- end of modal content -->","  </div> <!-- end of modal dialog -->","</div> <!-- end of modal -->","","","@endsection",""],"id":2},{"start":{"row":0,"column":0},"end":{"row":248,"column":0},"action":"insert","lines":["@extends('layouts.app')","","@section('content')","<div class=\"container-fluid\">","<div class=\"row\">","  <div class=\"col-md-9 col-xs-8\">","    <h3><b>System Users</b></h3>","  </div>","  <div class=\"col-md-2 col-xs-2\">","    <button type=\"button\" class=\"btn btn-info btn-md addbutton pull-right\">EXPORT TO EXCEL</button>","  </div>","  <div class=\"col-md-1 col-xs-2\">","    <button type=\"button\" class=\"btn btn-info btn-md addbutton\" data-toggle=\"modal\" data-target=\"#myModal1\">ADD USER</button>","  </div>","</div>","","<div class=\"row\">","  <div class=\"col-md-12\">","    <table class=\"table table-hover\">","      <thread>","        <tr>","          <th>OPERATOR ID</th>","          <th>USERNAME</th>","          <th>PASSWORD</th>","          <th>FIRSTNAME</th>","          <th>LASTNAME</th>","          <th>ACCESS LEVEL</th>","          <th>ACTIONS</th>","          <th>DATE ADDED</th>","        </tr>","      </thread>","      <tbody>","        <tr>","          <td>15</td>","          <td>PAYAWALE</td>","          <td>EMY</td>","          <td>EMY</td>","          <td>PAYAWAL</td>","          <td>2</td>","          <td>","            <button type=\"button\" class=\"btn btn-info btn-xs\" data-toggle=\"modal\" data-target=\"#myModal2\">MODIFY</button>","            <button type=\"button\" class=\"btn btn-info btn-xs\" data-toggle=\"modal\" data-target=\"#myModal3\">DELETE</button>","          </td>","          <td>2014-10-07</td>","        </tr>","      </tbody>","    </table>","  </div> <!-- end of col-->","</div> <!-- end of row-->","  ","</div> <!-- end of container>","","","<!-- MODALS -->","","<div id=\"myModal1\" class=\"modal fade\" role=\"dialog\">","  <div class=\"modal-dialog\">","    <div class=\"modal-content\">","      <div class=\"modal-header\">","        <h4 class=\"modal-title\"><b>ADD USER</b></h4>","      </div>","        ","        <form class=\"form-horizontal\">","          <div class=\"modal-body\">","            ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"operator_id\">Operator ID</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"operator_id\" name=\"operator_id\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"username\">Username</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"password\">Password</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"password\" name=\"password\">","                </div>","            </div>","          ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"firstname\">First Name</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"firstname\" name=\"firstname\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"lastname\">Last Name</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"lastname\" name=\"lastname\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"access_level\">Access Level</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"access_level\" name=\"access_level\">","                </div>","            </div>","              ","          </div> <!-- end of modal body -->","            ","            <div class=\"modal-footer\">","              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Add User</button> <!-- data dismiss? -->","              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>","            </div>","          </form> <!-- end of form horizontal -->","        ","    </div><br> <!-- end of modal content -->","  </div> <!-- end of modal dialog -->","</div> <!-- end of modal -->","","<div id=\"myModal2\" class=\"modal fade\" role=\"dialog\">","  <div class=\"modal-dialog\">","    <div class=\"modal-content\">","      <div class=\"modal-header\">","        <h4 class=\"modal-title\"><b>UPDATE USER</b></h4>","      </div>","        ","        <form class=\"form-horizontal\">","          <div class=\"modal-body\">","            ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"operator_id\">Operator ID</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"operator_id\" name=\"operator_id\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"username\">Username</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"password\">Password</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"password\" name=\"password\">","                </div>","            </div>","          ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"firstname\">First Name</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"firstname\" name=\"firstname\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"lastname\">Last Name</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"lastname\" name=\"lastname\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"access_level\">Access Level</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"access_level\" name=\"access_level\">","                </div>","            </div>","              ","          </div> <!-- end of modal body -->","            ","            <div class=\"modal-footer\">","              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Update User</button> <!-- data dismiss? -->","              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>","            </div>","          </form> <!-- end of form horizontal -->","        ","    </div><br> <!-- end of modal content -->","  </div> <!-- end of modal dialog -->","</div> <!-- end of modal -->","","<div id=\"myModal3\" class=\"modal fade\" role=\"dialog\">","  <div class=\"modal-dialog\">","    <div class=\"modal-content\">","      <div class=\"modal-header\">","        <h4 class=\"modal-title\"><b>ADD USER</b></h4>","      </div>","        ","        <form class=\"form-horizontal\">","          <div class=\"modal-body\">","            ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"operator_id\">Operator ID</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"operator_id\" name=\"operator_id\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"username\">Username</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"password\">Password</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"password\" name=\"password\">","                </div>","            </div>","          ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"firstname\">First Name</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"firstname\" name=\"firstname\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"lastname\">Last Name</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"lastname\" name=\"lastname\">","                </div>","            </div>","                ","            <div class=\"form-group\">","              <label class=\"col-sm-4 control-label\" for=\"access_level\">Access Level</label>","                <div class=\"col-sm-5\">","                  <input type=\"text\" class=\"form-control\" id=\"access_level\" name=\"access_level\">","                </div>","            </div>","              ","          </div> <!-- end of modal body -->","            ","            <div class=\"modal-footer\">","              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Update User</button> <!-- data dismiss? -->","              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>","            </div>","          </form> <!-- end of form horizontal -->","        ","    </div><br> <!-- end of modal content -->","  </div> <!-- end of modal dialog -->","</div> <!-- end of modal -->","","@endsection",""]}],[{"start":{"row":0,"column":20},"end":{"row":0,"column":21},"action":"remove","lines":["p"],"id":3}],[{"start":{"row":0,"column":19},"end":{"row":0,"column":20},"action":"remove","lines":["p"],"id":4}],[{"start":{"row":0,"column":18},"end":{"row":0,"column":19},"action":"remove","lines":["a"],"id":5}],[{"start":{"row":0,"column":18},"end":{"row":0,"column":19},"action":"insert","lines":["n"],"id":6}],[{"start":{"row":0,"column":19},"end":{"row":0,"column":20},"action":"insert","lines":["e"],"id":7}],[{"start":{"row":0,"column":20},"end":{"row":0,"column":21},"action":"insert","lines":["w"],"id":8}],[{"start":{"row":0,"column":21},"end":{"row":0,"column":22},"action":"insert","lines":["s"],"id":9}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":0,"column":22},"end":{"row":0,"column":22},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1475656402579,"hash":"3aa3dcf33be3a454f6a767290da215b54e78cd67"}