<?php


include_once("../backend/dataBaseConnection.php");
include_once("../classes/Utilisateur.php");
include_once("../classes/Membre.php");
include_once("../classes/Entraineur.php");
include_once("../classes/PersonnelAdministratif.php");
include_once("../classes/Admin.php");
include_once("../classes/Rapport.php");
include_once("../classes/Transaction.php");
include_once("../classes/SceanceEntrainement.php");
include_once("../classes/Club.php");
include_once("../classes/Evenement.php");
function loadUsers(){
    global $db; 
    $users = array();
    $query = $db->prepare("SELECT * FROM user");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        // Check if the necessary keys exist in the row
        $id = isset($row['id_user']) ? $row['id_user'] : '';
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        // Check if the value is null or not
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        // Create DateTime object only if the value is not null
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        // Check if the value is null or not
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        
        $utilisateur = new Utilisateur($id,$nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        $users[] = $utilisateur; 
    }
    return $users;
}
function loadMembers(){
    global $db; 
    $members = array();
    $query = $db->prepare("SELECT * FROM member INNER JOIN user on user.id_user = member.id_utilisateur");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        // Check if the necessary keys exist in the row
        $idUser = isset($row['id_user']) ? $row['id_user'] : '';
        $idMembre = isset($row['id_membre']) ? $row['id_membre'] : '';
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        // Check if the value is null or not
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        // Create DateTime object only if the value is not null
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        // Check if the value is null or not
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        
        $member = new Membre($idUser,$idMembre,$nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        $members[] = $member; 
    }
    return $members;
}
function loadTransactionsParMembre(int $id){
    global $db; 
    $transactionsEffectue = array();
    $transactions = loadTransactions();
    foreach ($transactions as $transaction) {
        if($transaction->getMembre()->getIdMembre() == $id):
            $transactionsEffectue[] =  $transaction ;
        endif;
    }
    return $transactionsEffectue;
}
function loadParticipationsParMembre(int $id){
    global $db; 
    $evenementsDeParticipation = array();
    $evenementsParticipations = loadEvenemets();
    foreach ($evenementsParticipations as $evenementParticipation ) {
        foreach ($evenementParticipation->getParticipants() as $Participant) {
            if($Participant->getIdMembre() == $id):
                $evenementsDeParticipation[] =  $evenementParticipation ;
            endif;
        }
    }
    return $evenementsDeParticipation;
}
function loadTrainers(){
    global $db; 
    $entraineurs = array();
    $query = $db->prepare("SELECT * FROM entraineur INNER JOIN user on user.id_user = entraineur.id_utilisateur");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        
        $idUser = isset($row['id_user']) ? $row['id_user'] : '';
        $idEntraineur= isset($row['id_entraineur']) ? $row['id_entraineur'] : '';
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        $specialitee = isset($row['specialite']) ? $row['specialite'] : '';
        $niveauDeQualification = isset($row['niveauDeQualification']) ? $row['niveauDeQualification'] : '';
        
        // Assuming Entraineur is the correct class for trainers
        $entraineur = new Entraineur($idUser,$idEntraineur ,$nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone, $specialitee, $niveauDeQualification);
        $entraineurs[] = $entraineur; 
    }
    return $entraineurs;
}

function loadPersonnelsAdministratifs(){
    global $db; 
    $personnelsAdministratifs = array();
    $query = $db->prepare("SELECT * FROM personneladministratif INNER JOIN user on user.id_user = personneladministratif.id_utilisateur ");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $idUser = isset($row['id_user']) ? $row['id_user'] : '';
        $idPersonnel = isset($row['id_personnelAdministratif']) ? $row['id_personnelAdministratif'] : '';
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        $fonction = isset($row['fonction']) ? $row['fonction'] : '';
        // Convert 'dateEmbauche' to DateTime if not null
        $dateEmbauche = isset($row['dateEmbauche']) ? new DateTime($row['dateEmbauche']) : null;
        // Ensure that 'salaire' is correctly typed
        $salaire = isset($row['salaire']) ? (float)$row['salaire'] : 0.0;

        // Create an instance of PersonnelAdministratif
        $personnel = new PersonnelAdministratif($idUser,$idPersonnel,$nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone,  $fonction,  $dateEmbauche,  $salaire);
        $personnelsAdministratifs[] = $personnel; 
    }
    return $personnelsAdministratifs;
}

