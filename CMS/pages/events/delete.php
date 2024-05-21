<?php 
    include_once("../backend/Delete.php");
    include_once("../backend/endecryption.php");
    $id = decryptId($_GET['id'], $key);
    echo $id.'<br>'; 
    if(deleteEvenement($id)){
        header("Location: ./events.php");
    }
?>