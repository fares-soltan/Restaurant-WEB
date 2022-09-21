<?php 
include("./connection/connection.php");
?>
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
                Add User.
            </h1>
         <div class="col-md-6 col-xs-12">
                        
        <?php
            $succses= false;
            $error = false;
              if(isset($_POST['add_user'])){
                $User_Name = $_POST['user_name'];
                $User_Email = $_POST['user_email'];
                $User_Password = $_POST['user_password'];
                $User_Phone = $_POST['user_phone'];
                $User_Address = $_POST['user_Address'];
                $user_points = $_POST['user_points'];
                
                $check_name= "select * from users where user_name='$User_Name'";
                $run_name = mysqli_query($connect,$check_name);
                $check_name_for_signup =mysqli_num_rows($run_name);

                $check_email= "select * from users where user_email='$User_Email'";
                $run_email = mysqli_query($connect,$check_email);
                $check_email_for_signup =mysqli_num_rows($run_email);

                $check_phone= "select * from users where user_phone='$User_Phone'";
                $run_phone = mysqli_query($connect,$check_phone);
                $check_phone_for_signup =mysqli_num_rows($run_phone);
                if(strlen($User_Name)< 4){
                    $error = "Enter your Name Greater than 4 Characters";
              }elseif (strlen($User_Password)<8){
                 $error = "Enter your Password Greater than 8 numbers"; 
              }elseif ($check_name_for_signup ==1){
                   $error = "Username Already exists";
              }elseif($check_email_for_signup ==1){
                  $error = "Email Already exists";
              }elseif($check_phone_for_signup ==1){
                 $error = "Phone Already exists";
              }else{
                $qeury ="INSERT INTO users (user_name,user_email, user_phone, user_add, user_points, user_password) VALUES ('$User_Name', '$User_Email', '$User_Phone', '$User_Address','$user_points','$User_Password')";
                $insert_users=mysqli_query($connect,$qeury);
                $succses = "<img class='succses' src='images/succses.png' width=40px; >";
                header("Location: products.php");

                $error = "User (". $User_Name . ") Created..."; 
                                
             }
            }
        ?>
             <?php echo "<h4>$error</h4>"; ?>
             <form method="post" enctype="multipart/form-data">
                 <div class="form-group">
                    <label for="cat-title">User Name</label>
                     <input type="text" class="form-control" name ="user_name">
                 </div>
                 <div class="form-group">
                    <label for="cat-title">User Email</label>
                     <input type="text" class="form-control" name ="user_email">
                 </div>
                 <div class="form-group">
                    <label for="cat-title">User Password</label>
                     <input type="text" class="form-control" name ="user_password">
                 </div>
                 <div class="form-group">
                    <label for="cat-title">User Phone</label>
                     <input type="text" class="form-control" name ="user_phone">
                 </div>
                 <div class="form-group">
                    <label for="cat-title">User Address</label>
                     <input type="text" class="form-control" name ="user_Address">
                 </div>
                 <div class="form-group">
                    <label for="cat-title">User Points</label>
                     <input type="text" class="form-control" name ="user_points">
                 </div>
                 <div class="form-group">
                     <input type="submit" class="btn btn-primary" name ="add_user">
                     <?php echo $succses; ?>
                 </div>
             </form>
         </div>
</div>
<!-- /.container-fluid -->

</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("include/footer.php") ?>