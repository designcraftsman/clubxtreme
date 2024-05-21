<?php
include_once("../backend/Count.php");
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
    try{
        global $db;
        $query = $db->prepare("SELECT COUNT(*) AS total FROM transaction");
        $query->execute();
        $total = $query->fetch(PDO::FETCH_ASSOC)['total'];
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Handle the error appropriately
        return false;
    }
    return $total;
}
function countTournois(){
    $total=0;
    try{
        global $db;
        $query = $db->prepare("SELECT COUNT(*) AS total FROM evenement");
        $query->execute();
        $total = $query->fetch(PDO::FETCH_ASSOC)['total'];
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Handle the error appropriately
        return false;
    }
    return $total;
}
?>