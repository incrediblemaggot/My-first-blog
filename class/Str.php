<?php
    /**
     * Created by PhpStorm.
     * User: dl
     * Date: 26/06/2018
     * Time: 15:14
     *
     *
     * Classe permettant de générer des tokens pour la confirmation de l'email.
     *
     * ajout bib crypto ?
     * typer methode
     */
    
    namespace JBoulay_blog;
    
    
    class Str
    {
        static function random($length)
        {
            $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
            return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
        }
    }