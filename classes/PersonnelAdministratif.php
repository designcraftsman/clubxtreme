<?php

declare(strict_types=1);


class PersonnelAdministratif extends Utilisateur
{

    /** @var String */
    private String $fonction;

    /** @var Date */
    private Date $dateEmbauche;

    /** @var double */
    private double $salaire;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param String $nouvelleFonction 
     * @return void
     */
    public function modifierFonction(String $nouvelleFonction): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param [object Object] $membre 
     * @return void
     */
    public function ajoutermembre([object Object] $membre): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param [object Object] $membre 
     * @return void
     */
    public function supprimerMembre([object Object] $membre): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param Transaction $transaction 
     * @return bool
     */
    public function EnregistrerTransaction(Transaction $transaction): bool
    {
        // TODO implement here
        return false;
    }

}
