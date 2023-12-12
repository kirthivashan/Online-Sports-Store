<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin</title>

   <style>
      body {
         background-image: url("images/background_template.jpg");
      }

      #f1 {
         padding: 20px;
         width: 100px;
         display: inline-block;
      }

      #form {
         background:burlywood;
         margin-top: 180px;
         width: 390px;
         height: 400px;
         border-radius: 1rem;
         box-shadow: 0rem 0rem 3.57rem 1rem #796F79;
         padding: 40px;
         border: 2px solid black;

      }

      #btn {

         border-radius: 15px;
         border: 1px solid red;
         padding: 14px;
         margin-left: 20px;
         background-color: white;
         font-size: 15px;
         margin-top: 40px;

      }

      label,
      input {
         padding: 10px;
         width: 100px;
         display: inline-block;
      }

      #btn:hover {
         background-color:red;
         color: white;
      }

      h1 {
         text-transform: capitalize;
         color: darkblue;
      }

      table {
         padding: 30px;
      }

      table td {
         padding: 40px;
         /* border: 1px solid rgb(234, 255, 3); */
         text-align: center;


      }
   </style>
</head>

<body>
   <center>
      <table>
         <tr>
            <td>

               <form method="post" enctype="multipart/form-data" id="form">
                  <h1>Upload your image</h1>
                  <label id='f1'>Choose Image</label>
                  <input type="file" name="img"><br>
                  <label id='f1'>Enter the price</label>
                  <input type="text" name="rup"><br><br>
                  <label id='f1'>product name</label>
                  <input type="text" name="size">
                  <input type="submit" name="submit" id="btn" autocomplete="off">

               </form>

            </td>
            <td>

               <form method="post" enctype="multipart/form-data" id="form">
                  <h1> To Update products</h1>
                  <label id='f1'>Enter the Productname</label>
                  <input type="text" name="img_n"><br>
                  <label id='f1'>Price</label>
                  <input type="text" name="rupee"><br><br>

                  <input type="submit" name="sub" id="btn" autocomplete="off">

               </form>

            </td>
         </tr>

      </table>
   </center>




   <?php
   if (isset($_POST["submit"])) {
      //  $img_name=$_POST['img'];

      $image = $_FILES['img']['tmp_name'];
      $name = $_FILES['img']['name'];
      $price = $_POST['rup'];

      $image = file_get_contents($image);
      $image = base64_encode($image);

      $se = $_POST['size'];

      $con = mysqli_connect("localhost:3306", "root", "", "webpr");
      $sql = "insert into image(iid,iname,iprice,iph) values('$name','$se','$price','$image')";
      $result = mysqli_query($con, $sql);
   } else if ((isset($_POST["sub"]))) {
      $con = mysqli_connect("localhost:3306", "root", "", "webpr");
      $size = $_POST['siz'];
      $pr = $_POST['rupee'];
      $na = $_POST['img_n'];

      $sql = "update image set Size='$size',price='$pr' where img_name='$na'";
      $result = mysqli_query($con, $sql);
   }



   ?>
</body>

</html>