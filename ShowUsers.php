<?php
ob_start();
ini_set('display_errors', 0);

include('connection/connection.php') ?>
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
   <div id="wrapper">

<!-- Navigation -->
<?php include("include/nav-bar.php") ?>
<!-- /.navbar-->
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="page-header">
                            Show Users
                        </h1>
                                          <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row grid-margin">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="table-responsive">
                          <table id="order-listing" class="table" cellspacing="0" width="100%">
                            <thead>
                              <tr class="bg-primary text-white">
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Phone</th>
                                        <th>User Adress</th>
                                        <th>User Points</th>
                                        <th>Status</th>
                                        <th>Password</th>
                                        <th>Remove</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <!-- show products in table -->
                                   <?php
                                    $query = "SELECT * FROM users";
                                    $query_users_show = mysqli_query($connect,$query);
                                    while($tabel_users =mysqli_fetch_assoc($query_users_show)){
                                      $user_id = $tabel_users['id'];  
                                      $user_name = $tabel_users['user_name'];
                                      $user_email = $tabel_users['user_email'];
                                      $user_phone = $tabel_users['user_phone'];
                                      $UserAdress = $tabel_users['user_add'];
                                      $UserPoints = $tabel_users['user_points'];
                                      $status = $tabel_users['status'];
                                      $password = $tabel_users['password'];
                                        echo "<tr>";
                                        echo "<td>$user_id</td>";
                                        echo "<td>$user_name</td>";
                                        echo "<td>$user_email</td>";
                                        echo "<td>0$user_phone</td>";
                                        echo "<td>$UserAdress</td>";
                                        echo "<td>$UserPoints</td>";
                                        echo "<td>$status</td>";
                                        echo "<td>$password</td>";
                                        echo "<td><a href='ShowUsers.php?delete=$user_id'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    
                                    ?>
                                    <!-- Delete products query  -->
                                    <?php
                                    if(isset($_GET['delete'])){
                                        $product_id = $_GET['delete'];
                                        $query ="DELETE FROM users WHERE id = '$product_id'";
                                        $query_delete = mysqli_query($connect,$query);
                                        header("Location: ShowUsers.php");
                                    }
                                    ?>
                            </tbody>
                          </table>
                        </div>
                        <a href="addusers.php" class="btn btn-success">Add User</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("include/footer.php") ?>
