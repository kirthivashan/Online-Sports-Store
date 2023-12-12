
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
  h1{
      text-align:center;
      padding:20px;
      font-family:sans-serif;
      font-size:100%;
  }

.a {

    background-color: antiquewhite;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    height: 100%;
    width: 100%;
  }


 .container {
    
    position: absolute;
    top: 10%;
    right: 37%;
    margin: 15px;
    max-width: 600px;
    padding: 70px;
    background-color: rgba(168, 158, 158,0.623);
    height: 70%;
    font-size:90%;
    opacity:0.8;
    
  }


  input[type=text], input[type=number], input[type=text] {
    width: 200px;
    padding:10px;
    margin: 5px auto 22px auto;
    border: none;
    background: #ffffff;
    font-size:90%;
    
  }

  input[type=text]:focus, input[type=number]:focus,input[type=text]:focus {
    background-color: #FFFFFF;
    outline: none;
  }

.btn {
    background-color: #de5d5d;
    color: white;
    padding: 15px 19px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 1;
  }

 .btn:hover {
      background-color: #6eb086;
     
 }
h1:hover {
      color: #df4646;
   
  }  
  </style> 


<body>
    <div class="a">
        <form  method="post" class="container">
            <h1> CREATE ACCOUNT </h1>
            <label for="name"><b>username</b></label><br>
            <input type="text" placeholder="enter name" name="user" required>
            <br>
            <label for="email"><b>email</b></label><br>
            <input type="text" placeholder="enter your email" name="email" required>
            <br>
            
            <label for="password"><b>password</b></label><br>
            <input type="text" placeholder="create your password" name="pass" required>
            <br>
              <button type="submit" class="btn" name="submit">submit</button>
        </form>
        <?php

if (isset($_POST['submit'])) {

  $username = $_POST['user'];
  $email=$_POST['email'];
  $password = $_POST['pass'];

  $con = mysqli_connect("localhost:3306", "root", "", "webpr");
  $sql = "insert into userdetail(username,email,password) values ('$username','$email','$password')";

  $result = mysqli_query($con, $sql);
}



?>
    </div>
</body>
