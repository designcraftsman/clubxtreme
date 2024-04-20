<?php

declare(strict_types=1);


class Transaction
{

    /** @var int */
    private int $id;

    /** @var float */
    private float $montant;

    public  $Attribute2;

    /** @var Date */
    private Date $date;

    /** @var string */
    private string $methode;

    /** @var string */
    private string $statut;

    /** @var string */
    public string $type;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param double $montant 
     * @param String $methodePaiement 
     * @return void
     */
    public function effectuerPaiememnt(double $montant, String $methodePaiement): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @return void
     */
    public function annulerPaiement(): void
    {
        // TODO implement here
        return null;
    }

}
