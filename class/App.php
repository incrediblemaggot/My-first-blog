<?php
    /**
     * Created by PhpStorm.
     * User: dl
     * Date: 26/06/2018
     * Time: 14:07
     */
    
    namespace JBoulay_blog;
    
    class App
    {
        static $db = null;
        
        static function getDatabase()
        {
            if (!self::$db) {
                self::$db = new Database('test_blog');
            }
            return self::$db;
        }
        
        static function redirect($path)
        {
            header("Location: $path");
            exit();
         
        }
        
        static function getAuth(){
            return new Auth(Session::getInstance());
        }
    }