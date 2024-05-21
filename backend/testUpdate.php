<?php
include_once("../classes/Utilisateur.php");
include_once("../backend/Update.php");
include_once("../backend/Save.php"); 

// Load sample data
$userToUpdate = loadUsers()[1];
$memberToUpdate = loadMembers()[1];
$personnelToUpdate = loadPersonnelsAdministratifs()[1];
$entraineurToUpdate = loadTrainers()[1];
$evenementToUpdate = loadEvenemets()[1];
$sessionToUpdate = loadSeanceEntrainements()[1];

// Update properties
$userToUpdate->setNom("UpdatedNa66me");
$userToUpdate->setPrenom("UpdatedL44astName");

$memberToUpdate->setNom("UpdatedMe4mberName");
$memberToUpdate->setPrenom("UpdatedMe6mberLastName");

$personnelToUpdate->setEmail("updatedemail516@example.com");
$personnelToUpdate->setSalaire(50100.75);

$entraineurToUpdate->setSpecialite("UpdatedSpecialty 6562");

$evenementToUpdate->setDescription("Updated event4 description 63");

$sessionToUpdate->setLieu("Updated 4location 5 45");

// Call update functions
echo "<br>Update User : " . (updateUser($userToUpdate) ? " Success" : " Failed") . "\n";
echo "<br>Update Member : " . (updateMember($memberToUpdate) ? " Success" : " Failed") . "\n";
echo "<br>Update Personnel : " . (updatePersonnelAdministratif($personnelToUpdate) ? " Success" : " Failed") . "\n";
echo "<br>Update Trainer : " . (updateEntraineur($entraineurToUpdate) ? " Success" : " Failed") . "\n";
echo "<br>Update Event : " . (updateEvenement($evenementToUpdate) ? " Success" : " Failed") . "\n";
echo "<br>Update Session : " . (updateSeanceEntrainement($sessionToUpdate) ? " Success" : " Failed") . "\n";
?>
