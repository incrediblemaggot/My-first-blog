<?php
    /**
     * Created by PhpStorm.
     * User: dl
     * Date: 22/06/2018
     * Time: 15:45
     */
    
    namespace JBoulay_blog\table;
    
    class Article {
        
        public function __get($key){
        
            $method = 'get' . ucfirst($key);
            
            $this->$key = $this->$method();
            return $this->$key;
        }
    
        
        public function getUrl(){
            return 'index.php?p=article&id=' . $this->id;
        }
        
        public function getDate(){
            return $this->date;
        }
        
        
        public function getExtract()
        {
            $html = '<p>' . substr($this->content, 0, 500) . '...</p>';
            $html .= '<p><a href="'. $this->getUrl() . ' ">See more</a></p>';
            return $html;
        }
    }