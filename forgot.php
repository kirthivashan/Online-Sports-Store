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
        input[type=email] {
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <center>
        <form method="post" id='form' enctype="multipart/form-data">

            <label><h4>email</h4></label>
            <input type="email" name="email" placeholder="enter your email" required><br>
            <button id='btn' name="submit" autocomplete="off">submit</button>

        </form>
    </center>
    <?php

    if (isset($_POST["submit"])) {


        $email = $_POST['email'];
        $con = mysqli_connect("localhost:3306", "root", "", "webp");
        $sql = "select email from loginfo where email='$email' ";
        $result = mysqli_query($con, $sql);

        if ($row = $result->fetch_assoc()) {

            if ($email == $row['email']) {
                session_start();
                $_SESSION['email'] = $email;
                header("Location:update.php");
            }
        } else {
            echo "<script>alert('Mail does not match!!')";
        }
    }

    ?>


</body>

</html>