<?php
declare(strict_types=1);

class SceanceEntrainement
{
    private int $idSceanceEntraienemnt;
    private DateTime $date;
    private string $lieu;
    private string $exercices;
    private Entraineur $entraineur;

    public function __construct(int $idSceanceEntraienemnt, DateTime $date, string $lieu, Entraineur $entraineur, string $exercices)
    {
        $this->idSceanceEntraienemnt = $idSceanceEntraienemnt;
        $this->date = $date;
        $this->lieu = $lieu;
        $this->entraineur = $entraineur;
        $this->exercices = $exercices;
    }

    // Getter methods
    public function getId(): int
    {
        return $this->idSceanceEntraienemnt;
    }
    
    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getLieu(): string
    {
        return $this->lieu;
    }

    public function getExercices(): string
    {
        return $this->exercices;
    }

    public function getEntraineur(): Entraineur
    {
        return $this->entraineur;
    }

    // Setter methods
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function setLieu(string $lieu): void
    {
        $this->lieu = $lieu;
    }

    public function setExercices(string $exercices): void
    {
        $this->exercices = $exercices;
    }

    public function setEntraineur(Entraineur $entraineur): void
    {
        $this->entraineur = $entraineur;
    }
}
?>

