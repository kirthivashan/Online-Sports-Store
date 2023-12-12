<?php
  
 $con=mysqli_connect("localhost:3306","root","","webpr");
 
  if(isset($_REQUEST["name"]))
  {
     
      $name=$_REQUEST['name'];
      $sql="delete from cart where img_id='$name'";
      $result=mysqli_query($con,$sql);
  }