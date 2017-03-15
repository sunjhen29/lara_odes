{"filter":false,"title":"flash_message.blade.php","tooltip":"/resources/views/layouts/flash_message.blade.php","undoManager":{"mark":8,"position":8,"stack":[[{"start":{"row":0,"column":0},"end":{"row":130,"column":1},"action":"remove","lines":["<!DOCTYPE html>","<html lang=\"en\">","<head>","    <meta charset=\"utf-8\">","    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">","    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">","","    <title>CCCDMSI</title>","","    <!-- Fonts -->","    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Lato:100,300,400,700\">","","    <!-- Styles -->","    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css\" integrity=\"sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7\" crossorigin=\"anonymous\">","    {{-- <link href=\"{{ elixir('css/app.css') }}\" rel=\"stylesheet\"> --}}","","","    <style>","        body {","            font-family: 'Lato';","        }","","        .fa-btn {","            margin-right: 6px;","        }","        ","        .navbar {","            background: #006080;","            color: white;","        }","        ","        .navbar-default .navbar-nav>li>a {","            color: #f7f2f2;","        }","        a:hover{","            color: white;","        }","        .downlods.panel {","            margin-right: 20px;","            background: gray;","        }","        .navbar-default .navbar-brand{","            color: white;","        }","        .container-fluid{","            padding-left: 5%;","            padding-right: 5%;","        }","        .addbutton{","            margin-top: 10px;","        }","        .try {","            float: left;","            margin: 5px;","            width: 1800px;","            height: 1500px;","        }","        ","        .form-group {","            margin-bottom: 3px;","        }","        ","        .control-label {","            padding-right: 5px;","        }","        ","        .custom{","            padding-left: 0px;","        }","        .input-sm{","            font-weight: bold;","        }","        ","        .has-error .form-control:focus{","             color: red;   ","        }","    </style>","</head>","<body id=\"app-layout\">","    <nav class=\"navbar navbar-default navbar-static-top\">","        <div class=\"container-fluid\">","            <div class=\"navbar-header\">","                <!-- Collapsed Hamburger -->","                <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#app-navbar-collapse\">","                    <span class=\"sr-only\">Toggle Navigation</span>","                    <span class=\"icon-bar\"></span>","                    <span class=\"icon-bar\"></span>","                    <span class=\"icon-bar\"></span>","                </button>","                ","                <a class=\"navbar-brand\" href=\"{{ url('/home') }}\">","                    CCCDMSI","                </a>","            </div>","","            <div class=\"collapse navbar-collapse\" id=\"app-navbar-collapse\">","                <!-- Left Side Of Navbar -->","                <ul class=\"nav navbar-nav\">","                    <li><a href=\"{{ url('/interest/view') }}\">View</a></li>","                    <li><a href=\"{{ url('/interest/entry') }}\">Entry</a></li>","                    <li><a href=\"{{ url('/interest/verify') }}\">Verify</a></li>","                    <li><a href=\"{{ url('/interest/qc') }}\">QC</a></li>","                    <li><a href=\"{{ url('/interest/records') }}\">Records</a></li>","                </ul>","","                <!-- Right Side Of Navbar -->","                <ul class=\"nav navbar-nav navbar-right\">","                    <!-- Authentication Links -->","                    @if (Auth::guest())","                        <li><a href=\"{{ url('/login') }}\">Login</a></li>","                        <li><a href=\"{{ url('/register') }}\">Register</a></li>","                    @else","                        <li class=\"dropdown\">","                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">","                                {{ Auth::user()->name }} <span class=\"caret\"></span>","                            </a>","","                            <ul class=\"dropdown-menu\" role=\"menu\">","                                <li><a href=\"{{ url('#') }}\"><i class=\"fa fa-btn fa-sign-out\"></i>Profile</a></li>","                                <li><a href=\"{{ url('/logout') }}\"><i class=\"fa fa-btn fa-sign-out\"></i>Logout</a></li>","                            </ul>","                        </li>","                    @endif","                </ul>","            </div>","        </div>","    </nav>","","    @yield('content')",""," "],"id":2}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":1},"action":"remove","lines":[" "],"id":3}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":1},"action":"remove","lines":[" "],"id":4}],[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"remove","lines":["",""],"id":5}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":4},"action":"remove","lines":["    "],"id":6}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":4},"action":"insert","lines":["    "],"id":7}],[{"start":{"row":8,"column":0},"end":{"row":21,"column":0},"action":"remove","lines":["","    <!-- JavaScripts -->","    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js\" integrity=\"sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb\" crossorigin=\"anonymous\"></script>","    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js\" integrity=\"sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS\" crossorigin=\"anonymous\"></script>","    {{-- <script src=\"{{ elixir('js/app.js') }}\"></script> --}}","    ","    @stack('scripts')","    ","    <script>","        $('div.alert').not('.alert-important').delay(3000).slideUp(300);","    </script>","</body>","</html>",""],"id":8}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":4},"action":"remove","lines":["    "],"id":9},{"start":{"row":1,"column":0},"end":{"row":1,"column":4},"action":"remove","lines":["    "]},{"start":{"row":2,"column":0},"end":{"row":2,"column":4},"action":"remove","lines":["    "]},{"start":{"row":3,"column":0},"end":{"row":3,"column":4},"action":"remove","lines":["    "]},{"start":{"row":4,"column":0},"end":{"row":4,"column":4},"action":"remove","lines":["    "]},{"start":{"row":5,"column":0},"end":{"row":5,"column":4},"action":"remove","lines":["    "]},{"start":{"row":6,"column":0},"end":{"row":6,"column":4},"action":"remove","lines":["    "]},{"start":{"row":7,"column":0},"end":{"row":7,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":1,"column":0},"end":{"row":1,"column":4},"action":"remove","lines":["    "],"id":10},{"start":{"row":2,"column":0},"end":{"row":2,"column":4},"action":"remove","lines":["    "]},{"start":{"row":3,"column":0},"end":{"row":3,"column":4},"action":"remove","lines":["    "]},{"start":{"row":4,"column":0},"end":{"row":4,"column":4},"action":"remove","lines":["    "]},{"start":{"row":5,"column":0},"end":{"row":5,"column":4},"action":"remove","lines":["    "]},{"start":{"row":6,"column":0},"end":{"row":6,"column":4},"action":"remove","lines":["    "]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":8,"column":0},"end":{"row":8,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":16,"mode":"ace/mode/php"}},"timestamp":1476156330286,"hash":"54a21c13bf9eabfd417699d75f49e3c45ca085d6"}