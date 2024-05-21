<?php 
include_once("../backend/Check.php");

if(! isset($_SESSION['loggedin'])){
  $_SESSION['loggedin'] = false;
}
if($_SESSION["loggedin"] and $_SESSION["user"] and $_SESSION["position"]){
  $user= $_SESSION["user"];
  $position = $_SESSION["position"];
  if($position == "membre"){
    include_once("../components/membreNav.php");
  }
  elseif($position == "entraineur"){
    include_once("../components/entraineurNav.php");
  }
  elseif($position == "personnelAdministartif"){
    include_once("../components/PersonnelNav.php");
  }
  elseif($position == "admin"){
    include_once("../components/adminNav.php");
  }

}
?>
