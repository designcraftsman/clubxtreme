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

// Function to save a new user into the database after applying checks
function saveUser(Utilisateur $user) {
    global $db;
    // Extract data from userData
    $email = $user->getEmail();
    $password = $user->getMotDePasse();

    // Check if user already exists
    if (checkIfUserExists($email)) {
        echo "Un Utilisateur avec le meme email exite déja !";
        return false; 
    }
    // Check if password is valid
    if (!checkIfPasswordValid($email, $password)) {
        echo "mot de passe invalide !!";
        return false; // Or throw an exception, display an error message, etc.
    }

    

    $query = $db->prepare("INSERT INTO user (nom, prenom, email, motDePasse, dateDeNaissance, numDeTelephone) VALUES (:nom, :prenom, :email, :motDePasse, :dateDeNaissance, :numDeTelephone)");
    $query->bindValue(':nom', $user->getNom());
    $query->bindValue(':prenom', $user->getPrenom());
    $query->bindValue(':email', $user->getEmail());
    $query->bindValue(':motDePasse', $user->getMotDePasse());
    $query->bindValue(':dateDeNaissance', $user->getDateDeNaissance()->format('Y-m-d'));
    $query->bindValue(':numDeTelephone', $user->getNumDeTelephone());

    $query->execute();

    if ($query->rowCount() == 0) {
        return false;
    }
    return true;
}

function saveMember(Membre $member) {
    global $db;

    // Save the user information first
    if (!saveUser(new utilisateur(1,$member->getNom(), $member->getPrenom(), $member->getEmail(), $member->getMotDePasse(), $member->getDateDeNaissance(), $member->getNumDeTelephone()))){
        return false; // Failed to save user
    }

    // Check if the member already exists in the database
    $queryCheck = $db->prepare("SELECT COUNT(*) FROM member WHERE id_utilisateur = (SELECT id_user FROM user WHERE email = :email)");
    $queryCheck->bindValue(':email', $member->getEmail());
    $queryCheck->execute();
    $memberExists = (bool) $queryCheck->fetchColumn();

    if (! $memberExists){
        // Member doesn't exist, insert a new record
        $query = $db->prepare("INSERT INTO member (id_utilisateur) VALUES ((SELECT id_user FROM user WHERE email = :email))");
    }
    // Bind parameters
    $query->bindValue(':email', $member->getEmail());

    // Execute the query
    $query->execute();

    // Check if the operation was successful
    if ($query->rowCount() > 0) {
        return true; // Member saved successfully
    } else {
        return false; // Failed to save member
    }
}

function saveEntraineur(Entraineur $entraineur) {
    global $db;

    // Save the user information first
    if (!saveUser(new Utilisateur(
        1000,
        $entraineur->getNom(),
        $entraineur->getPrenom(),
        $entraineur->getEmail(),
        $entraineur->getMotDePasse(),
        $entraineur->getDateDeNaissance(),
        $entraineur->getNumDeTelephone()
    ))) {
        return false; // Failed to save user
    }

    // Check if the trainer already exists in the database
    $queryCheck = $db->prepare("SELECT COUNT(*) FROM entraineur WHERE id_utilisateur = (SELECT id_user FROM user WHERE email = :email)");
    $queryCheck->bindValue(':email', $entraineur->getEmail());
    $queryCheck->execute();
    $trainerExists = (bool) $queryCheck->fetchColumn();

    if (! $trainerExists){
        // Trainer doesn't exist, insert a new record
        $query = $db->prepare("INSERT INTO entraineur (id_utilisateur, specialite, niveauDeQualification) VALUES ((SELECT id_user FROM user WHERE email = :email), :specialite, :niveauDeQualification)");
    } else {
        // Trainer exists, update the existing record
        $query = $db->prepare("UPDATE entraineur SET specialite = :specialite, niveauDeQualification = :niveauDeQualification WHERE id_utilisateur = (SELECT id_user FROM user WHERE email = :email)");
    }

    // Bind parameters
    $query->bindValue(':email', $entraineur->getEmail());
    $query->bindValue(':specialite', $entraineur->getSpecialite());
    $query->bindValue(':niveauDeQualification', $entraineur->getNiveauQualification());

    // Execute the query
    $query->execute();

    // Check if the operation was successful
    if ($query->rowCount() > 0) {
        return true; // Trainer saved successfully
    } else {
        return false; // Failed to save trainer
    }
}

