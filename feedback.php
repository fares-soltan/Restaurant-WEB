<?php
session_start();
include("./connection/connection.php");
include("fun.php");

$problems="SELECT COUNT(*) FROM problems";
$problems_query=mysqli_query($connect,$problems);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <?php include("include/nav-bar.php") ?>
    <!-- /.navbar-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin.
                    </h1>
                    <div class="col-md-12 col-xs-12">
                            <div class="panel rounded shadow ">
                                <div class="panel-heading" style="background-color:#35A6F4 ; color:white;">
                                    <div class="pull-left" >
                                        <h3 class="panel-title">Inbox (<?php foreach($problems_query as $row) {echo  $row['COUNT(*)'];} ?>)</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- /.panel-heading -->
                                <div class="panel-sub-heading inner-all">

                                    <div class="clearfix"></div>
                                </div><!-- /.panel-sub-heading -->
                                <div class="panel-body no-padding">

                                    <div class="table-responsive">
                                        <table class="table table-hover table-email">
                                            <tbody>
                                            <?php inbox();?>
                                            </tbody>
                                        </table>
                                    </div><!-- /.table-responsive -->

                                </div><!-- /.panel-body -->
                            </div><!-- /.panel -->

                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
</body>
</html>