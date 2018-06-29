<?php
    /**
     * Created by PhpStorm.
     * User: dl
     * Date: 22/06/2018
     * Time: 12:25
     *
     * Connexion à la database
     */
    
    
    namespace JBoulay_blog;
    
    use \PDO;
    
    class Database
    {
        private $db_name;
        private $db_user;
        private $db_pass;
        private $db_host;
        protected $pdo;
        
        public function __construct($db_name, $db_user = 'julien_test', $db_pass = 'root', $db_host = 'localhost')
        {
            $this->db_name = $db_name;
            $this->db_user = $db_user;
            $this->db_pass = $db_pass;
            $this->db_host = $db_host;
            
        }
        
        
        protected function getPDO()
        {
            
            if ($this->pdo === null) {
                $pdo = new PDO('mysql:dbname=test_blog;host=localhost', 'julien_test', 'root');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $this->pdo = $pdo;
            }
            
            return $this->pdo;
        }
        
        public function query($statement, $class_name)
        {
            $req = $this->getPDO()->query($statement);
            $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
            
            return $datas;
            
        }
        
        public function query_db($query, $params = false)
        {
            $req = $this->getPDO();
            
            if ($params) {
                $req = $this->pdo->prepare($query);
                $req->execute($params);
            } else {
                $req = $this->pdo->query($query);
            }
            
            return $req;
        }
        
        
        public function lastInsertId()
        {
            return $this->pdo->lastInsertId();
        }
        
        
        public function prepare($statement, $attributes, $class_name, $one = false)
        {
            $req = $this->getPDO()->prepare($statement);
            $req->execute($attributes);
            
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
            
            if ($one) {
                $datas = $req->fetch();
                
            } else {
                
                $datas = $req->fetchAll();
            }
            
            
            return $datas;
        }
    }