<?php
include_once("../backend/dataBaseConnection.php");
include_once("../classes/Utilisateur.php");
include_once("../backend/Load.php"); 

function checkIfUserExists($email) {
    $users = loadUsers(); 
    foreach ($users as $user) {
        if ($user->getEmail() === $email) {
            return true;
        }
    }
    return false; // User does not already exist
}

function checkIfPasswordValid($email, $password) {
    // Check if the password meets the criteria
    $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/';
    // Check if the password matches the regex pattern
    if (preg_match($passwordRegex, $password)) {
        return false; // Password does not meet the criteria
    }
    return true; // Password meets the criteria
}

function checkIfEvenementExists($nom, $date, $lieu) {
    global $db;

    // Prepare and execute the query to check for the existence of the event
    $query = $db->prepare("SELECT COUNT(*) FROM evenement WHERE nom = :nom AND date = :date AND lieu = :lieu");
    $query->bindValue(':nom', $nom);
    $query->bindValue(':date', $date);
    $query->bindValue(':lieu', $lieu);
    $query->execute();

    // Fetch the count of matching events
    $count = $query->fetchColumn();

    // Return true if there are matching events, false otherwise
    return $count > 0;
}

function checkUser(Utilisateur $user){
    $admins = loadAdmins(); 
    $personnelsAdministartifs= loadPersonnelsAdministratifs();
    $entraineurs = loadTrainers();
    $membres = loadMembers();
    $users = loadUsers();
    foreach($admins as $admin):
        if($admin->getIdUtilisateur() == $user->getIdUtilisateur()){
            return "admin";
        }
    endforeach;

    foreach($personnelsAdministartifs as $personnelsAdministartif):
        if($personnelsAdministartif->getIdUtilisateur() == $user->getIdUtilisateur()){
            return "personnelAdministartif";
        }
    endforeach;

    foreach($entraineurs as $entraineur):
        if($entraineur->getIdUtilisateur() == $user->getIdUtilisateur()){
            return "entraineur";
        }
    endforeach;

    foreach($membres as $membre):
        if($membre->getIdUtilisateur() == $user->getIdUtilisateur()){
            return "membre";
        }
    endforeach;

    foreach($users as $utilisateur):
        if($utilisateur->getIdUtilisateur() == $user->getIdUtilisateur()){
            return "user";
        }
    endforeach;
}
?>