function loadAdmins(){
    global $db; 
    $Admins = array();
    $query = $db->prepare("SELECT * FROM admin INNER JOIN personneladministratif on admin.id_personneladministratif = personneladministratif.id_personnelAdministratif inner join user on user.id_user = personneladministratif.id_utilisateur");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $idUser = isset($row['id_user']) ? $row['id_user'] : '';
        $idPersonnel = isset($row['id_personnelAdministratif']) ? $row['id_personnelAdministratif'] : '';
        $idAdmin = isset($row['id_admin']) ? $row['id_admin'] : '';        
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        $fonction = isset($row['fonction']) ? $row['fonction'] : '';
        
        // Convert 'dateEmbauche' to DateTime if not null
        $dateEmbauche = isset($row['dateEmbauche']) ? new DateTime($row['dateEmbauche']) : null;
        
        // Ensure that 'salaire' is correctly typed
        $salaire = isset($row['salaire']) ? (float)$row['salaire'] : 0.0;

        // Create an instance of PersonnelAdministratif
        $admin = new Admin($idUser,$idPersonnel,$idAdmin,$nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone,  $fonction,  $dateEmbauche,  $salaire);
        $Admins[] = $admin; 
    }
    return $Admins;
}

function loadRapports(){
    global $db; 
    $rapports = array();
    $query = $db->prepare("SELECT * FROM rapport INNER JOIN user ON user.id_user = rapport.auteur");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        // Check if the necessary keys exist in the row
        $id = isset($row['id_Rapport']) ? $row['id_Rapport'] : '';
        $idUser = isset($row['id_utilisateur']) ? $row['id_utilisateur'] : 1;
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        // Check if the value is null or not
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        // Create DateTime object only if the value is not null
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        // Check if the value is null or not
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        $dateString = isset($row['date']) ? $row['date'] : '';
        $contenu = isset($row['contenu']) ? $row['contenu'] : '';
        
        // Convert the date string to a DateTime object
        $date = new DateTime($dateString);

        $auteur = new Utilisateur($idUser , $nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        $rapport = new Rapport($id,$date, $contenu, $auteur,$auteur);
        $rapports[] = $rapport; 
    }
    return $rapports;
}


function loadTransactions(){
    global $db; 
    $transactions = array();
    $query = $db->prepare("SELECT * FROM transaction INNER JOIN member ON member.id_membre = transaction.id_membre INNER JOIN user ON user.id_user = member.id_utilisateur");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $idMembre = isset($row['id_membre']) ? $row['id_membre'] : '';
        $idUtilisateur = isset($row['id_user']) ? $row['id_user'] : '';        
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';

        // Check if the necessary keys exist in the row
        $id = isset($row['id_transaction']) ? $row['id_transaction'] : '';
        $montant = isset($row['montant']) ? $row['montant'] : '';
        $date = isset($row['date']) ? new DateTime($row['date']) : null;
        $methode = isset($row['methode']) ? $row['methode'] : '';
        // Convert the date string to a DateTime object
        $status = isset($row['status']) ? $row['status'] : '';
        $type = isset($row['type']) ? $row['type'] : '';
        
        // Assuming you have an $auteur object available here
        $auteur = new Membre($idUtilisateur,$idMembre,$nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        
        $transaction = new Transaction($id , $montant, $auteur,$date, $methode ,$status, $type);

        $transactions[] = $transaction; 
    }
    return $transactions;
}

