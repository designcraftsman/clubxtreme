<?php
// Include necessary files and functions
include_once("../backend/Delete.php");
include_once("../backend/Load.php");

// Connect to the database (assuming you have a $db variable available)

// Test deleting a member

/* Works
// Test deleting a trainer
$trainerIdToDelete = 4; // Change this to the ID of the trainer you want to delete
if (deleteEntraineur($trainerIdToDelete)) {
    echo "Trainer deleted successfully.<br>";
} else {
    echo "Failed to delete trainer.<br>";
}
*/
/* Works
// Test deleting administrative staff
$staffIdToDelete = 3; // Change this to the ID of the administrative staff you want to delete
if (deletePersonnelAdministratif($staffIdToDelete)) {
    echo "Administrative staff deleted successfully.<br>";
} else {
    echo "Failed to delete administrative staff.<br>";
}
*/

// Test deleting an event
/* Works
$eventIdToDelete = 1; // Change this to the ID of the event you want to delete
if (deleteEvenement($eventIdToDelete)) {
    echo "Event deleted successfully.<br>";
} else {
    echo "Failed to delete event.<br>";
}
*/
/* Works
// Test deleting a training session
$sessionIdToDelete = 1; // Change this to the ID of the training session you want to delete
if (deleteSceanceEntrainement($sessionIdToDelete)) {
    echo "Training session deleted successfully.<br>";
} else {
    echo "Failed to delete training session.<br>";
}
*/
/* Works
// Test deleting a report
$reportIdToDelete = 1; // Change this to the ID of the report you want to delete
if (deleteRapport($reportIdToDelete)) {
    echo "Report deleted successfully.<br>";
} else {
    echo "Failed to delete report.<br>";
}
*/
?>
