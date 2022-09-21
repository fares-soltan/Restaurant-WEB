<?php
ob_start();
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
                            Meals
                        </h1>
                     <div class="col-md-6 col-xs-12">
                       <!-- Insert products to database -->
                        <?php
                          if(isset($_POST['add_Meal'])){
                            $Meal_Name = $_POST['MealName'];
                            $Meal_Description = $_POST['MealDescription'];
                            $Meal_Price = $_POST['MealPrice'];
                            $Meal_Sale = $_POST['MealCost'];
                            $meal_category = $_POST['mealcategory'];
                            $meal_points = $_POST['mealpoints'];
                            $image_post = $_FILES['image']['name'];
                            $image_temp=$_FILES['image']['tmp_name'];
                            move_uploaded_file($image_temp,"images/$image_post");
                            $qeury ="INSERT INTO meals (meal_name, meal_description, meal_price, meal_cost, meal_image, meal_cat, meal_point) VALUES ('$Meal_Name', '$Meal_Description', '$Meal_Price', '$Meal_Sale', '$image_post','$meal_category','$meal_points')";
                            $insert_product=mysqli_query($connect , $qeury);
                          }
                         ?>
                         <form action="products.php" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="cat-title">Meal Name</label>
                                 <input type="text" class="form-control" name ="MealName">
                             </div>
                             <div class="form-group">
                                <label for="cat-title">Meal Description</label>
                                 <input type="text" class="form-control" name ="MealDescription">
                             </div>
                             <div class="form-group">
                                <label for="cat-title">Meal Price</label>
                                 <input type="text" class="form-control" name ="MealPrice">
                             </div>
                             <div class="form-group">
                                <label for="cat-title">Meal Cost</label>
                                 <input type="text" class="form-control" name ="MealCost">
                             </div>
                             <div class="form-group">
                                <label for="cat-title">Meal Points</label>
                                 <input type="text" class="form-control" name ="mealpoints">
                             </div>
                             <div class="form-group">
                                <label for="cat-title">Meal Category</label>
                                 <input type="text" class="form-control" name ="mealcategory">
                             </div>
                             <div class="form-group">
                                <label for="post-image">meal Image</label>
                                 <input type="file" name ="image" accept=".jpg, .jpeg, .png">
                             </div>
                             <div class="form-group">
                                 <input type="submit" class="btn btn-primary" name ="add_Meal">
                             </div>

                         </form>
                     </div>
                     <div class="row">
              <div class="col-md-6 col-xs-12">
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
                                        <th>Meal Name</th>
                                        <th>Meal Description</th>
                                        <th>Meal Price</th>
                                        <th>Meal Cost</th>
                                        <th>Photo</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <!-- show products in table -->
                                   <?php
                                    $query = "SELECT * FROM meals";
                                    $query_pro_show = mysqli_query($connect,$query);
                                    while($tabel_product =mysqli_fetch_assoc($query_pro_show)){
                                      $Meal_id = $tabel_product['id'];
                                      $Meal_Name = $tabel_product['meal_name'];
                                      $Meal_Price = $tabel_product['meal_price'];
                                      $Meal_Sale = $tabel_product['meal_cost'];
                                      $Meal_photo = $tabel_product['meal_image'];
                                      $Meal_Points = $tabel_product['meal_point'];
                                      $Meal_Category = $tabel_product['meal_cat'];
                                      $Meal_Description = $tabel_product['meal_description'];
                                        echo "<tr>";
                                        echo "<td>$Meal_id</td>";
                                        echo "<td>$Meal_Name</td>";
                                        echo "<td>$Meal_Description</td>";
                                        echo "<td>$Meal_Price</td>";
                                        echo "<td>$Meal_Sale</td>";
                                        echo "<td><img src='images/$Meal_photo' style=width:50px;></td>";
                                        echo "<td><a href='products.php?delete=$Meal_id'>Delete</a></td>";
                                        echo "</tr>";
                                    }

                                    ?>
                                    <!-- Delete products query  -->
                                    <?php
                                    if(isset($_GET['delete'])){
                                        $product_id = $_GET['delete'];
                                        $query ="DELETE FROM meals WHERE id = '$product_id'";
                                        $query_delete = mysqli_query($connect,$query);
                                        header("Location: products.php");
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
