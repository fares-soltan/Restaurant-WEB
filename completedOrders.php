<?php
ob_start();
ini_set('display_errors', 0);

include('connection/connection.php'); ?>
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
                            Completed Orders
                        </h1>
                                          <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row grid-margin">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="table-responsive">
                          <table id="order-listing" class="table"  width="100%">
                            <thead>
                              <tr class="bg-primary text-white">
                                        <th>Order ID</th>
                                        <th>User Name</th>
                                        <th>Meal Data</th>
                                        <th>Table num</th>
                                        <th>Total Price</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <!-- show products in table -->
                                   <?php
                                    $query = "SELECT * FROM allorders";
                                    $query_users_show = mysqli_query($connect,$query);
                                    while($tabel_orders =mysqli_fetch_assoc($query_users_show)){
                                      $Order_id = $tabel_orders['id'];
                                      $user_id = $tabel_orders['user_id'];
                                                                              $query_name="SELECT * FROM users WHERE id ='$user_id'";
                                        $query_get_users = mysqli_query($connect,$query_name);
                                        $tabel_users =mysqli_fetch_assoc($query_get_users);
                                        $user_name =$tabel_users['user_name'];
                                      $mealData = $tabel_orders['mealData'];
                                      $tb_num = $tabel_orders['tb_num'];
                                      $total_price = $tabel_orders['total_price'];
                                        echo "<tr>";
                                        echo "<td>$Order_id</td>";
                                        echo "<td>$user_name</td>";
                                        echo "<td>$mealData</td>";
                                        echo "<td>$tb_num</td>";
                                        echo "<td>$total_price</td>";
                                        echo "</tr>";
                                    }
                                    
                                    ?>

                            </tbody>
                          </table>
                        </div>
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
