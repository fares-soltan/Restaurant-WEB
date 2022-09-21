<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> Admin</a>
            </div>
            <!-- Top Menu Items -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="products.php"><i class="fa fa-fw fa-wrench"></i> Meals
                            <span class="label pull-right"><?php

                                $problems="SELECT COUNT(*) FROM meals";
                                $problems_query=mysqli_query($connect,$problems);
                                foreach($problems_query as $row) {echo  $row['COUNT(*)'];} ?></span></a>
                    </li>
                    <li>
                                <a href="ShowUsers.php"><i class="fa fa-fw fa-dashboard"></i>  Users
                                    <span class="label pull-right"><?php

                                        $problems="SELECT COUNT(*) FROM users";
                                        $problems_query=mysqli_query($connect,$problems);
                                        foreach($problems_query as $row) {echo  $row['COUNT(*)'];} ?></span></a></li>
                    <li>
                        <a href="ShowTables.php"><i class="fa fa-fw fa-dashboard"></i> Tables
                            <span class="label pull-right"><?php

                                $problems="SELECT COUNT(*) FROM tables";
                                $problems_query=mysqli_query($connect,$problems);
                                foreach($problems_query as $row) {echo  $row['COUNT(*)'];} ?></span></a></li>


                    <li>
                        <a href="ShowOrders.php"><i class="fa fa-fw fa-dashboard"></i>  Orders
                            <span class="label pull-right"><?php

                                $problems="SELECT COUNT(*) FROM orders";
                                $problems_query=mysqli_query($connect,$problems);
                                foreach($problems_query as $row) {echo  $row['COUNT(*)'];} ?></span></a></li>
                    <li>
                        <a href="completedOrders.php"><i class="fa fa-fw fa-dashboard"></i>Completed Orders
                            <span class="label pull-right"><?php

                                $problems="SELECT COUNT(*) FROM allorders";
                                $problems_query=mysqli_query($connect,$problems);
                                foreach($problems_query as $row) {echo  $row['COUNT(*)'];} ?></span></a></li>



                    <!-- <li>

                                <a href="Addusers.php"><i class="fa fa-repeat" aria-hidden="true"></i>   Add users</a>
                    </li> -->
                    <li>
                        <a href="feedback.php"><i class="fa fa-comments" aria-hidden="true"></i>  FeedBack<span class="label pull-right"><?php

                                $problems="SELECT COUNT(*) FROM problems";
                                $problems_query=mysqli_query($connect,$problems);
                                foreach($problems_query as $row) {echo  $row['COUNT(*)'];} ?></span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            
            
        </nav>