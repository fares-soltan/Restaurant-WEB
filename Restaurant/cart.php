<?php 
session_start();
include("../connection/connection.php");

if(isset($_POST['remove'])){
    if($_GET['action']=='remove'){
      foreach($_SESSION['cart'] as $key=>$value){
        if($value['product_id'] == $_GET['id']){
          unset($_SESSION['cart'][$key]);
          echo "<script>alert('Product has been Removed...!')</script>";
          echo "<script>window.location = 'cart.php'</script>";
        }
      }

    }
}


if(isset($_POST['order'])){
        sleep(2);
    $mealdata=array();
    $total_price = 0;
    foreach($_SESSION['cart'] as $key=>$value){
      $id = $value['product_id'];
      $query = "SELECT * FROM meals WHERE id ='$id'";
      $run_query=mysqli_query($connect,$query);
      $tabel_meals=mysqli_fetch_assoc($run_query);
      $meal_name = $tabel_meals['meal_name'];
      $meal_price = $tabel_meals['meal_price'];
      array_push($mealdata,"1x$meal_name");
      $total_price += $meal_price;
    }
    $mealsdata=join(",",$mealdata);
     $total_price;
    $query_meal= "INSERT INTO orders (user_id,mealData,tb_num,total_price) VALUES ('1','$mealsdata','11','$total_price')";
        $query_meal2= "INSERT INTO casher (user_id,mealData,tb_num,total_price) VALUES ('1','$mealsdata','11','$total_price')";
    $run_meal=mysqli_query($connect,$query_meal);
    $run_meal1=mysqli_query($connect,$query_meal2);
    if($run_meal == 1){
        session_destroy();
        header("Location: cart.php");
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Restaurant</title>
    <link rel="icon" type="image/x-icon" href="./img/carts.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="Style-shop.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
   <a class="navbar-brand warning" href="index.php" style="color:#ff3838;">Smart Restaurant</a>

    <div class="collapse navbar-collapse" id="navbarResponsive">
     <ul class="navbar-nav ml-auto">
      <li class="nav-item">
       <a class="nav-link" href="cart.php"><img src="img/carts.png" width="30px";> Cart 
       
       <?php 
         if(isset($_SESSION['cart'])){
           $count = count($_SESSION['cart']);
           echo "<span id='cart_count' class='text-danger'> $count</span>";
         }else{
          echo "<span id='cart_count' class='text-danger' > 0</span>";
         }
        ?> 
        </a>
      </li> 
     </ul>
    </div>
  </nav>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7 col-sm-6" >
            <div class="shopping-cart">
                <?php
                $total = 0;
              if (isset($_SESSION['cart'] )){
               if(count($_SESSION['cart'])!==0){ 
                  $product_id=array_column($_SESSION['cart'],'product_id');
                $result = "SELECT * FROM meals";
                $run =mysqli_query($connect,$result);
                while($tabel_meals =mysqli_fetch_assoc($run)){
                    $id = $tabel_meals['id']; 
                    $meal_name = $tabel_meals['meal_name'];
                    $meal_price = $tabel_meals['meal_price'];
                    $meal_description = $tabel_meals['meal_description'];
                    $meal_image = $tabel_meals['meal_image'];
                  foreach($product_id as $id){
                    if($tabel_meals['id']==$id){
                      echo "
    
                      <form action=\"cart.php?action=remove&id=$id\" method=\"post\" class=\"cart-items\">
                                      <div class=\"border rounded\" style='padding-top: 40px;'>
                                          <div class=\"row bg-white\">
                                              <div class=\"col-md-3 pl-0\">
                                                  <img src='../images/$meal_image' alt=\"Image1\" class=\"img-fluid\">
                                              </div>
                                              <div class=\"col-md-6\">
                                                  <h5 class=\"pt-2\">$meal_name</h5>
                                                  <small class=\"text-secondary\">$meal_description</small>
                                                  <h5 class=\"pt-2\">$$meal_price</h5>
                                              </div>
                                              <div class=\"col-md-3 py-5\">
                                                  <div>                                                 
                                                   <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                      ";
                      $total = $total + (int)$meal_price;
                    }
                  }


                }
                }else{
                  echo "<h5 class='welcome' style='padding-top:50px ;'>Cart is Empty ^_^</h5>";
                  echo "<img class='' src='img/empty.png' width=150px;>";
                  echo "<script>alert('Cart is Empty..!')</script>";
                  echo "<script>window.location = 'index.php'</script>";

                }
              }else{
                  echo "<h5 class='welcome '>Cart is Empty ^_^</h5>";
                  echo "<img class='' src='img/empty.png' width=150px;>";
                  echo "<script>alert('Cart is Empty..!')</script>";
                  echo "<script>window.location = 'index.php'</script>";
                }


                ?>

            </div>
        </div>
        <div class="col-md-4 col-sm-6 offset-md-1 border rounded mt-5 bg-white h-25" style="padding-bottom: 10px;">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>

                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                         if (isset($_SESSION['cart'])){
                          $count  = count($_SESSION['cart']);
                          echo "<h6>Price ($count items)</h6>";
                          }else{
                          echo "<h6>Price (0 items)</h6>";
                         }  
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount</h6>
                        <form action="cart.php" method="post" class="cart-items">
                        <button type="submit" class="btn btn-danger" onclick="swal('Please Wait For Your Order!', 'Thank you for visiting our site', 'success')" name="order" style='width: 155px;font-size: 15px;margin-top: 24px;'>Order Now <i class="fas fa-shopping-cart"></i></button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6 style="padding-bottom: 20px;">$<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>
        
            
        </div>
        
    </div>
</div>

</body>
</html>