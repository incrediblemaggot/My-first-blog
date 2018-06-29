<?php
    /**
     * Created by PhpStorm.
     * User: dl
     * Date: 22/06/2018
     * Time: 12:12
     *
     * Permet d'autoloader les classes sans faire de require
     */
    
    namespace JBoulay_blog;
    
    class Autoloader
    {
        
        static function register()
        {
            spl_autoload_register(array(__CLASS__, 'autoload'));
        }
        
        
        static function autoload($class)
        {
            if (strpos($class, __NAMESPACE__ . '\\') === 0) {
                $class = str_replace(__NAMESPACE__ . '\\', '', $class);
                $class = str_replace('\\', '/', $class);
                require __DIR__ . '/' . $class . '.php';
            }
        }
    }