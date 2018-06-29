<?php
    
    $db = JBoulay_blog\App::getDatabase();
    $auth = JBoulay_blog\App::getAuth();
    
    
    if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $user = $auth->login($db, $_POST['username'], $_POST['password']);
        $session = JBoulay_blog\Session::getInstance();
        if ($user) {
            
            $session->setFlash('success', 'You are now connected.');
            \JBoulay_blog\App::redirect('http://serverjboulay/blog/public/index.php?p=account');

            exit();
        } else {
            $session->setFlash('danger' , 'Password or email incorrect');
        }
    }


?>


<h1 xmlns="http://www.w3.org/1999/html">Login Page</h1>


<form action="" method="post">
    
    <div class="form-group">
        
        <label for="">Pseudo or email</label>
        <input type="text" name="username" class="form-control" required">
    
    </div>
    
    
    <div class="form-group">
        
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" required>
    
    </div>
    
    <div class="form-group">
        <label>
    
            <input type="checkbox" name="remember" value="1"> Remember me
        </label>
    
    </div>
    
    
    <button type="submit" class="btn btn-primary">Connect me</button>


</form>