function loadSeanceEntrainements(){
    global $db; 
    $seancesEntrainement = array();
    $query = $db->prepare("SELECT * FROM sceanceentrainement");
    // id_SeanceEntrainement	date	lieu	exercices	entraineur
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        // Check if the necessary keys exist in the row
        $idSceanceEntrainement = isset($row['id_SeanceEntrainement']) ? $row['id_SeanceEntrainement'] : '';
        $date = isset($row['date']) ? new DateTime($row['date']) : null;
        $lieu = isset($row['lieu']) ? $row['lieu'] : '';
        $exercices = isset($row['exercices']) ? $row['exercices'] : '';
        $entraineurId = isset($row['entraineur']) ? $row['entraineur'] : '';

        // Fetch the entraineur for the session
        $queryEntraineur = $db->prepare("SELECT * FROM entraineur inner join user on user.id_user = entraineur.id_utilisateur WHERE id_entraineur = :id_entraineur ");
        $queryEntraineur->bindValue(':id_entraineur', $entraineurId, PDO::PARAM_INT);

        $queryEntraineur->execute();
        $rowEntraineur = $queryEntraineur->fetch(PDO::FETCH_ASSOC);
        $idUser = isset($rowEntraineur['id_user']) ? $rowEntraineur['id_user'] : '';

        $idUser = isset($rowEntraineur['id_user']) ? $rowEntraineur['id_user'] : '';
        $idEntraineur = isset($rowEntraineur['id_entraineur']) ? $rowEntraineur['id_entraineur'] : '';
        $nom = isset($rowEntraineur['nom']) ? $rowEntraineur['nom'] : '';
        $prenom = isset($rowEntraineur['prenom']) ? $rowEntraineur['prenom'] : '';
        $email = isset($rowEntraineur['email']) ? $rowEntraineur['email'] : '';
        $motDePasse = isset($rowEntraineur['motDePasse']) ? $rowEntraineur['motDePasse'] : '';
        $dateDeNaissance = isset($rowEntraineur['dateDeNaissance']) ? new DateTime($rowEntraineur['dateDeNaissance']) : new DateTime('2000-01-01');
        $numDeTelephone = isset($rowEntraineur['numDeTelephone']) ? $rowEntraineur['numDeTelephone'] : '';
        $specialite = isset($rowEntraineur['specialite']) ? $rowEntraineur['specialite'] : '';
        $niveauDeQualification = isset($rowEntraineur['niveauDeQualification']) ? $rowEntraineur['niveauDeQualification'] : '';

        $entraineur = new Entraineur($idUser,$idEntraineur ,$nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone,$specialite,$niveauDeQualification);

        $seanceEntrainement = new SceanceEntrainement($idSceanceEntrainement,$date, $lieu, $entraineur, $exercices);
        $seancesEntrainement[] = $seanceEntrainement; 
    }
    return $seancesEntrainement;
}

function loadParticipantsByEventName(string $eventName): array {
    global $db;

    try {
        // Prepare the query to select participants by event name
        $query = $db->prepare("SELECT m.id_membre , u.id_user , u.nom, u.prenom, u.email, u.motDePasse, u.dateDeNaissance, u.numDeTelephone 
                               FROM user u
                               INNER JOIN member m ON u.id_user = m.id_utilisateur
                               INNER JOIN participationEvenements pe ON m.id_membre = pe.id_participant
                               INNER JOIN evenement e ON pe.id_evenement = e.id_evenement
                               WHERE e.nom = :eventName");
        $query->bindValue(':eventName', $eventName);
        $query->execute();

        // Fetch all rows as associative arrays
        $participantsData = $query->fetchAll(PDO::FETCH_ASSOC);

        // Initialize an array to store Member objects
        $participants = [];

        // Iterate through each participant data and create Member objects
        foreach ($participantsData as $participantData) {
            // Create a new Member object
            $member = new Membre(
                $participantData['id_user'],
                $participantData['id_membre'],
                $participantData['nom'],
                $participantData['prenom'],
                $participantData['email'],
                $participantData['motDePasse'],
                new DateTime($participantData['dateDeNaissance']),
                $participantData['numDeTelephone']
            );

            // Add the Member object to the array
            $participants[] = $member;
        }

        // Return the array of Member objects
        return $participants;
    } catch (PDOException $e) {
        // Handle any database errors here (e.g., log the error, throw an exception, etc.)
        echo "Error: " . $e->getMessage() . "\n";
        return [];
    }
}


function loadEvenemets(){
    global $db; 
    $evenements = array();
    $query = $db->prepare("SELECT * FROM evenement");
    // id_Evenement	nom	date	lieu	description	
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        // Check if the necessary keys exist in the row
        $idEvenement = isset($row['id_Evenement']) ? $row['id_Evenement'] : '';
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $date = isset($row['date']) ? new DateTime($row['date']) : null;
        $lieu = isset($row['lieu']) ? $row['lieu'] : '';
        $description = isset($row['description']) ? $row['description'] : '';
        
        // Fetch participants for the event
        $participants = loadParticipantsByEventName($nom);
        
        // Create the Evenement object
        $evenement = new Evenement($idEvenement,$nom, $date, $lieu, $description, $participants);
        // Add Evenement object to the array
        $evenements[] = $evenement; 
    }
    return $evenements;
}


function loadClub(){
    global $db; 

    $query = $db->prepare("SELECT * FROM club");
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC); // Use fetch() instead of fetchAll() to get only one row
    if ($row) {
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $adresse = isset($row['adresse']) ? $row['adresse'] : '';
        $membres = loadMembers(); 
        $evenements = loadEvenemets();
        $entraineurs = loadTrainers(); 
        $club = new Club($nom, $adresse, $membres, $evenements, $entraineurs);

        return $club;
    }
}


?>
