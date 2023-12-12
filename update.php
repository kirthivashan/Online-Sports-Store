<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
      #form {
            background:burlywood;
            margin-top: 180px;
            width: 700px;
            height: 130px;
            border-radius: 1rem;
            padding: 90px;
            border: 2px solid black;


        }

        #btn {

            border-radius: 15px;
            border: 1px solid black;
            padding: 14px;
            margin-left: 20px;
            background-color: white;
            font-size: 15px;
            margin-top: 40px;
            margin-bottom: 10px;

        }
        label{
            display:inline;
            height: 100px;
            width: 200px;
            padding: 20px;
            
        }
        input[type=password] {
       width: 70%;
       padding: 15px;
       margin: 5px 0 22px 0;
       border:black;
       background: white;
  }

        #btn:hover {
            background-color: red;
            color: white;
        }
  </style>
</head>

<body>
  <script>
    function my(){
      alert("password updated successfully");
    }
  </script>
  <?php
  session_start();
  $email = $_SESSION['email'];

  echo "<center> <form method='post' id='form' enctype='multipart/form-data'>
        
    <label><h4>Create Password</h4></label>
    <input type='password' name='pss' placeholder='create new password' required><br>

    <button onclick='my()' id='btn' name='Submit' autocomplete='off'>Submit</button>

      </form></center>";



  if (isset($_POST['Submit'])) {

    $newpass = $_POST['pss'];
    $con = mysqli_connect("localhost:3306", "root", "", "webp");
    $sql = "update loginfo set password='$newpass' where email='$email'";
    $result = mysqli_query($con, $sql);
  }


  ?>
</body>

</html>