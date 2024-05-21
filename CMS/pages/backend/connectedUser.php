<?php 
if(isset($_SESSION['loggedin']) && isset($_COOKIE['user_email'] )){
  $user = $_SESSION["user"];
}
?>