<?php

declare(strict_types=1);


class Entraineur extends Utilisateur
{

    /** @var string */
    private string $specialite;

    /** @var string */
    private string $niveauQualification;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param Date $date 
     * @param Heure $heure 
     * @param string $lieu 
     * @return void
     */
    public function planifierSceanceEntrainement(Date $date, Heure $heure, string $lieu): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param [object Object] $membre 
     * @return Evaluation
     */
    public function evaluerMembre([object Object] $membre): Evaluation
    {
        // TODO implement here
        return null;
    }

}
