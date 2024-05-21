<?php
include_once("./dataBaseConnection.php");
function countEvenements(){
    $total=0;
    global $db;
    $query = $db->prepare("SELECT COUNT(*) AS total FROM evenement");
    $query->execute();
    $total = $query->fetch(PDO::FETCH_ASSOC)['total'];
    return $total;
}
function countTransactions(){
    $total=0;
    global $db;
    $query = $db->prepare("SELECT COUNT(*) AS total FROM transaction");
    $query->execute();
    $total = $query->fetch(PDO::FETCH_ASSOC)['total'];
    return $total;
}
function countTournois(){
    $total=0;
    global $db;
    $query = $db->prepare("SELECT COUNT(*) AS total FROM evenement");
    $query->execute();
    $total = $query->fetch(PDO::FETCH_ASSOC)['total'];
    return $total;
}
?>