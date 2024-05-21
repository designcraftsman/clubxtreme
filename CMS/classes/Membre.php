<?php
declare(strict_types=1);
include_once("../classes/Utilisateur.php");

class Membre extends Utilisateur
{
    private int $idMembre;

    public function __construct( int $idUtilisateur,int $idMembre, string $nom, string $prenom, string $email, string $motDePasse, DateTime $dateDeNaissance, string $numDeTelephone)
    {
        parent::__construct($idUtilisateur, $nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        $this->idMembre = $idMembre;
    }

    public function participerEvenement(Evenement $evenement): void
    {
        // TODO implement here
        return ;
    }

    public function annulerParticipationEvenement(Evenement $evenement): void
    {
        // TODO implement here
        return ;
    }

    public function evaluerProgression(): string
    {
        // TODO implement here
        return "Evaluation";
    }

    // Getter method for ID
    public function getIdMembre(): int
    {
        return $this->idMembre;
    }
}
?>
