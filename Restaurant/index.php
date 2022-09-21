<?php 

session_start();
include("../connection/connection.php");
if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
       $item_array_id = array_column($_SESSION['cart'], "product_id");
      
       if(in_array($_POST['product_id'] , $item_array_id)){
         echo "<script>alert('Product is already added in the cart..!')</script>";
         echo "<script>window.location = 'index.php#Items'</script>";
        
       }else{
  
        $count = count($_SESSION['cart']);
        $item_array = array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][$count] = $item_array; 
        header("Location: index.php#Items");
        
    }
    }else{
      $iteam_array = array( 'product_id' => $_POST['product_id']);
      
      $_SESSION['cart'][0]=$iteam_array;
      header("Location: index.php#Items");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Smart Restaurant</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="icon" type="image/x-icon" href="./img/carts.png">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body style="background-color: white ;">
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->

        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0"style="height: 72px;position: fixed;width: 100%;">
                
                <span style="    padding-top: 12px;"><a href="" class="navbar-brand p-0" style="color:#ff3838 ;">
                    <h1 class="text-primary m-0" ><i class="fa fa-utensils me-3" style="color:#ff3838 ;"></i>Smart Restaurant</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a></span><span style="margin-bottom: 14px;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" >
                    <span class="fa fa-bars"></span>
                </button></span>
                <div class="collapse navbar-collapse" id="navbarCollapse" style="background-color: black;opacity: 0.9;border-radius: 15px;>
                    <div class="navbar-nav ms-auto py-0 pe-4" style="    padding: 19px;">
                        <a href="#" class="nav-item nav-link active" >Home</a>
                        <a href="#about" class="nav-item nav-link " >About</a>
                        <a href="#service" class="nav-item nav-link " >Service</a>
                        <a href="#Items" class="nav-item nav-link ">Menu</a>
       <a class="nav-item nav-link active" href="cart.php" ><img src="img/carts.png" width="30px";> Cart
       <?php 
         if(isset($_SESSION['cart'])){
           $count = count($_SESSION['cart']);
           echo "<span id='cart_count' class='text-danger' > $count</span>";
         }else{
          echo "<span id='cart_count' class='text-danger'> 0</span>";
         }
        ?> 
</a>

                    </div>
                   
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5" style="padding-top: 113px;">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">We will take you with us on a relish trip that you have never experienced before. We will make you refresh from our food</p>
                            <a href="#Items" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft" style="border-radius:15px ;">Menu</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
                <!-- About Start -->
         <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Smart Restaurant</h1>
                        <p class="mb-4">Since our modest beginnings in 2022 with a little space in Egypt’s stylish Cairo locale, ‘ٍsmart Resturant’ ‘s development has been enlivened with the energy to cook and serve food.</p>
                        <p class="mb-4">
Our expectation is that you’ll join the developing pattern that such a large number of others have officially found and you will attempt ‘Smart Resturant’ as a remarkable option to other Egyptian eateries as well as to all other solid sustenance alternatives out there!</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Service Start -->
        <div class="container-xxl py-5" id="service">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>Master Chefs</h5>
                                <p>We have the best list of top skilled chefs from whom you will taste the most delicious food</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Quality Food</h5>
                                <p>We guarantee you high quality and clean food and always strive to be the best in our field</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>Online Order</h5>
                                <p>now it's easy to order an online order from Smart Restaurant and it will arrive you fastly.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>24/7 Service</h5>
                                <p>Hello! 
we are here to serve you every second in the day in our Restaurant and we are happy to serve you .
we wish you are happy with us.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        <!-- Menu Start -->
        <div class="container-xxl py-5" id="Items">
            <div class="container">


<div class='tab-class text-center wow fadeInUp' data-wow-delay='0.1s' style='padding-bottom:50px ;'>
                <ul class='nav nav-pills d-inline-flex justify-content-center border-bottom mb-5'>
                        <li class='nav-item'>
                            <a class='d-flex align-items-center text-start mx-3 ms-0 pb-3 active' data-bs-toggle='pill' href='#tab-1'>
                                <i class="fa fa-hamburger fa-2x text-primary"></i>
                                <div class='ps-3'>
                                    <h6 class='mt-n1 mb-0'>Burger</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    
                         <div class='tab-content'>
                        <div class='tab-pane fade show p-0 active'>
                            <div class='row'>
                        <?php 
                        $query = "SELECT * FROM meals WHERE meal_cat = 'Burger'";
                        $meals_show=mysqli_query($connect,$query);

                        while($tabel_meals =mysqli_fetch_assoc($meals_show)){
                            $id = $tabel_meals['id'];
                        $meal_name = $tabel_meals['meal_name'];
                        $meal_price = $tabel_meals['meal_price'];
                        $meal_description = $tabel_meals['meal_description'];
                        $meal_image = $tabel_meals['meal_image'];
                        
                        echo "


                            <div class='col-lg-6' style='padding-bottom:20px ;'>
                                                <form action=\"index.php\" method=\"post\">
                                    <div class='d-flex align-items-center'>
                                        <img class='flex-shrink-0 img-fluid rounded' src='../images/$meal_image'  style='width: 80px;'>
                                        <div class='w-100 d-flex flex-column text-start ps-4'>
                                            <span class='d-flex justify-content-between border-bottom pb-2'>
                                                <span>$meal_name</span>
                                                <span class='text-primary'>$meal_price L.E</span>
                                     
                                            </span>
                                            
                                            <small class='fst-italic'>$meal_description</small>
                                            <input type='hidden' name='product_id' value='$id'>
                                                       <button type=\"submit\" class=\"btn btn-danger\" name=\"add\" style='width: 105px;font-size: 10px;'>Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
                                        </div>
                                    </div>
                                     </form>
                                </div>
 
                    ";
                        } ;
                        ?>
                             </div>
                        </div>
                    </div>
                      
            </div>
<div class='tab-class text-center wow fadeInUp' data-wow-delay='0.1s' style='padding-bottom:50px ;'>
                <ul class='nav nav-pills d-inline-flex justify-content-center border-bottom mb-5'>
                        <li class='nav-item'>
                            <a class='d-flex align-items-center text-start mx-3 ms-0 pb-3 active' data-bs-toggle='pill' href='#tab-1'>
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                                <div class='ps-3'>
                                    <h6 class='mt-n1 mb-0'>Burrito</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    
                         <div class='tab-content'>
                        <div class='tab-pane fade show p-0 active'>
                            <div class='row'>
                        <?php 
                        $query = "SELECT * FROM meals WHERE meal_cat = 'Burrito'";
                        $meals_show=mysqli_query($connect,$query);

                        while($tabel_meals =mysqli_fetch_assoc($meals_show)){
                            $id = $tabel_meals['id'];
                        $meal_name = $tabel_meals['meal_name'];
                        $meal_price = $tabel_meals['meal_price'];
                        $meal_description = $tabel_meals['meal_description'];
                        $meal_image = $tabel_meals['meal_image'];
                        
                        echo "
                    

                            <div class='col-lg-6' style='padding-bottom:20px ;'>
                            <form action=\"index.php\" method=\"post\">
                                    <div class='d-flex align-items-center'>
                                        <img class='flex-shrink-0 img-fluid rounded' src='../images/$meal_image'  style='width: 80px;'>
                                        <div class='w-100 d-flex flex-column text-start ps-4'>
                                            <span class='d-flex justify-content-between border-bottom pb-2'>
                                                <span>$meal_name</span>
                                                <span class='text-primary'>$meal_price L.E</span>
                                                
                                            </span>
                                            <small class='fst-italic'>$meal_description</small>
                                            <input type='hidden' name='product_id' value='$id'>
                                            <button type=\"submit\" class=\"btn btn-danger\" name=\"add\" style='width: 105px;font-size: 10px;'>Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
                                        </div>
                                    </div>
                                     </form>
                                </div>

                    ";
                        } ;
                        ?>
                             </div>
                        </div>
                    </div>
                       
            </div>
            
<div class='tab-class text-center wow fadeInUp' data-wow-delay='0.1s' style='padding-bottom:50px ;'>
                <ul class='nav nav-pills d-inline-flex justify-content-center border-bottom mb-5'>
                        <li class='nav-item'>
                            <a class='d-flex align-items-center text-start mx-3 ms-0 pb-3 active' data-bs-toggle='pill' href='#tab-1'>
                                <i class="fa fa-hamburger fa-2x text-primary"></i>
                                <div class='ps-3'>
                                    <h6 class='mt-n1 mb-0'>Chicken</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <form action=\"index.php\" method=\"post\">
                         <div class='tab-content'>
                        <div class='tab-pane fade show p-0 active'>
                            <div class='row'>
                        <?php 
                        $query = "SELECT * FROM meals WHERE meal_cat = 'Chicken'";
                        $meals_show=mysqli_query($connect,$query);

                        while($tabel_meals =mysqli_fetch_assoc($meals_show)){
                            $id = $tabel_meals['id'];
                        $meal_name = $tabel_meals['meal_name'];
                        $meal_price = $tabel_meals['meal_price'];
                        $meal_description = $tabel_meals['meal_description'];
                        $meal_image = $tabel_meals['meal_image'];
                        
                        echo "
                    

                            <div class='col-lg-6' style='padding-bottom:20px ;'>
                            <form action=\"index.php\" method=\"post\">
                                    <div class='d-flex align-items-center'>
                                        <img class='flex-shrink-0 img-fluid rounded' src='../images/$meal_image'  style='width: 80px;'>
                                        <div class='w-100 d-flex flex-column text-start ps-4'>
                                            <span class='d-flex justify-content-between border-bottom pb-2'>
                                                <span>$meal_name</span>
                                                <span class='text-primary'>$meal_price L.E</span>
                                               
                                            </span>
                                            <small class='fst-italic'>$meal_description</small>
                                            <input type='hidden' name='product_id' value='$id'>
                                            <button type=\"submit\" class=\"btn btn-danger\" name=\"add\" style='width: 105px;font-size: 10px;'>Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
                                        </div>
                                    </div>
                                     </form>
                                </div>

                    ";
                        } ;
                        ?>
                             </div>
                        </div>
                    </div>
                        </form>
            </div>

<div class='tab-class text-center wow fadeInUp' data-wow-delay='0.1s' style='padding-bottom:50px ;'>
                <ul class='nav nav-pills d-inline-flex justify-content-center border-bottom mb-5'>
                        <li class='nav-item'>
                            <a class='d-flex align-items-center text-start mx-3 ms-0 pb-3 active' data-bs-toggle='pill' href='#tab-1'>
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                                <div class='ps-3'>
                                    <h6 class='mt-n1 mb-0'>Pasta</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    
                         <div class='tab-content'>
                        <div class='tab-pane fade show p-0 active'>
                            <div class='row'>
                        <?php 
                        $query = "SELECT * FROM meals WHERE meal_cat = 'Pasta'";
                        $meals_show=mysqli_query($connect,$query);

                        while($tabel_meals =mysqli_fetch_assoc($meals_show)){
                            $id = $tabel_meals['id'];
                        $meal_name = $tabel_meals['meal_name'];
                        $meal_price = $tabel_meals['meal_price'];
                        $meal_description = $tabel_meals['meal_description'];
                        $meal_image = $tabel_meals['meal_image'];
                        
                        echo "
                    

                            <div class='col-lg-6' style='padding-bottom:20px ;'>
                            <form action=\"index.php\" method=\"post\">
                                    <div class='d-flex align-items-center'>
                                        <img class='flex-shrink-0 img-fluid rounded' src='../images/$meal_image'  style='width: 80px;'>
                                        <div class='w-100 d-flex flex-column text-start ps-4'>
                                            <span class='d-flex justify-content-between border-bottom pb-2'>
                                                <span>$meal_name</span>
                                                <span class='text-primary'>$meal_price L.E</span>
                                                
                                            </span>
                                            <small class='fst-italic'>$meal_description</small>
                                            <input type='hidden' name='product_id' value='$id'>
                                            <button type=\"submit\" class=\"btn btn-danger\" name=\"add\" style='width: 105px;font-size: 10px;'>Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                    ";
                        } ;
                        ?>
                             </div>
                        </div>
                    </div>
                        
            </div>

<div class='tab-class text-center wow fadeInUp' data-wow-delay='0.1s' style='padding-bottom:50px ;'>
                <ul class='nav nav-pills d-inline-flex justify-content-center border-bottom mb-5'>
                        <li class='nav-item'>
                            <a class='d-flex align-items-center text-start mx-3 ms-0 pb-3 active' data-bs-toggle='pill' href='#tab-1'>
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                                <div class='ps-3'>
                                    <h6 class='mt-n1 mb-0'>Pizza</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    
                         <div class='tab-content'>
                        <div class='tab-pane fade show p-0 active'>
                            <div class='row'>
                        <?php 
                        $query = "SELECT * FROM meals WHERE meal_cat = 'Pizza'";
                        $meals_show=mysqli_query($connect,$query);

                        while($tabel_meals =mysqli_fetch_assoc($meals_show)){
                            $id = $tabel_meals['id'];
                        $meal_name = $tabel_meals['meal_name'];
                        $meal_price = $tabel_meals['meal_price'];
                        $meal_description = $tabel_meals['meal_description'];
                        $meal_image = $tabel_meals['meal_image'];
                        
                        echo "
                    

                            <div class='col-lg-6' style='padding-bottom:20px ;'>
                            <form action=\"index.php\" method=\"post\">
                                    <div class='d-flex align-items-center'>
                                        <img class='flex-shrink-0 img-fluid rounded' src='../images/$meal_image'  style='width: 80px;'>
                                        <div class='w-100 d-flex flex-column text-start ps-4'>
                                            <span class='d-flex justify-content-between border-bottom pb-2'>
                                                <span>$meal_name</span>
                                                <span class='text-primary'>$meal_price L.E</span>
            
                                            </span>
                                            <small class='fst-italic'>$meal_description</small>
                                            <input type='hidden' name='product_id' value='$id'>
                                            <button type=\"submit\" class=\"btn btn-danger\" name=\"add\" style='width: 105px;font-size: 10px;'>Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
                                        </div>
                                    </div>
                                     </form>
                                </div>

                    ";
                        } ;
                        ?>
                             </div>
                        </div>
                    </div>
                       
            </div>
<div class='tab-class text-center wow fadeInUp' data-wow-delay='0.1s' style='padding-bottom:50px ;'>
                <ul class='nav nav-pills d-inline-flex justify-content-center border-bottom mb-5'>
                        <li class='nav-item'>
                            <a class='d-flex align-items-center text-start mx-3 ms-0 pb-3 active' data-bs-toggle='pill' href='#tab-1'>
                                <i class='fa fa-coffee fa-2x text-primary'></i>
                                <div class='ps-3'>
                                    <h6 class='mt-n1 mb-0'>BreakFast</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    
                         <div class='tab-content'>
                        <div class='tab-pane fade show p-0 active'>
                            <div class='row'>
                        <?php 
                        $query = "SELECT * FROM meals WHERE meal_cat = 'Breakfast'";
                        $meals_show=mysqli_query($connect,$query);

                        while($tabel_meals =mysqli_fetch_assoc($meals_show)){
                            $id = $tabel_meals['id'];
                        $meal_name = $tabel_meals['meal_name'];
                        $meal_price = $tabel_meals['meal_price'];
                        $meal_description = $tabel_meals['meal_description'];
                        $meal_image = $tabel_meals['meal_image'];
                        
                        echo "
                    

                            <div class='col-lg-6' style='padding-bottom:20px ;'>
                            <form action=\"index.php\" method=\"post\">
                                    <div class='d-flex align-items-center'>
                                        <img class='flex-shrink-0 img-fluid rounded' src='../images/$meal_image'  style='width: 80px;'>
                                        <div class='w-100 d-flex flex-column text-start ps-4'>
                                            <span class='d-flex justify-content-between border-bottom pb-2'>
                                                <span>$meal_name</span>
                                                <span class='text-primary'>$meal_price L.E</span>
                                            </span>
                                            <small class='fst-italic'>$meal_description</small>
                                            <input type='hidden' name='product_id' value='$id'>
                                            <button type=\"submit\" class=\"btn btn-danger\" name=\"add\" style='width: 105px;font-size: 10px;'>Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                    ";
                        } ;
                        ?>
                             </div>
                        </div>
                    </div>
                        
            </div>
        </div>
        <!-- Menu End -->


        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
                    <h1 class="mb-5">Team</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden" style="height: 480px;">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/team1.jpeg" alt="">
                            </div>
                            <h5 class="mb-0">Amgad Hesham Shaaban</h5>
                            <small>Flutter</small>
   
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item text-center rounded overflow-hidden"style="height: 480px;">
                            <div class="rounded-circle overflow-hidden m-4" style="padding-top: 71px;">
                                <img class="img-fluid" src="img/team2.jpeg" alt="">
                            </div>
                            <h5 class="mb-0">Mohamed Nagy Sayed</h5>
                            <small>Flutter</small>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item text-center rounded overflow-hidden" style="height: 480px;">
                            <div class="rounded-circle overflow-hidden m-4" style="padding-top: 37px;"> 
                                <img class="img-fluid" src="img/team3.jpeg" alt="">
                            </div>
                            <h5 class="mb-0">Amira Hossam El-Sayed</h5>
                            <small>Front-End</small>
    
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item text-center rounded overflow-hidden" style="height: 480px;">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/team4.jpg" alt="">
                            </div>
                            <h5 class="">Mostafa Hossam Mahmoud</h5>
                            <small>Back-End</small>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Smart Restaurant</a>, All Right Reserved. 
							
							Designed By <a class="border-bottom" href="">Amira Hossam El-Sayed</a><br><br>
                            Distributed By <a class="border-bottom" href="" target="_blank">Amira Hossam El-Sayed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>