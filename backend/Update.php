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

function updateUser(Utilisateur $user) {
    global $db;
    // Extract data from userData
    $email = $user->getEmail();
    $password = $user->getMotDePasse();
    $id = $user->getIdUtilisateur();
    // Check if password is valid
    if (!checkIfPasswordValid($email, $password)) {
        echo "mot de passe invalide !!";
        return false; // Or throw an exception, display an error message, etc.
    }

    try {
        $query = $db->prepare("UPDATE USER SET nom=:nom ,
            prenom = :prenom ,
            motDePasse = :motDePasse ,
            email = :email ,
            dateDeNaissance = :dateDeNaissance ,
            numDeTelephone = :numDeTelephone  
            WHERE id_user = :id");
        $query->bindValue(':nom', $user->getNom());
        $query->bindValue(':prenom', $user->getPrenom());
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':motDePasse', $user->getMotDePasse());
        $query->bindValue(':dateDeNaissance', $user->getDateDeNaissance()->format('Y-m-d'));
        $query->bindValue(':numDeTelephone', $user->getNumDeTelephone());
        $query->bindValue(':id', $id);
        $query->execute();

        // Check if any exception occurred during query execution
        if ($query->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Handle the error appropriately
        return false;
    }
}

function updateMember(Membre $member) {
    global $db;
    // check if membre exists 
    $queryCheck = $db->prepare("SELECT COUNT(*) FROM member WHERE id_utilisateur = :id");
    $queryCheck->bindValue(':id', $member->getIdUtilisateur());
    $queryCheck->execute();
    $memberExists = (bool) $queryCheck->fetchColumn();
    if ($memberExists){
        if (!updateUser(new utilisateur($member->getIdUtilisateur(),$member->getNom(), $member->getPrenom(), $member->getEmail(), $member->getMotDePasse(), $member->getDateDeNaissance(), $member->getNumDeTelephone()))){
            return false; // Failed to update user
        }
    }
    return true; // Member updated successfully
}

function updateEntraineur(Entraineur $entraineur) {
    global $db;

    // Load trainers from the database
    $trainers = loadTrainers();

    // Check if the trainer already exists in the list of trainers
    $trainerExists = false;
    foreach ($trainers as $trainer) {
        if ($trainer->getIdUtilisateur() === $entraineur->getIdUtilisateur() && $trainer->getEmail() === $entraineur->getEmail()) {
            $trainerExists = true;
            break;
        }
    }

    if ($trainerExists) {
        // Trainer exists, proceed with updating

        // Update the user information first
        updateUser(new Utilisateur(
            $entraineur->getIdUtilisateur(),
            $entraineur->getNom(),
            $entraineur->getPrenom(),
            $entraineur->getEmail(),
            $entraineur->getMotDePasse(),
            $entraineur->getDateDeNaissance(),
            $entraineur->getNumDeTelephone()
        ));

        // Get the user ID based on email

        // Prepare and execute the UPDATE query for the trainer
        $query = $db->prepare("UPDATE entraineur SET specialite = :specialite, niveauDeQualification = :niveauDeQualification WHERE id_utilisateur = :userId");

        // Bind parameters
        $query->bindValue(':userId', $entraineur->getIdUtilisateur());
        $query->bindValue(':specialite', $entraineur->getSpecialite());
        $query->bindValue(':niveauDeQualification', $entraineur->getNiveauQualification());

        // Execute the query
        $query->execute();

        // Check if the operation was successful
        if ($query->rowCount() == 1) {
            return true; // Trainer updated successfully
        } else {
            return false; // Failed to update trainer
        }
    } else {
        return false; // Trainer does not exist in the list of trainers
    }
}
function updatePersonnelAdministratif(PersonnelAdministratif $personnel) {
    global $db;

    // update the user information first
    updateUser(new Utilisateur(
        $personnel->getIdUtilisateur(),
        $personnel->getNom(),
        $personnel->getPrenom(),
        $personnel->getEmail(),
        $personnel->getMotDePasse(),
        $personnel->getDateDeNaissance(),
        $personnel->getNumDeTelephone()
    ));

    // Check if the administrative staff already exists in the database
    $queryCheck = $db->prepare("SELECT COUNT(*) FROM personneladministratif WHERE id_utilisateur = :id_utilisateur");
    $queryCheck->bindValue(':id_utilisateur', $personnel->getIdUtilisateur());
    $queryCheck->execute();
    $staffExists = (bool) $queryCheck->fetchColumn();

    if ($staffExists){
        // Administrative staff exists : update
        $query = $db->prepare("UPDATE personneladministratif SET fonction = :fonction, dateEmbauche = :dateEmbauche, salaire = :salaire WHERE id_personnelAdministratif = :id_personnelAdministratif");
    
        // Bind parameters
        $query->bindValue(':fonction', $personnel->getFonction());
        $query->bindValue(':dateEmbauche', $personnel->getDateEmbauche()->format('Y-m-d'));
        $query->bindValue(':salaire', $personnel->getSalaire());
        $query->bindValue(':id_personnelAdministratif', $personnel->getIdPersonnelAdministratif());

        // Execute the query
        $query->execute();

        // Check if the operation was successful
        if ($query->rowCount() > 0) {
            return true; // Administrative staff saved successfully
        }
        else{
            return false;
        }
    }
    
}

function updateEvenement(Evenement $evenement) {
    global $db;

    try {
        // Start a transaction
        $db->beginTransaction();

        // Check if the event exists
        $evenements = loadEvenemets();
        $evenementId = null;

        // Find the event and fetch its ID
        foreach ($evenements as $existingEvent) {
            if ($existingEvent->getNom() === $evenement->getNom() && $existingEvent->getDate()->format('Y-m-d') === $evenement->getDate()->format('Y-m-d') && $existingEvent->getLieu() === $evenement->getLieu()) {
                $evenement->setIdEvenement($existingEvent->getIdEvenement());
                $evenementId = $evenement->getIdEvenement();

                if ($evenementId !== false) {
                    // Update the event details
                    $updateQuery = $db->prepare("UPDATE evenement SET description = :description WHERE id_evenement = :id_evenement");
                    $updateQuery->bindValue(':id_evenement', $evenement->getIdEvenement());
                    $updateQuery->bindValue(':description', $evenement->getDescription());
                    $updateQuery->execute();

                    // Get participants from the updated event
                    $updatedParticipants = $evenement->getParticipants();

                    // Check for new participants and add them to participationevenements table
                    foreach ($updatedParticipants as $participant) {
                        $participantId = $participant->getIdMembre();

                        // Check if the participant is new for this event
                        $checkParticipationQuery = $db->prepare("SELECT COUNT(*) FROM participationevenements WHERE id_participant = :id_participant AND id_evenement = :id_evenement");
                        $checkParticipationQuery->bindValue(':id_participant', $participantId);
                        $checkParticipationQuery->bindValue(':id_evenement', $evenementId);
                        $checkParticipationQuery->execute();
                        $participantExists = (bool) $checkParticipationQuery->fetchColumn();

                        if (!$participantExists) {
                            // Insert participation record
                            $participationQuery = $db->prepare("INSERT INTO participationevenements (id_participant, id_evenement) VALUES (:id_participant, :id_evenement)");
                            $participationQuery->bindValue(':id_participant', $participantId);
                            $participationQuery->bindValue(':id_evenement', $evenementId);
                            $participationQuery->execute();
                        }
                    }

                    // Commit the transaction
                    $db->commit();
                    return true; // Event and participation updated successfully
                } else {
                    // Event does not exist in the list of events or failed to fetch event ID
                    return false;
                }
            }
        }

        // Event does not exist in the list of events
        return false;

    } catch (PDOException $e) {
        // Rollback the transaction if an error occurs
        $db->rollBack();
        // Log the error
        error_log("Error updating event: " . $e->getMessage());
        return false; // Failed to update event and participation
    }
}

function updateSeanceEntrainement(SceanceEntrainement $seance) {
    global $db;

    try {
        // Start a transaction
        $db->beginTransaction();
        $seanceId = $seance->getId();

        if ($seanceId) {
            // Update the training session without modifying the trainer
            $query = $db->prepare("UPDATE sceanceentrainement SET date = :date, lieu = :lieu, exercices = :exercices WHERE id_SceanceEntrainement = :id_SceanceEntrainement");
            $query->bindValue(':date', $seance->getDate()->format('Y-m-d'));
            $query->bindValue(':lieu', $seance->getLieu());
            $query->bindValue(':exercices', $seance->getExercices());
            $query->bindValue(':id_SceanceEntrainement', $seanceId);
            $query->execute();
        } else {
            throw new Exception("Session not found");
        }

        // Commit the transaction
        $db->commit();
        return true; // Training session updated successfully
    } catch (Exception $e) {
        // Rollback the transaction if an error occurs
        $db->rollBack();
        error_log("Error: " . $e->getMessage());
        return false; // Failed to update training session
    }
}
?>
