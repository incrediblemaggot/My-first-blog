<?php
    
    /**
     *
     * Page html pivot
     *
     * la valuer de la clé p permet la redirection vers les autres pages.
     */
    
    
     require '../class/Autoloader.php';
     
     JBoulay_blog\Autoloader::register();
    
     if (isset($_GET['p'])){
         $p = $_GET['p'];
     } else {
         $p = 'home';
     }
     
     
     $db = new \JBoulay_blog\Database('test_blog');
     
     ob_start();
     
     if ($p === 'home'){
         require '../pages/home.php';
     } elseif ($p === 'article'){
         require '../pages/single.php';
     } elseif ($p === 'contact'){
         require '../pages/contact.php';
     } elseif ($p === 'register'){
         require '../pages/register.php';
     } elseif ($p === 'login'){
         require '../pages/login.php';
     } elseif ($p === 'account'){
         require '../pages/account.php';
     } elseif ($p === 'logout'){
         require '../pages/logout.php';
     }
    
    
    /**
     * la variable content est le contenu de la page. Cette variable est à retrouver dans le dossier template
     * fichier default.
     */
     
     $content = ob_get_clean();
     require '../pages/template/default.php';

     
     