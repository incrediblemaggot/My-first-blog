<?php
    
    require '../class/Autoloader.php';
    \JBoulay_blog\Autoloader::register();
    
    $db = JBoulay_blog\App::getDatabase();
    
    
    if (JBoulay_blog\App::getAuth()->confirm($db, $_GET['id'], $_GET['token'])) {
        
        JBoulay_blog\Session::getInstance()->setFlash('success', 'Your account is now active. Thanks dude.');
        JBoulay_blog\App::redirect('http://serverjboulay/blog/public/index.php?p=account');
        
    } else {
        
        JBoulay_blog\Session::getInstance()->setFlash('danger', 'This token is invalid anymore');
        JBoulay_blog\App::redirect('http://serverjboulay/blog/public/index.php?p=login');
        
    }
    