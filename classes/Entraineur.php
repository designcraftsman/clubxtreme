<?php
declare(strict_types=1);

class Entraineur extends Utilisateur
{
    private int $idUtilisateur;
    private int $idEntraineur;
    private string $specialite;
    private string $niveauQualification;

    public function __construct(int $idUtilisateur, int $idEntraineur, string $nom, string $prenom, string $email, string $motDePasse, DateTime $dateDeNaissance, string $numDeTelephone, string $specialite, string $niveauQualification)
    {
        parent::__construct($idUtilisateur, $nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        $this->idUtilisateur = $idUtilisateur;
        $this->idEntraineur = $idEntraineur;
        $this->specialite = $specialite;
        $this->niveauQualification = $niveauQualification;
    }
    
    public function getSpecialite(): string
    {
        return $this->specialite;
    }

    public function getNiveauQualification(): string
    {
        return $this->niveauQualification;
    }

    public function planifierSeanceEntrainement(DateTime $date, string $lieu): void
    {
        // TODO: Implement method
    }

    public function evaluerMembre(Membre $membre): string
    {
        // TODO: Implement method
        return "Evaluation";
    }

    // Getter method for ID
    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }

    // Getter method for ID
    public function getIdEntraineur(): int
    {
        return $this->idEntraineur;
    }

    // Setter method for specialite
    public function setSpecialite(string $specialite): void
    {
        $this->specialite = $specialite;
    }

    // Setter method for niveauQualification
    public function setNiveauQualification(string $niveauQualification): void
    {
        $this->niveauQualification = $niveauQualification;
    }
}
?>
