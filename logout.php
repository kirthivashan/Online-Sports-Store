
<?php
session_start();
unset($_SESSION['user']);
if (!(isset($_SESSION['user']))) {
    echo "<script>window.location.href='index1.php'</script>";
    //  header('Location:index.php');
}

?>