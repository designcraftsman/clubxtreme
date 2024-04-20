<?php

declare(strict_types=1);


class Rapport
{

    /** @var Date */
    private Date $date;

    /** @var string */
    private string $contenu;

    /** @var [object Object] */
    private Utilisateur $auteur;

    /** @var List<Utilisateur> */
    private List<Utilisateur> $destinataire;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param [object Object] $destinataire 
     * @return void
     */
    public function ajouterDestinataire([object Object] $destinataire): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param [object Object] $destinataire 
     * @return void
     */
    public function supprimerDestinataire([object Object] $destinataire): void
    {
        // TODO implement here
        return null;
    }

}
