
<?php
ob_start();
ini_set('display_errors', 0);

include('connection/connection.php') ?>
    <?php include("include/nav-bar.php") ?>
    <?php
    function inbox(){
        global $connect;
        $problems="SELECT * FROM problems ORDER BY id DESC";
        $problems_query=mysqli_query($connect,$problems);
        while($row =mysqli_fetch_array($problems_query)){
            $first_name=$row['first_name'];
            $last_name=$row['last_name'];
            $email=$row['email'];
            $description=$row['description'];
            echo "
                <tr class=\"unread selected\">
                <td>
                    <div class=\"ckbox ckbox-theme\">
                    <input id=\"checkbox1\" type=\"checkbox\"  class=\"mail-checkbox\">
                    <label for=\"checkbox1\"></label>
            </div>
            </td>
            <td>
                <a href=\"#\" class=\"star star-checked\"><i class=\"fa fa-star\"></i></a>
            </td>
            <td>
                <div class=\"media\">
                    <a href=\"#\" class=\"pull-left\">
                        <img alt=\"...\" src=\"https://bootdey.com/img/Content/avatar/avatar1.png\" style=\"max-width: 50px;\" class=\"media-object\">
                    </a>
                    <div class=\"media-body\">
                        <h4 class=\"text-primary\">$first_name $last_name</h4>
                        <div class=\"email-summary text-primary\">$email</div>
                        <p class=\"email-summary \" style=\"float: right;\"><strong>". substr_replace($description, "<strong>.....</strong>", 60);"</strong>
                        <span class=\"label label-success\">New</span> </p>
                    </div>
                </div>
            </td>
            </tr>
            ";
        }
    }


?>