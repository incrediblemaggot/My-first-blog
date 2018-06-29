<?php
    $session = JBoulay_blog\Session::getInstance();
    unset($_SESSION['auth']);
    
    $session->setFlash('success', 'You are now disconnected');
    JBoulay_blog\App::redirect('http://serverjboulay/blog/public/index.php?p=home');
    exit();
