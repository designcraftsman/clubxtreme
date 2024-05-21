<?php
declare(strict_types=1);

class PersonnelAdministratif extends Utilisateur
{
    private int $idUtilisateur;
    private int $idPersonnelAdministratif;
    private string $fonction;
    private DateTime $dateEmbauche;
    private float $salaire;

    public function __construct(int $idUtilisateur, int $idPersonnelAdministratif, string $nom, string $prenom, string $email, string $motDePasse, DateTime $dateDeNaissance, string $numDeTelephone, string $fonction, DateTime $dateEmbauche, float $salaire)
    {
        parent::__construct($idUtilisateur, $nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        $this->idUtilisateur = $idUtilisateur;
        $this->idPersonnelAdministratif = $idPersonnelAdministratif;
        $this->fonction = $fonction;
        $this->dateEmbauche = $dateEmbauche;
        $this->salaire = $salaire;
    }

    // Getter method for ID
    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }

    // Getter method for ID
    public function getIdPersonnelAdministratif(): int
    {
        return $this->idPersonnelAdministratif;
    }

    // Getter methods
    public function getFonction(): string
    {
        return $this->fonction;
    }

    public function getDateEmbauche(): DateTime
    {
        return $this->dateEmbauche;
    }

    public function getSalaire(): float
    {
        return $this->salaire;
    }

    public function modifierFonction(string $nouvelleFonction): void
    {
        // TODO implement here
    }

    public function ajouterMembre(Membre $membre): void
    {
        // TODO implement here
    }

    public function supprimerMembre(Membre $membre): void
    {
        // TODO implement here
    }

    public function enregistrerTransaction(Transaction $transaction): bool
    {
        // TODO implement here
        return false;
    }
}
?>
