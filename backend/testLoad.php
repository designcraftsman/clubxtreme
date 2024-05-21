<?php
include("../backend/Load.php");

echo "-------------------Utilisateurs------------------------<br>";
$users = loadUsers();
foreach ($users as $user) {
    echo "id user: " . $user->getIdUtilisateur() . "<br>";
    echo "Nom: " . $user->getNom() . "<br>";
    echo "Prenom: " . $user->getPrenom() . "<br>";
    echo "Email: " . $user->getEmail() . "<br>";
    echo "Mot de Passe: " . $user->getMotDePasse() . "<br>";
    echo "Date de Naissance: " . $user->getDateDeNaissance()->format('Y-m-d') . "<br>";
    echo "Numéro de Téléphone: " . $user->getNumDeTelephone() . "<br>";
    echo "<br>";
}
echo "-------------------Membres------------------------<br>";

$members = loadMembers();
foreach ($members as $membre) {
    echo "id user: " . $membre->getIdUtilisateur() . "<br>";
    echo "id membre: " . $membre->getIdMembre() . "<br>";
    echo "Nom: " . $membre->getNom() . "<br>";
    echo "Prenom: " . $membre->getPrenom() . "<br>";
    echo "Email: " . $membre->getEmail() . "<br>";
    echo "Mot de Passe: " . $membre->getMotDePasse() . "<br>";
    echo "Date de Naissance: " . $membre->getDateDeNaissance()->format('Y-m-d') . "<br>";
    echo "Numéro de Téléphone: " . $membre->getNumDeTelephone() . "<br>";
    echo "<br>";
}
echo "--------------------Entraineurs----------------------<br>";

$entraineurs = loadTrainers();
foreach ($entraineurs as $entraineur) {
    echo "id user: " . $entraineur->getIdUtilisateur() . "<br>";
    echo "id entraineur: " . $entraineur->getIdEntraineur() . "<br>";
    echo "Nom: " . $entraineur->getNom() . "<br>";
    echo "Prenom: " . $entraineur->getPrenom() . "<br>";
    echo "Email: " . $entraineur->getEmail() . "<br>";
    echo "Mot de Passe: " . $entraineur->getMotDePasse() . "<br>";
    echo "Date de Naissance: " . $entraineur->getDateDeNaissance()->format('Y-m-d') . "<br>";
    echo "Numéro de Téléphone: " . $entraineur->getNumDeTelephone() . "<br>";
    echo "Spécialité: " . $entraineur->getSpecialite() . "<br>";
    echo "Niveau De Qualification: " . $entraineur->getNiveauQualification() . "<br>";
    echo "<br>";
}

echo "--------------------Personnel Administratif----------------------<br>";

$personnelsAdministratifs = loadPersonnelsAdministratifs();
foreach ($personnelsAdministratifs as $personnel) {
    echo "id user: " . $personnel->getIdUtilisateur() . "<br>";
    echo "id personnel: " . $personnel->getIdPersonnelAdministratif() . "<br>";
    echo "Nom: " . $personnel->getNom() . "<br>";
    echo "Prenom: " . $personnel->getPrenom() . "<br>";
    echo "Email: " . $personnel->getEmail() . "<br>";
    echo "Mot de Passe: " . $personnel->getMotDePasse() . "<br>";
    echo "Date de Naissance: " . $personnel->getDateDeNaissance()->format('Y-m-d') . "<br>";
    echo "Numéro de Téléphone: " . $personnel->getNumDeTelephone() . "<br>";
    echo "Fonction: " . $personnel->getFonction() . "<br>";
    echo "Date d'embauche: " . ($personnel->getDateEmbauche() ? $personnel->getDateEmbauche()->format('Y-m-d') : 'N/A') . "<br>";
    echo "Salaire: " . $personnel->getSalaire() . "<br>";
    echo "<br>";
}

echo "--------------------Admins----------------------<br>";

$admins = loadAdmins();
foreach ($admins as $admin) {
    echo "id user: " . $admin->getIdUtilisateur() . "<br>";
    echo "id personnel: " . $admin->getIdPersonnelAdministratif() . "<br>";
    echo "id admin: " . $admin->getIdAdmin() . "<br>";
    echo "Nom: " . $admin->getNom() . "<br>";
    echo "Prenom: " . $admin->getPrenom() . "<br>";
    echo "Email: " . $admin->getEmail() . "<br>";
    echo "Mot de Passe: " . $admin->getMotDePasse() . "<br>";
    echo "Date de Naissance: " . $admin->getDateDeNaissance()->format('Y-m-d') . "<br>";
    echo "Numéro de Téléphone: " . $admin->getNumDeTelephone() . "<br>";
    echo "Fonction: " . $admin->getFonction() . "<br>";
    echo "Date d'embauche: " . ($admin->getDateEmbauche() ? $admin->getDateEmbauche()->format('Y-m-d') : 'N/A') . "<br>";
    echo "Salaire: " . $admin->getSalaire() . "<br>";
    echo "<br>";
}


