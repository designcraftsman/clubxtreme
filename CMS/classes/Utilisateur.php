<?php
declare(strict_types=1);

class Utilisateur
{
    private int $idUtilisateur;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $motDePasse;
    protected DateTime $dateDeNaissance;
    protected string $numDeTelephone;

    public function __construct(int $idUtilisateur, string $nom, string $prenom, string $email, string $motDePasse, DateTime $dateDeNaissance, string $numDeTelephone)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->dateDeNaissance = $dateDeNaissance;
        $this->numDeTelephone = $numDeTelephone;
    }

    // Getter methods
    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }

    public function getDateDeNaissance(): DateTime
    {
        return $this->dateDeNaissance;
    }

    public function getNumDeTelephone(): string
    {
        return $this->numDeTelephone;
    }
    
    public function seConnecter(string $email, string $motDePasse): bool
    {
        return false;
    }

    public function seDeconnecter(): bool
    {
        // TODO: Implement logout functionality
        return false;
    }
}
?>
