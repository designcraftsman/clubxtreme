<?php

declare(strict_types=1);


class Membre extends Utilisateur
{

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param Evenement $evenement 
     * @return void
     */
    public function participerEvenement(Evenement $evenement): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param Evenement $evenement 
     * @return void
     */
    public function annulerParticipationEvenement(Evenement $evenement): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @return Evaluation
     */
    public function evaluerProgression(): Evaluation
    {
        // TODO implement here
        return null;
    }

}