echo "-------------------Rapports------------------------<br>";
$rapports = loadRapports();
foreach ($rapports as $rapport) {
    echo "id rapport: " . $rapport->getIdTapport() . "<br>";
    echo "Date: " . $rapport->getDate()->format('Y-m-d') . "<br>";
    echo "Contenu: " . $rapport->getContenu() . "<br>";
    echo "id Auteur ".$rapport->getAuteur()->getIdUtilisateur()." Auteur: " . $rapport->getAuteur()->getNom() . "<br>";
    echo "<br>";
}

echo "-------------------Transactions------------------------<br>";
$transactions = loadTransactions();
foreach ($transactions as $transaction) {
    echo "ID: " . $transaction->getId_transaction() . "<br>";
    echo "Montant: " . $transaction->getMontant() . "<br>";
    echo "Date: " . $transaction->getDate()->format('Y-m-d')  . "<br>";
    echo "Statut: " . $transaction->getStatut() . "<br>";
    echo "Type: " . $transaction->getType() . "<br>";
    // Assuming $transaction->getMembre() returns an object of type Membre
    $membre = $transaction->getMembre();
    echo "Membre: " . $membre->getNom() . " " . $membre->getPrenom() . "<br>";
    echo "<br>";
}


$evenements = loadEvenemets();
// Display the loaded events
echo "<br>-------------------Evenements------------------------<br>";
foreach ($evenements as $evenement) {
    echo "Nom: " . $evenement->getIdEvenement() . "<br>";
    echo "Nom: " . $evenement->getNom() . "<br>";
    echo "Date: " . $evenement->getDate()->format('Y-m-d') . "<br>";
    echo "Lieu: " . $evenement->getLieu() . "<br>";
    echo "Description: " . $evenement->getDescription() . "<br>";
    echo "Participants: <br>";
    foreach ($evenement->getParticipants() as $participant) {
        echo "- " . $participant->getIdUtilisateur()."<br>";
        echo "- " . $participant->getNom() . " " . $participant->getPrenom() . "<br>";
    }
    echo "<br>";
}

$seancesEntrainement = loadSeanceEntrainements();

// Display session training sessions
echo "-------------------Session Training Sessions------------------------<br>";
foreach ($seancesEntrainement as $seance) {
    echo "id scenace: " . $seance->getID() . "<br>";
    echo "Date: " . $seance->getDate()->format('Y-m-d') . "<br>";
    echo "Lieu: " . $seance->getLieu() . "<br>";
    echo "Exercices: " . $seance->getExercices() . "<br>";
    $entraineur = $seance->getEntraineur();
    echo "Entraineur: " . $entraineur->getNom() . " " . $entraineur->getPrenom() . "<br>";
    echo "<br>";
}
// Load the club object
$club = loadClub();

// Check if the club object is not null before accessing its properties or methods
if ($club !== null) {
    // Display club information
    echo "------------------------------------CLUB-----------------------------------<br>";
    echo "-------------------Club-----------------------<br>";
    echo "Nom: " . $club->getNom() . "<br>";
    echo "Adresse: " . $club->getAdresse() . "<br>";

    // Display members
    echo "<br>-------------------Membres-----------------------<br>";
    foreach ($club->getMembres() as $membre) {
        echo "Nom: " . $membre->getNom() . "<br>";
        echo "Prénom: " . $membre->getPrenom() . "<br>";
        // Display more member information if needed
        echo "<br>";
    }

    // Display events
    echo "<br>-------------------Événements-----------------------<br>";
    foreach ($club->getEvenements() as $evenement) {
        echo "Nom: " . $evenement->getNom() . "<br>";
        echo "Date: " . $evenement->getDate()->format('Y-m-d') . "<br>";
        echo "Lieu: " . $evenement->getLieu() . "<br>";
        foreach ($evenement->getParticipants() as $participant) {
            echo "- " . $participant->getNom() . " " . $participant->getPrenom() . "<br>";
        }
        echo "<br>";
    }

    // Display trainers
    echo "<br>-------------------Entraîneurs-----------------------<br>";
    foreach ($club->getEntraineurs() as $entraineur) {
        echo "Nom: " . $entraineur->getNom() . "<br>";
        echo "Prénom: " . $entraineur->getPrenom() . "<br>";
        // Display more trainer information if needed
        echo "<br>";
    }
} else {
    echo "Club not found.";
}


?>
