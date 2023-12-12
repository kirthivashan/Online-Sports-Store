<!DOCTYPE html>
<head>
<style>
  
    body{
    margin: 0;
    margin-bottom: 0;
}
  body, html {
    height: 100%;
    width: 100%;
    display: cover;
    font-family: Arial, Helvetica, sans-serif;
  }

  * {
    box-sizing: border-box;
  }

  .bg-img {

    background-color:burlywood;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    height: 100%;
    width: 100%;
    opacity:0.7;
  }


  .container {
    left: 30%;
    right: 25%;
    top: 25%;
    bottom: 35%;
    position: absolute;
    align-items: center;
    margin: 20px;
    max-width: 600px;
    padding: 50px;
    background-color: rgb(255, 252, 252);
    height: 60%;
  }


  input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #ffffff;
  }

  input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }

.btn {
    background-color: #de5d5d;
    color: white;
    padding: 16px 20px;
    border: 0cm;
    border-radius: 15px;
    cursor: pointer;
    width: 50%;
  }

 .btn:hover {
      background-color: #6eb086;
     
 }
h1:hover {
      color: black;
   }  


h4{
  text-align: left;
  color: blue;
  display: inline;
  padding: 60px;
}
h4:hover{
    color:red;
}
  </style> 
  </head>

  <body>

  <div class="bg-img">
    

    <form method="post" class="container">
      <center><b><h1>LOGIN</b></h1></center>

      <label for="email"><b>username</b></label>
      <input type="text" placeholder="Enter user name" name="user" required>

      <label for="psw"><b>password</b></b></label>
      <input type="password" placeholder="Enter password" name="psw" required>
      <button type="submit" class="btn" name="submit">submit</button> <br><br>
      <h4><a href="forgot.php">Forgot password?</h4></a>
      <h4><a href="create.php">create account</h4></a>
    </form>
  </div>

  <?php

if (isset($_POST['submit'])) {

  $username = $_POST['user'];
  $password = $_POST['psw'];

  $con = mysqli_connect("localhost:3306", "root", "", "webpr");
  $sql = "select username,password from userdetail where username='$username' and password='$password'";

  $result = mysqli_query($con, $sql);
  $c = mysqli_num_rows($result);

  if ($c > 0) {

    echo "<h5 style=text-align:center> Login Successful </h5>";

    if ($username == 'admin'  &&  $password == '8087') {
      session_start();
      $_SESSION['user'] = $username;
      echo "<script>
          window.location.assign('index1.php');
          alert('Login Successfull');
          </script>";
    } else {
      session_start();
      $_SESSION['user'] = $username;
      echo "<script>
          window.location.assign('index1.php');
          alert('Login Successfull');
          </script>";
    }
  } else {
    echo "<h5 style=text-align:center> Login Not Successful </h5>
      <script>alert('check the entered details')</script>";
  }
}



?>

  </body>
  </html>