<?php
declare(strict_types=1);

class Transaction
{
    private int $id_transaction;
    private float $montant;
    public Membre $membre;
    private DateTime $date;
    private string $methode;
    private string $statut;
    public string $type;

    public function __construct(int $id_transaction, float $montant, Membre $membre, DateTime $date, string $methode, string $statut, string $type)
    {
        $this->id_transaction = $id_transaction;
        $this->montant = $montant;
        $this->membre = $membre;
        $this->date = $date;
        $this->methode = $methode;
        $this->statut = $statut;
        $this->type = $type;
    }

    // Getter methods
    public function getId_transaction(): int
    {
        return $this->id_transaction;
    }

    public function getMontant(): float
    {
        return $this->montant;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getMethode(): string
    {
        return $this->methode;
    }

    public function getMembre(): Membre
    {
        return $this->membre;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setMethode( string $methode): void
    {
        $this->methode =  $methode;
    }

    public function setMembre(Membre $membre): void
    {
        $this->membre = $membre;
    }

    public function setStatus(string $status): void
    {
        $this->statut = $status ;    
    }

    public function setType(string $type): void
    {
        $this->type = $type ;    
    }
    //-------------


    public function effectuerPaiememnt(float $montant, string $methodePaiement): void
    {
        // TODO implement here
    }

    public function annulerPaiement(): void
    {
        // TODO implement here
    }
}
?>
