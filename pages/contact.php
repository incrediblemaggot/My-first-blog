<?php

    $session = JBoulay_blog\Session::getInstance();


?>



<h1>Contact Me</h1>


<p>Julien Boulay - ju.boulay@gmail.com</p>




<form action="" method="post">
    
    <div class="form-group">
        
        <label for="">Your name</label>
        <input type="text" name="name" class="form-control" required">
    
    </div>
    
    
    <div class="form-group">
        
        <label for="">Your email</label>
        <input type="email" name="email" class="form-control" required>
    
    </div>
    
    <div class="form-group">
        
        <label for="">Object</label>
        <input type="text" name="object" class="form-control" required">
    
    </div>
    
    <div class="form-group">
        
        <label for="">Your message</label>
        <textarea type="text" name="text-message" class="form-control" required style="height: 200px"></textarea>
    
    </div>
    
    
    <button type="submit" class="btn btn-primary">Send</button>


</form>