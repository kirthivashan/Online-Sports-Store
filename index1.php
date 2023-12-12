<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>document</title>
  <link rel="stylesheet" href="styles1.css">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>

  <script>
    function cart(data) {

      var name = data;

      $.post(
        "cart.php", {
          name: name
        }

      );






    }

    function lock() {

      alert(" Logout Successfully");

    }

    function sample() {
      alert("Login to continue");
    }

    function rem(data) {

      var name = data;
      alert('Successfully removed');
      $.post(
        "adminremove.php", {
          name: name
        }
      );
      window.location.reload();

    } </script>

  <nav>
    <div class="title">
      <header>Products</header>
    </div>
    <div class="info">
      <ul>

        <?php


        session_start();
        if (!(isset($_SESSION['user']))) {
          echo "<li><a href='index1.php' style='text-decoration: none;color: black;'><img src='house-fill.svg'></a></li>";
          echo "<li><a href='login.php' target='_blank' style='text-decoration: none;color: black; ' name='ch'><img src='box-arrow-in-right.svg'></a></li>";
        } else {
          if ($_SESSION['user'] == 'admin') {

            echo "<li><a href='index1.php' style='text-decoration: none;color: black;'><img src='house-fill.svg'></a></li>";
            echo "<li><a href='admin.php' target='_blank' style='text-decoration: none;color: black; ' name='ch'><img src='upload.svg'></a></li>
               <li onclick='lock()'><a href='logout.php' style='text-decoration:none;color:black'><img src='box-arrow-in-left.svg'></a></li>
               <li><a href='ordered_details.php' style='text-decoration: none;color: black;'><img src='cart3.svg'></a></li>";
          } else {

            echo  "<li><a href='index1.php' style='text-decoration: none;color: black;'><img src='house-fill.svg'></a></li>
                      <li><img id='img' src='person-check.svg'></li>

                       <li onclick='lock()'><a href='logout.php' style='text-decoration:none;color:black'><img src='box-arrow-in-left.svg'></a></li>
                       <li><a href='cart.php' style='text-decoration: none;color: black;'><img src='cart3.svg'></a></li>";
          }
        }
        ?>

      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="star">
      <a href="#" class="bi-star-fill"></a>
      <a href="#" class="bi-star-fill"></a>
      <a href="#" class="bi-star-fill"></a>
      <a href="#" class="bi-star-fill"></a>
      <a href="#" class="bi-star-fill"></a>
    </div>
  </div>

  <div class="main_page">
    <?php

    $con = mysqli_connect("localhost:3306", "root", "", "webpr");

    $sql = "select * from image";
    $result = $result = mysqli_query($con, $sql);
    echo "<div class='pg_body'>";
    while ($row = $result->fetch_assoc()) {

      echo " 
      <div class=parent>
     <img  src='data:image;base64,{$row["iph"]}'>
     <h5>{$row['iname']}</h5>
     <h2>₹{$row['iprice']}</h2>";

      if (!isset($_SESSION['user'])) {
        echo "<button onclick=sample() class='p1'>Add to cart</button>
       <button id='buy' onclick=sample() >Buy Now</button>
       </div>";
      } else {

        if ($_SESSION['user'] != 'admin') {

          echo "<button onclick=cart('{$row['iid']}')  class='p1' id='change_color'>Add to cart</button>
         <a id='buy' href=delivery.php?id={$row['iid']}'>Buynow</a>
        
        </div>";
        } else {

          echo "
        <button id='removeimg' onclick=rem('{$row['iid']}')>Remove</button>
                 
        </div>";
        }
      }
    }

    echo "</div>";


    ?>
  </div>

</body>

</html>