function savePersonnelAdministratif(PersonnelAdministratif $personnel) {
    global $db;

    // Save the user information first
    if (!saveUser(new Utilisateur(
        1000,
        $personnel->getNom(),
        $personnel->getPrenom(),
        $personnel->getEmail(),
        $personnel->getMotDePasse(),
        $personnel->getDateDeNaissance(),
        $personnel->getNumDeTelephone()
    ))) {
        return false; // Failed to save user
    }

    // Check if the administrative staff already exists in the database
    $queryCheck = $db->prepare("SELECT COUNT(*) FROM personneladministratif WHERE id_utilisateur = (SELECT id_user FROM user WHERE email = :email)");
    $queryCheck->bindValue(':email', $personnel->getEmail());
    $queryCheck->execute();
    $staffExists = (bool) $queryCheck->fetchColumn();

    if (! $staffExists){
        // Administrative staff doesn't exist, insert a new record
        $query = $db->prepare("INSERT INTO personneladministratif (id_utilisateur, fonction, dateEmbauche, salaire) VALUES ((SELECT id_user FROM user WHERE email = :email), :fonction, :dateEmbauche, :salaire)");
    } else {
        // Administrative staff exists, update the existing record
        $query = $db->prepare("UPDATE personneladministratif SET fonction = :fonction, dateEmbauche = :dateEmbauche, salaire = :salaire WHERE id_utilisateur = (SELECT id_user FROM user WHERE email = :email)");
    }

    // Bind parameters
    $query->bindValue(':email', $personnel->getEmail());
    $query->bindValue(':fonction', $personnel->getFonction());
    $query->bindValue(':dateEmbauche', $personnel->getDateEmbauche()->format('Y-m-d'));
    $query->bindValue(':salaire', $personnel->getSalaire());

    // Execute the query
    $query->execute();

    // Check if the operation was successful
    if ($query->rowCount() > 0) {
        return true; // Administrative staff saved successfully
    } else {
        return false; // Failed to save administrative staff
    }
}

// Include necessary files and functions
function saveEvenement(Evenement $evenement) {
    global $db;

    try {
        // Start a transaction
        $db->beginTransaction();

        // Check if the event already exists in the database
        if (checkIfEvenementExists($evenement->getNom(), $evenement->getDate()->format('Y-m-d'), $evenement->getLieu())) {
            echo "L'événement existe déjà !";
            return false;
        }

        // Prepare the SQL statement to insert the event
        $query = $db->prepare("INSERT INTO evenement (nom, date, lieu, description) VALUES (:nom, :date, :lieu, :description)");

        // Bind parameters
        $query->bindValue(':nom', $evenement->getNom());
        $query->bindValue(':date', $evenement->getDate()->format('Y-m-d'));
        $query->bindValue(':lieu', $evenement->getLieu());
        $query->bindValue(':description', $evenement->getDescription());

        // Execute the query to save the event
        $query->execute();

        // Get the ID of the newly inserted event
        $eventId = $db->lastInsertId();

        // Save participation of each participant
        foreach ($evenement->getParticipants() as $participant) {
            // Prepare the SQL statement to insert participation
            $participationQuery = $db->prepare("INSERT INTO participationevenements (id_participant, id_evenement) VALUES (:id_participant, :id_evenement)");


            // Bind parameters
            $participationQuery->bindValue(':id_participant', $participant->getIdMembre());
            $participationQuery->bindValue(':id_evenement', $eventId);

            // Execute the query to save participation
            $participationQuery->execute();
        }

        // Commit the transaction
        $db->commit();

        return true; // Event and participation saved successfully
    } catch (PDOException $e) {
        // Rollback the transaction if an error occurs
        $db->rollBack();
        echo "Error: " . $e->getMessage();
        return false; // Failed to save event and participation
    }
}

