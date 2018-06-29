<?php
    /**
     * Created by PhpStorm.
     * User: dl
     * Date: 26/06/2018
     * Time: 15:23
     *
     * Tout ce qui attrait à la session ce trouve ici.
     * L'initialisation, les messages flash.
     *
     */
    
    namespace JBoulay_blog;
    
    
    class Session
    {
        
        static $instance;
    
    
        public function __construct()
        {
            session_start();
        }
        
        static function getInstance()
        {
            if (!self::$instance) {
                self::$instance = new Session();
            }
            
            return self::$instance;
        }

        
        public function setFlash($key, $msg)
        {
            $_SESSION['flash'][$key] = $msg;
            
        }
        
        public function hasFlashes()
        {
            return isset($_SESSION['flash']);
        }
        
        public function getFlashes()
        {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $flash;
        }
        
        public function write($key, $value)
        {
            $_SESSION[$key] = $value;
        }
        
        public function read($key)
        {
            return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
        }
        
        
    }