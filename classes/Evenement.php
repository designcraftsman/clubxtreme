<?php

declare(strict_types=1);


class Evenement
{

    /** @var string */
    private string $nom;

    /** @var Date */
    private Date $date;

    /** @var string */
    private string $lieu;

    /** @var string */
    private string $description;

    /** @var List<Membre> */
    private List<Membre> $participants;

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
    public function ajouterParticipant([object Object] $membre): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param [object Object] $membre 
     * @return void
     */
    public function supprimerParticipant([object Object] $membre): void
    {
        // TODO implement here
        return null;
    }

}
