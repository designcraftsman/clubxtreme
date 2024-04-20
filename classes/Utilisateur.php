<?php

declare(strict_types=1);


class Utilisateur
{

    /** @var string */
    protected string $nom;

    /** @var string */
    protected string $prenom;

    /** @var string */
    protected string $email;

    /** @var string */
    protected string $motDePasse;

    /** @var Date */
    protected Date $dateDeNaissance;

    /** @var string */
    protected string $numDeTelephone;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param string $email 
     * @param string $motDePasse 
     * @return boolean
     */
    public function seConnecter(string $email, string $motDePasse): boolean
    {
        // TODO implement here
        return false;
    }

    /**
     * @return boolean
     */
    public function sDeConnecter(): boolean
    {
        // TODO implement here
        return false;
    }

}
