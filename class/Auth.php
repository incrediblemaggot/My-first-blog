<?php
    /**
     * Created by PhpStorm.
     * User: dl
     * Date: 26/06/2018
     * Time: 15:10
     *
     * Classe permettant l'authentification.
     *
     */
    
    namespace JBoulay_blog;
    
    class Auth
    {
        
        private $session;
        
        public function __construct($session)
        {
            $this->session = $session;
        }
        
        public function register($db, $username, $password, $email)
        {
            
            
            $password = password_hash($password, PASSWORD_BCRYPT);
            $token = Str::random(60);
            
            $db->query_db("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?", [
                $username,
                $password,
                $email,
                $token
            ]);
            
            $user_id = $db->lastInsertId();
            
            mail($email, 'You are in! Welcome!', "Please confirm your email (click on the link below) \n\n http://serverjboulay/blog/public/confirm.php?id=$user_id&token=$token");
            
        }
        
        public function confirm($db, $user_id, $token)
        {
            $user = $db->query_db('SELECT * FROM users WHERE id = ?', [$user_id])->fetch();
    
            /**
             * penser vérification mail et token.
             */
            
            if ($user && $user->confirmation_token == $token) {
                
                $db->query_db('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id= ?', [$user_id]);
                
                $this->session->write('auth', $user);
                return true;
                
            }
            
            return false;
        }
        
        public function restrict()
        {
            
            if (!$this->session->read('auth')) {
                $this->session->setFlash('danger', 'You are not allowed to be here');
                header('Location: http://serverjboulay/blog/public/index.php?p=login');
                
            }
        }
        
        public function connect($user)
        {
            $this->session->write('auth', $user);
        }
        
        public function login($db, $username, $password)
        {
            
            $user = $db->query_db("SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed_at IS NOT NULL", ['username' => $username])->fetch();
            
            if (password_verify($password, $user->password)) {
                $this->connect($user);
                
                return $user;
                
            } else {
                return false;
            }

        }
    }