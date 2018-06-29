<?php
    /**
     * Created by PhpStorm.
     * User: dl
     * Date: 25/06/2018
     * Time: 12:03
     *
     * Ensemble des fonctions utilisées
     *
     */

    
    
    /**Permet de vérifier si l'utilisateur à bien accès à son compte (via confirmation de son mail).*/
    
    function logged_only(){
    
    
        if (session_status() == PHP_SESSION_NONE){
        
            session_start();
        
        }
    
        if (!isset($_SESSION['auth'])){
            $_SESSION['flash']['danger'] = 'You are not allowed to be here';
            header('Location: http://serverjboulay/blog/public/index.php?p=login');
            
        }
    
    }