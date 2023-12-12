<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>


   <style>
      body {
         background-image: url("images/background_template.jpg");
      }

      table {

         margin-top: 70px;
         border-collapse: collapse;
         background-color:whitesmoke;
      }

      tr {
         text-align: center;
         border: 5px;
      }

      th {

         border: 2px solid black;
         padding: 20px;
         color:black;

      }

      td {
         border: 2px solid black;
         padding: 20px;
      }
   </style>
</head>

<body>

   <h2 style="text-align:center;margin-top:70px;color:red;text-transform:uppercase"><i>Ordered Details</i></h2>
</body>

</html>





<?php

session_start();
$con = mysqli_connect("localhost:3306", "root", "", "webpr");
$sql = "select * from orderedstatus";
$res = mysqli_query($con, $sql);


echo "<center>
<table>
<tr>
    <th>Name</th>
    <th>Address</th>
    <th>Phone</th> 
    <th>product</th>
    <th>price</th>
    <th>Date and time</th>
    

</tr>";



while ($row = $res->fetch_assoc()) {
   $user = $row['userid'];
   $Add = $row['address'];
   $ph=$row['contact'];
   $pro = $row['productname'];
   $pric = $row['price'];
   $time = $row['time'];


   $sql = "select username from userdetail where id=$user";
   $result = mysqli_query($con, $sql);


   if ($row = $result->fetch_assoc()) {

      echo
      "
        <tr>
        <td>{$row['username']}</td>
        <td>$Add</td>
        <td>$ph</td>
        <td>$pro</td>
        <td>$pric</td>
        <td>$time</td>
        </tr>";
   }
}
echo "</table></center>";
?>