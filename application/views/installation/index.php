
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Installation</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Web installer</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Start</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#database">Database</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#admin">Admin user</a></li>
                </ul>
                <!--
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
                    <li><a href="../navbar-static-top/">Static top</a></li>
                    <li><a href="../navbar-fixed-top/">Fixed top</a></li>
                </ul>
                -->
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Installer</h1>
        <p>
            This custom web-installer will automaticly and dynamicly create the base files/folders needed for the project, please run this installer carefully because mistakes cannot be undone and will require a full- reinstallation in order to fix!
        </p>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="database" tabindex="-1" role="dialog" aria-labelledby="database" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="database_installer">Database installer</h4>
                </div>
                <div class="modal-body">
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav" id="tableNav">
                            <li><a href="#User" contenteditable='true' class="table_name active">User table</a></li>
                            <li><a href="#Product" contenteditable='true' class="table_name active">Product table</a></li>
                        </ul>
                    </div>
                    <div class="well">
                        <div class="form-group">
                            <label for="user_table">Table name</label>
                            <input type="text" class="form-control" id="user_table" class="table_name_field" value="user"  disabled>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="user_table">Column</label>
                                    <input type="text" class="form-control" class="column[]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="addColumn btn btn-default">Add column</button>
                    <button type="button" class="addTable btn btn-primary">Add table</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="admin" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="database_installer">Admin user</h4>
                </div>
                <div class="modal-body">
                    <div class="well">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="*******">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="adminSave">Set admin account</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div> <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $( "#tabs" ).tabs();
        });

        $(".table_name").change(function(e){
            $(".table_name_field").val($(this).val());
        });

        $(".addTable").click(function(e){
           $("#tableNav").append(" <li><a href='#' contenteditable='true' class='table_name' >tableName</a></li>")
        });

        $(".addColumn").click(function(e){
            $("#database #navbar ul").append('')
        });

        $("#adminSave").click(function(e){
            $.post( "installation/save/admin", { name: $("#username"), password: $("#password") } );
        });
    </script>
</body>
</html>