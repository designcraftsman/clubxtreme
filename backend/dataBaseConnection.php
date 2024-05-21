<?php 
    try
    {
        $db = new PDO(
            'mysql:host=localhost; dbname=clubxtreme; charset=utf8',
            'root',
            '',
        );
    }
    catch(Exception $e)
    {
        die('erreur : '.$e->getMessage());
    }
?>
