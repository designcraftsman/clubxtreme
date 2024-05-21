<?php
// Include necessary files and classes
include_once("../backend/Load.php"); 
include_once("../backend/Save.php"); 

// Créez un objet événement
$membres = loadMembers();
$evenement = new Evenement(
    100,
    "Nom de l'événement 3", 
    new DateTime('2024-05-29'), 
    "Lieu de l'événement", 
    "Description de l'événement",
    []
);
$evenement->ajouterParticipant($membres[0]);
$evenement->ajouterParticipant($membres[1]);
$evenement->ajouterParticipant($membres[2]);
$evenement->ajouterParticipant($membres[3]);



// Tentez d'enregistrer l'événement
$resultat = saveEvenement($evenement);

// Vérifiez le résultat
if ($resultat) {
    echo "Événement enregistré avec succès !";
} else {
    echo "Échec de l'enregistrement de l'événement.";
}
?>
// All save functions work , now time to polish update functions and delete , ill use the id