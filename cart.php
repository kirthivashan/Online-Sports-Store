<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    function refresh() {
      window.location.reload();
    }
  </script>

  <style>
    .parent1 {

      width: 350px;
      padding: 50px;
      margin-left: 12px;
      margin-top: 14px;
      text-align: center;
      border-radius: 20px;
      border: 2px solid #f0f0f0;
      background-color: white;
      border: 1px solid rgb(234, 255, 3);
    }

    .parent1 img {
      /* padding: 5px; */
      height: 150px;
      width: 150px;

    }

    .parent1 h5 {
      text-align: center;
      text-transform: capitalize;
    }

    .parent1 h2 {
      text-align: center;
    }


    #buy {


      border: 1px solid rgb(234, 255, 3);
      border-radius: 15px;
      font-size: 15px;
      color: black;
      text-decoration: none;
      padding: 10px;
      background-color: white;


    }

    #buy:hover {
      background-color: green;
      color: white;

    }

    #p2 {

      border-radius: 15px;
      border: 1px solid rgb(234, 255, 3);
      padding: 12px;
      margin-left: 60px;
      text-decoration: none;
      color: black;
      background-color: white;
      font-size: 15px;


    }

    #p2:hover {
      background-color: red;
      color: wheat;
    }

    body {
      font-family: 'nunito', sans-serif;
      background-size: cover;
      background-repeat: no-repeat;
      background-image: url("");
    }

    .total_section {

      display: grid;
      grid-template-columns: repeat(3, 33.33%);
    }

    .parent1:hover {
      background: rgba(53, 8, 177, 0.167);

    }

    .tot_amount {

      width: 15%;
      text-align: center;
      margin-top: 90px;
      padding: 2px;
      margin-left: 85%;
      border: 2px solid #4D71A7;
      background-color: #f0f0f0;

    }

    #but {

      border-radius: 15px;
      border: 1px solid rgb(234, 255, 3);
      padding: 12px;
      margin-left: 60px;
      text-decoration: none;
      color: black;
      background-color: white;
      font-size: 15px;
    }

    #but:hover {
      background-color: forestgreen;
      color: white;
      transition-duration: 0.4s;
    }

    #incr_decr{
      margin-left: 140px;
      display:flex;
    }

    #incre{
      margin-left: 10px;
      height: 30px;
    }

    #decre{
      margin-right: 10px;
      height: 30px;
    }

    #val{
         
      margin-top:10px;
    }

  </style>
  <!-- price total -->
  <script>
    var b = 0;
    let c=0;

    function add(data) {
      b = b + data;

    }

    function increment(){
         c++;
         document.getElementById('val').innerHTML=c;
    }

    function decrement(){
         c--;
         document.getElementById('val').innerHTML=c;
    }
  </script>
</head>

<body>
  <h1 style="text-align:center; color: rgb(234, 255, 3);text-transform:uppercase">Cart </h1>
  <div class='total_section'>
    <?php

    session_start();
    $con = mysqli_connect("localhost:3306", "root", "", "webpr");
    $s = $_SESSION['user'];
    if (isset($_REQUEST["name"])) {

      $name = $_REQUEST['name'];
      $sql = "select id from userdetail where username='$s'";
      $result = mysqli_query($con, $sql);

      if ($row = $result->fetch_assoc()) {
        $q = "select img_id,user_id from cart where img_id='$name' and user_id='{$row['id']}'";
        $resp = mysqli_query($con, $q);
        $count = mysqli_num_rows($resp);
      }


      if ($count > 0) {
        echo "Already exists";
      } else {
        $sql = "select id from userdetail where username='$s'";
        $result = mysqli_query($con, $sql);

        if ($row = $result->fetch_assoc()) {

          $sql = "insert into cart(img_id,user_id) values('$name','{$row['id']}')";
          $result = mysqli_query($con, $sql);
        }
      }



    }


    //to display the cart product
    $sql = "select id from userdetail where username='$s'";
    $result = mysqli_query($con, $sql);
    if ($row = $result->fetch_assoc()) {

      $sql = "select img_id from cart where user_id={$row['id']} and status='true'";
      $resul = mysqli_query($con, $sql);

      while ($row = $resul->fetch_assoc()) {
        $sql = "select * from image where iid= {$row['img_id']}";
        $result = mysqli_query($con, $sql);
        while ($row = $result->fetch_assoc()) {
          $iid = $row['iid'];
          echo " 
        <div class=parent1>
        <center>
        <img  src='data:image;base64,{$row["iph"]}'>
        </center>
        <h5>{$row['iname']}</h5>
        <h2 id='pr' data-price='{$row['iprice']}'>₹{$row['iprice']}</h2>
        <div id='incr_decr'>
        <button id='decre' onclick='decrement()'>-</button>
        <h4 id='val'>0</h4>
        <button id='incre' onclick='increment()'>+</button>
        </div>
        <a id='buy' href=delivery.php?id=$iid'>Buynow</a>
        <button id='p2' onclick=remove('{$row['iid']}')>Remove</button>
        
        <script>
         
        var a={$row['iprice']}
                  add(a);
       
        </script>
        </div>";
        }
      }
      echo '</div>';
    }


    echo "<script>function remove(data)
    {
        var name=data;
        alert('Successfully removed from cart');
        $.post(
          'userremove.php',
           {name:name}            
         );
         window.location.reload();
       
    }</script>";


    // <!-- displaying total price -->

    echo "<div class='tot_amount'>
    <form id='amount'>
    <label id='tot'>Total Amount</label>
    <h2 id='out'></h2>
    <button  id='but'><a href='delivery.php' style='text-decoration:none;color:black'>Place order</a></button>
    </form>
    </div>";
    ?>

    <script>
      if (b > 0)
        document.getElementById('out').innerHTML = b;
      else {
        document.getElementById('out').innerHTML = "Nothing in cart";
        document.getElementById('tot').innerHTML = "";
        document.getElementById('but').innerHTML = "😑";
      }
    </script>

</body>

</html>