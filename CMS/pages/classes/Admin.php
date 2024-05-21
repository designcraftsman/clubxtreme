<?php
declare(strict_types=1);

class Admin extends PersonnelAdministratif
{
    private int $idAdmin;

    public function __construct(int $idUtilisateur, int $idPersonnelAdministratif, int $idAdmin, string $nom, string $prenom, string $email, string $motDePasse, DateTime $dateDeNaissance, string $numDeTelephone, string $fonction, DateTime $dateEmbauche, float $salaire)
    {
        parent::__construct($idUtilisateur, $idPersonnelAdministratif, $nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone, $fonction, $dateEmbauche, $salaire);
        $this->idAdmin = $idAdmin;
    }

    // Getter and Setter for Admin ID
    public function getIdAdmin(): int
    {
        return $this->idAdmin;
    }

    // You can add other methods here as needed
    public function ajouterEvenement(Evenement $evenement): void
    {
        // TODO implement here
    }

    public function supprimerEvenement(Evenement $evenement): void
    {
        // TODO implement here
    }

    public function modifierEvenement(Evenement $evenement): void
    {
        // TODO implement here
    }

    public function ajouterEntraineur(Entraineur $entraineur): void
    {
        // TODO implement here
    }

    public function supprimerEntraineur(Entraineur $entraineur): void
    {
        // TODO implement here
    }
}
?>
