<?php

declare(strict_types=1);


class SceanceEntrainement
{

    /** @var Date */
    private Date $date;

    /** @var Heure */
    private Heure $heure;

    /** @var String */
    private String $lieu;

    /** @var List<Exercice> */
    private List<Exercice> $exercices;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param Exercice $exercice 
     * @return void
     */
    public function ajouterExercice(Exercice $exercice): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param Exercice $exercice 
     * @return void
     */
    public function supprimerExercice(Exercice $exercice): void
    {
        // TODO implement here
        return null;
    }

}
