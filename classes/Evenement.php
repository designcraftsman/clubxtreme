<?php
declare(strict_types=1);

class Evenement
{
    private int $idEvenement;
    private string $nom;
    private DateTime $date;
    private string $lieu;
    private string $description;
    private array $participants = array();

    public function __construct(int $idEvenement ,string $nom, DateTime $date, string $lieu, string $description , array $participants)
    {
        $this->idEvenement = $idEvenement;
        $this->nom = $nom;
        $this->date = $date;
        $this->lieu = $lieu;
        $this->description = $description;
        $this->participants = $participants;
    }

    // Getter functions
    public function getIdEvenement(): int
    {
        return $this->idEvenement;
    }
    
    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getLieu(): string
    {
        return $this->lieu;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getParticipants(): array
    {
        return $this->participants;
    }
    
    // Setter method for idEvenement
    public function setIdEvenement(int $newId): void
    {
        if($newId > 0) {
            $this->idEvenement = $newId;
        }
    }

    // Setter method for nom
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    // Setter method for date
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    // Setter method for lieu
    public function setLieu(string $lieu): void
    {
        $this->lieu = $lieu;
    }

    // Setter method for description
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    // Setter method for participants
    public function setParticipants(array $participants): void
    {
        $this->participants = $participants;
    }
    
    public function ajouterParticipant(Membre $membre): void
    {
        $this->participants[] = $membre;
    }

    public function supprimerParticipant(Membre $membre): bool
    {
        foreach ($this->participants as $key => $participant) {
            if ($participant === $membre) {
                unset($this->participants[$key]);
                return true;
            }
        }
        return false; // Participant not found
    }
}
?>