function saveSeanceEntrainement(SceanceEntrainement $seance) {
    global $db;

    try {
        // Start a transaction
        $db->beginTransaction();

        // Prepare the SQL statement to insert the training session
        $query = $db->prepare("INSERT INTO sceanceentrainement (date, lieu, exercices , entraineur) VALUES (:date, :lieu , :exercices, :entraineur)");

        // Initialize a flag to indicate if a valid trainer is found
        $trainerFound = false;

        // Bind parameters
        $query->bindValue(':date', $seance->getDate()->format('Y-m-d'));
        $query->bindValue(':lieu', $seance->getLieu());
        $query->bindValue(':exercices', $seance->getExercices());

        // Load trainers
        $entraineurs = loadTrainers();
        foreach ($entraineurs as $entraineur) {
            if ($entraineur->getEmail() == $seance->getEntraineur()->getEmail()) {
                $query->bindValue(':entraineur', $entraineur->getIdEntraineur());
                $trainerFound = true;
                break; // Exit the loop once a valid trainer is found
            }
        }

        // If no valid trainer is found, return false
        if (!$trainerFound) {
            echo "Error: No valid trainer found.";
            return false;
        }

        // Execute the query to save the training session
        $query->execute();

        // Commit the transaction
        $db->commit();

        return true; // Training session saved successfully
    } catch (PDOException $e) {
        // Rollback the transaction if an error occurs
        $db->rollBack();
        echo "Error: " . $e->getMessage();
        return false; // Failed to save training session
    }
}

function saveTransaction(Transaction $transaction) {
    global $db;

    try {
        // Start a transaction
        $db->beginTransaction();

        // Prepare the SQL statement to select the member ID
        $selectMemberIdQuery = $db->prepare("SELECT id_membre FROM member INNER JOIN user ON user.id_user = member.id_utilisateur WHERE email = :email");
        $selectMemberIdQuery->bindValue(':email', $transaction->getMembre()->getEmail());
        $selectMemberIdQuery->execute();
        $memberId = $selectMemberIdQuery->fetchColumn();

        // Prepare the SQL statement to insert the transaction
        $query = $db->prepare("INSERT INTO transaction (montant, id_membre, date, methode, status, type) VALUES (:montant, :id_membre, :date, :methode, :status, :type)");

        // Bind parameters
        $query->bindValue(':montant', $transaction->getMontant());
        $query->bindValue(':id_membre', $memberId);
        $query->bindValue(':date', $transaction->getDate()->format('Y-m-d'));
        $query->bindValue(':methode', $transaction->getMethode());
        $query->bindValue(':status', $transaction->getStatut());
        $query->bindValue(':type', $transaction->getType());

        // Execute the query to save the transaction
        $query->execute();

        // Commit the transaction
        $db->commit();

        return true; // Transaction saved successfully
    } catch (PDOException $e) {
        // Rollback the transaction if an error occurs
        $db->rollBack();
        echo "Error: " . $e->getMessage();
        return false; // Failed to save transaction
    }
}

function saveRapport(Rapport $rapport) {
    global $db;
    try {
        // Start a transaction
        $db->beginTransaction();

        // Prepare the SQL statement to select the user ID of the author
        $selectUserIdQuery = $db->prepare("SELECT id_user FROM user WHERE email = :email");
        $selectUserIdQuery->bindValue(':email', $rapport->getAuteur()->getEmail()); // Assuming getEmail() returns the email of the author
        $selectUserIdQuery->execute();
        $userId = $selectUserIdQuery->fetchColumn();

        // Prepare the SQL statement to select the user ID of the recipient
        $selectRecipientIdQuery = $db->prepare("SELECT id_user FROM user WHERE email = :email");
        $selectRecipientIdQuery->bindValue(':email', $rapport->getDestinataire()->getEmail()); // Assuming getEmail() returns the email of the recipient
        $selectRecipientIdQuery->execute();
        $recipientId = $selectRecipientIdQuery->fetchColumn();

        // Prepare the SQL statement to insert the rapport
        $query = $db->prepare("INSERT INTO rapport (date, auteur, contenu, destinataire) VALUES (:date, :auteur, :contenu, :destinataire)");

        // Bind parameters
        $query->bindValue(':date', $rapport->getDate()->format('Y-m-d'));
        $query->bindValue(':auteur', $userId); // Use the retrieved user ID for the author
        $query->bindValue(':contenu', $rapport->getContenu());
        $query->bindValue(':destinataire', $recipientId); // Use the retrieved user ID for the recipient

        // Execute the query to save the rapport
        $query->execute();

        // Commit the transaction
        $db->commit();

        return true; // Rapport saved successfully
    } catch (PDOException $e) {
        // Rollback the transaction if an error occurs
        $db->rollBack();
        echo "Error: " . $e->getMessage();
        return false; // Failed to save rapport
    }
}
?>
