<?php
    /**
     * Created by PhpStorm.
     * User: dl
     * Date: 26/06/2018
     * Time: 14:36
     *
     *
     * Méthode permettant de vérifier des paramètres
     */
    
    namespace JBoulay_blog;
    
    
    class Validator
    
    {
        
        private $data;
        private $errors = [];
        
        public function __construct($data)
        {
            $this->data = $data;
        }
        
        
        private function getField($field)
        {
            if (!isset($this->data[$field])) {
                return null;
            }
            return $this->data[$field];
        }
        
        public function isAlphanumeric($field, $errorMsg)
        {
            if (!preg_match('/^[a-zA-Z0-9_-]+$/', $this->getField($field))) {
                
                $this->errors[$field] = $errorMsg;
            }
        }
        
        public function isUnique($field, $db, $table, $errorMsg)
        {
            $record = $db->query_db("SELECT id FROM $table WHERE $field = ?", [$this->getField($field)])->fetch();
            
            if ($record) {
                $this->errors[$field] = $errorMsg;
            }
        }
        
        public function isEmail($field, $errorMsg)
        {
            if (!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
                $this->errors[$field] = $errorMsg;
            }
        }
        
        public function isConfirmed($field, $errorMsg)
        {
            $value = $this->getField($field);
    
            if (empty($value) || $value != $this->getField($field . '-confirm')) {
                
                $this->errors[$field] = $errorMsg;
                
            }
        }
        
        
        public function isValid(){
            return empty($this->errors);
        }
    
        public function getErrors()
        {
            return $this->errors;
        }
    }