<?php

declare(strict_types=1);


class Club
{

    /** @var string */
    private string $nom;

    /** @var string */
    public string $adresse;

    /** @var List<Membre> */
    private List<Membre> $membres;

    /** @var List<Evenement> */
    private List<Evenement> $evenements;

    /** @var List<Entraîneur> */
    private List<Entraîneur> $entraineurs;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param [object Object] $membre 
     * @return void
     */
    public function ajouterMembre([object Object] $membre): void
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
     * @param Evenement $evenement 
     * @return void
     */
    public function ajouterEvenement(Evenement $evenement): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param Evenement $evenement 
     * @return void
     */
    public function supprimerEvenement(Evenement $evenement): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param Entraîneur $entraineur 
     * @return void
     */
    public function ajouterEntraîneur(Entraîneur $entraineur): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param Entraîneur $entraineur 
     * @return void
     */
    public function supprimerEntraîneur(Entraîneur $entraineur): void
    {
        // TODO implement here
        return null;
    }

}
