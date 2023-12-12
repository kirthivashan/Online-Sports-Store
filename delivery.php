<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
    background-image: url("");
    }



    form {
      background: burlywood;
      margin-top: 140px;
      margin-bottom: 50px;
      width: 300px;
      height: 800px;
      border-radius: 5rem;
      padding: 50px;
      border: 2px solid black;
      opacity: 0.9;

    }
    input[type=text],input[type=text],input[type=date], input[type=number], input[type=text] {
    width: 200px;
    padding:10px;
    margin: 5px auto 22px auto;
    border: none;
    background: #ffffff;
    font-size:90%;
    
  }

  input[type=text]:focus,input[type=text]:focus,input[type=date]:focus, input[type=number]:focus, input[type=text]:focus  {
    background-color: #FFFFFF;
    outline: none;
  }

    #but {

      border-radius: 15px;
      border: 1px solid #09e783;
      padding: 14px;
      margin-left: 20px;
      background-color: white;
      font-size: 15px;
      margin-top: 40px;

    }

    #but:hover {
      background-color: forestgreen;
      color: white;
    }

    label,
    input {
      padding: 12px;
    }
  </style>

  <!-- <script>

        function confirm()
        {
            alert("Successfully ordered");
             
        }


    </script> -->
</head>

<body>

  <center>
    <div class="box">
      <?php
      session_start();
      $con = mysqli_connect("localhost:3306", "root", "", "webpr");
      $s = $_SESSION['user'];
     
      $sql = "select * from userdetail where username='$s'";
      $result = mysqli_query($con, $sql);

      if ($row = $result->fetch_assoc()) {
        echo "<form method='post' name='userdetail' id='form' enctype='multipart/form-data'>
            <br><label>Name</label><br>
            <input type='text' name='user' value='{$row['username']}'><br><br>
            <label>Email</label><br>
            <input type='text' name='mail' value='{$row['email']}'><br>
            <label >DOB</label><br>
            <input type='date' name='dob'><br>
            <label>MobileNumber</label><br>
            <input type='number' name='num' placeholder='mobile number' required><br>
            <label>State</label><br>
            <input type='text' name='nu' placeholder='state' required><br>
            <label>District</label><br>
            <input type='text' name='n' placeholder='district' required><br>
            <label>Address</label><br>
            <input type='text' name='add' placeholder='Enter your current address' required><br><br>

     
            <input type='checkbox'>
            <label>Cash on Delivery</label><br><br>
            <input type='checkbox'>
            <label>UPI-8438816477</label><br>
           
           
            <button type='submit'  name='submit' id='but' autocomplete='off'>Submit</button>            
            </form>";
      }

      if (isset($_GET['iid'])) {
        $product_id = intval($_GET['iid']);
  
        
        $sql = "select id from userdetail where username='$s'";
        $result = mysqli_query($con, $sql);

        if ($row = $result->fetch_assoc()) {
          $user_id = $row['id'];
          $con = mysqli_connect("localhost:3306", "root", "", "webpr");
          $query = "Select iname,iprice from image where iid=$product_id";
          $result = mysqli_query($con, $query);


          if ($row = $result->fetch_assoc()) {
            if (isset($_POST["submit"])) {
              $Address = $_POST['add'];
              $MobileNumber = $_POST['num'];
              $query = "insert into orderedstatus(userid,address,contact,productname,price,time) values('$user_id','$Address','$MobileNumber','{$row['iname']}','{$row['iprice']}',NOW())";
              $result = mysqli_query($con, $query);
              $sql = "update cart set status='false' where img_id=$product_id";
              $result = mysqli_query($con, $sql);
              header("Location:ordersuccess.php");
            }
          }
        }
      } else {
        if (isset($_POST["submit"])) {
          $Address = $_POST['add'];
          $MobileNumber = $_POST['num'];
          $DOB= $_POST['dob'];
          $sql = "select id from userdetail where username='$s'";
          $result = mysqli_query($con, $sql);

          if ($row = $result->fetch_assoc()) {
            $user_id = $row['id'];
            $query = "Select img_id from cart where user_id=$user_id";
            $result = mysqli_query($con, $query);


            while ($row = $result->fetch_assoc()) {
              

              $query = "Select iname,iprice from image where iid={$row['img_id']}";
              
              $resul = mysqli_query($con, $query);

              $sql = "update cart set status='false' where user_id=$user_id";
              $re = mysqli_query($con, $sql);

              while ($row = $resul->fetch_assoc()) {
                $query = "insert into orderedstatus(userid,address,contact,productname,price,time) values('$user_id','$Address','$MobileNumber','{$row['iname']}',{$row['iprice']},NOW())";
                $res = mysqli_query($con, $query);
              }
            }
          }
          header("Location:ordersuccess.php");
        }
      }

      ?>

    </div>
  </center>
</body>

</html>