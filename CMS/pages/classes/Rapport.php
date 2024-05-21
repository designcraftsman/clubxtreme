<?php
declare(strict_types=1);

class Rapport
{
    private int $idRapport;
    private DateTime $date;
    private string $contenu;
    private Utilisateur $auteur;
    private utilisateur $destinataire ;

    public function __construct(int $idRapport ,DateTime $date, string $contenu, Utilisateur $auteur , Utilisateur $destinataire)
    {
        $this->idRapport = $idRapport;
        $this->date = $date;
        $this->contenu = $contenu;
        $this->auteur = $auteur;
        $this->destinataire = $destinataire;
    }

    // Getter methods
    public function getIdTapport(): int
    {
        return $this->idRapport;
    }
    
    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function getAuteur(): Utilisateur
    {
        return $this->auteur;
    }

    public function getDestinataire(): Utilisateur
    {
        return $this->destinataire;
    }

    public function ajouterDestinataire(Utilisateur $destinataire): void
    {
        // TODO implement here
    }

    public function supprimerDestinataire(Utilisateur $destinataire): void
    {
        // TODO implement here
    }
}
?>
