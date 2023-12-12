<?php
  
 $con=mysqli_connect("localhost:3306","root","","webpr");
 
  if(isset($_REQUEST["name"]))
  {
     echo "<h1>Hello</h1>"; 
     $name=$_REQUEST['name'];
      print_r($name);
      $sql="delete from image where iid=$name";
      $result=mysqli_query($con,$sql);
  }

?>