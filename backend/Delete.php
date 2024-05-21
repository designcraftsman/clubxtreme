<?php
// Include necessary files and functions
include_once("../classes/Membre.php"); 
include_once("../classes/Utilisateur.php"); 
include_once("../classes/Entraineur.php"); 
include_once("../classes/PersonnelAdministratif.php"); 
include_once("../classes/Evenement.php"); 
include_once("../classes/SceanceEntrainement.php"); 
include_once("../classes/Rapport.php"); 
include_once("../backend/Check.php"); 
include_once("../backend/Load.php"); 

function deleteUser(int $id) {
    global $db;
    $deleted = 0;
    try {
        // Delete participation records first


        // Delete other related records
        $query = $db->prepare("DELETE FROM participationevenements WHERE id_participant IN (SELECT id_membre FROM member WHERE id_utilisateur = :id)");
        $query->bindValue(':id', $id);
        $query->execute();
        $deleted += $query->rowCount();

        // Delete other related records
        $query = $db->prepare("DELETE FROM member WHERE id_utilisateur = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        $deleted += $query->rowCount();

        $query = $db->prepare("DELETE FROM entraineur WHERE id_user = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        $deleted += $query->rowCount();

        $query = $db->prepare("DELETE FROM personneladministratif WHERE id_user = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        $deleted += $query->rowCount();

        $query = $db->prepare("DELETE FROM sceanceentrainement WHERE entraineur IN (SELECT id_entraineur WHERE id_utilisateur = :id)");
        $query->bindValue(':id', $id);
        $query->execute();
        $deleted += $query->rowCount();

        // Finally, delete the user record
        $query = $db->prepare("DELETE FROM user WHERE id_user = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        $deleted += $query->rowCount();

        // Check if any exception occurred during query execution
        if ($deleted == 0) {
            return false;
        } else {
            return true;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Handle the error appropriately
        return false;
    }
}


function deleteMember(int $id) {
    global $db;
    try {
        $query = $db->prepare("DELETE FROM participationevenements WHERE participant = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        $query = $db->prepare("DELETE FROM member WHERE id_membre = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Error deleting member: " . $e->getMessage();
        return false;
    }
}

function deleteEntraineur(int $id) {
    global $db;
    try {
        $query = $db->prepare("DELETE FROM entraineur WHERE id_entraineur = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Error deleting trainer: " . $e->getMessage();
        return false;
    }
}

function deletePersonnelAdministratif(int $id) {
    global $db;
    try {
        $query = $db->prepare("DELETE FROM personneladministratif WHERE id_personnelAdministratif = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Error deleting administrative staff: " . $e->getMessage();
        return false;
    }
}

function deleteEvenement(int $id) {
    global $db;
    try {
        
        $queryParticipations = $db->prepare("DELETE FROM participationevenements WHERE id_evenement = :id");
        $queryParticipations->bindValue(':id', $id);
        $queryParticipations->execute();

        $query = $db->prepare("DELETE FROM evenement WHERE id_Evenement = :id");
        $query->bindValue(':id', $id);
        $query->execute();

        return $query->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Error deleting event: " . $e->getMessage();
        return false;
    }
}

function deleteSceanceEntrainement(int $id) {
    global $db;
    try {
        $query = $db->prepare("DELETE FROM sceanceentrainement WHERE id_SeanceEntrainement = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Error deleting training session: " . $e->getMessage();
        return false;
    }
}

function deleteRapport(int $id) {
    global $db;
    try {
        $query = $db->prepare("DELETE FROM rapport WHERE id_Rapport = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Error deleting report: " . $e->getMessage();
        return false;
    }
}

?>
