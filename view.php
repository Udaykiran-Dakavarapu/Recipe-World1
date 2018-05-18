<?php 
  include "includes/connect.php";
  session_start();

  $rid = // het the rid parameter of GET request using $_GET associative array
  $qry = "SELECT * FROM `tbl_recipe` where `recipe_id`='$rid'";
  $sql = mysqli_query($conn,$qry) or die("error: ".$qry);
  if(mysqli_num_rows($sql)>0) 
     $row=mysqli_fetch_assoc($sql);
  else 
     $warning = "Invalid page";
?>
<!DOCTYPE html>
<html>
    <head>
            <title>Recipe World</title>
            <link rel="stylesheet" href="home.css">
    </head>   
    <body>
        <div class="header">
            <?php include "includes/header.php"?>
        </div>
        <div class="content">
            <div class="disp decription">
                <h2><?php echo $row['name'];?></h2>
                <p ><?php echo $row['description'];?></p>
                <h3>Ingredients</h3>
                <?php echo $row['ingredients'];?>
                <h3>Directions</h3>
                 <?php echo $row['directions'];?>
                <h3>Your Photos</h3>
                <ul class="inline">
                    <li><img src="uploads/<?php echo $row['photo'];?>"></li>
                </ul>
            </div> 
            <p class="footer">&#169; 2014 Recipe World</p>
        </div>
    </body>  
</html>