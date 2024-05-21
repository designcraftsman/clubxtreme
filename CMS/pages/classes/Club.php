<?php
declare(strict_types=1);

declare(strict_types=1);

class Club
{
    private string $nom;
    public string $adresse;
    private array $membres;
    private array $evenements;
    private array $entraineurs;

    public function __construct(string $nom, string $adresse, array $membres = [], array $evenements = [], array $entraineurs = [])
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->membres = $membres;
        $this->evenements = $evenements;
        $this->entraineurs = $entraineurs;
    }

    // Getter methods
    public function getNom(): string
    {
        return $this->nom;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function getMembres(): array
    {
        return $this->membres;
    }

    public function getEvenements(): array
    {
        return $this->evenements;
    }

    public function getEntraineurs(): array
    {
        return $this->entraineurs;
    }

    public function ajouterMembre(Membre $membre): void
    {
        // TODO implement here
    }

    public function supprimerMembre(Membre $membre): void
    {
        // TODO implement here
    }

    public function ajouterEvenement(Evenement $evenement): void
    {
        // TODO implement here
    }

    public function supprimerEvenement(Evenement $evenement): void
    {
        // TODO implement here
    }

    public function ajouterEntraîneur(Entraineur $entraineur): void
    {
        // TODO implement here
    }

    public function supprimerEntraîneur(Entraineur $entraineur): void
    {
        // TODO implement here
    }
}

?>
