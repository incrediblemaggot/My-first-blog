<?php
    
    if (!empty($_POST)) {
        $errors = array();
        
        $db = JBoulay_blog\App::getDatabase();
        
        $validator = new JBoulay_blog\Validator($_POST);
        
        $validator->isAlphanumeric('username', 'Your pseudo is not valid.');
        
        if ($validator->isValid()) {
            $validator->isUnique('username', $db, 'users', 'This pseudo already exists.');
        }
        
        
        $validator->isEmail('email', 'Please enter a valid email.');
        
        if ($validator->isValid()){
            $validator->isUnique('email', $db, 'users', 'This email already exists.');
    
        }
        $validator->isConfirmed('password', 'Please enter a valid password.');
        
        
        if ($validator->isValid()) {
            
            JBoulay_blog\App::getAuth()->register($db, $_POST['username'], $_POST['password'], $_POST['email']);
            
            JBoulay_blog\Session::getInstance()->setFlash('success', 'A confirmation email was sent to you. Check your mail box.');
            
            JBoulay_blog\App::redirect('http://serverjboulay/blog/public/index.php?p=login');
            
        } else {
            $errors = $validator->getErrors();
        }
        
    }


?>


<h1>Registration</h1>


<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <p>You have not complete correctly the form</p>
        
        <?php foreach ($errors as $error): ?>
            <ul>
                <li><?= $error; ?></li>
            
            </ul>
        
        
        <?php endforeach; ?>
    
    </div>


<?php endif; ?>

<form action="" method="post">
    
    <div class="form-group">
        
        <label for="">Pseudo</label>
        <input type="text" name="username" class="form-control" required">
    
    </div>
    
    
    <div class="form-group">
        
        <label for="">Email</label>
        <input type="email" name="email" class="form-control" required>
    
    </div>
    
    <div class="form-group">
        
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" required>
    
    </div>
    
    <div class="form-group">
        
        <label for="">Confirm your password</label>
        <input type="password" name="password-confirm" class="form-control" required>
    
    </div>
    
    
    <button type="submit" class="btn btn-primary">Register me</button>


</form>

