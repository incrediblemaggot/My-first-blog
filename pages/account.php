<?php
    
    /**
     *Page du compte une fois logué.
     *
     * Formulaire permettant l'ajout d'un article sur la page home du blog.
     *
     *
     */
    
    
    \JBoulay_blog\App::getAuth()->restrict();
    
    
    if (!empty($_POST)) {
        $errors = array();
        $db = JBoulay_blog\App::getDatabase();
        $session = JBoulay_blog\Session::getInstance();
        
        if (empty($_POST['title'])) {
            
            $errors['title'] = 'Please enter a title of your article';
        } else {
            $db->query_db("SELECT title FROM Articles", [$_POST['title']])->fetch();
            
        }
        
        if (empty($_POST['text-article'])) {
            $errors['text-article'] = 'Please enter your text';
        } else {
            $db->query_db("SELECT content FROM Articles", [$_POST['text-article']])->fetch();
        }
        
        if (empty($errors)) {
            
            $db->query_db('INSERT INTO Articles SET title = ?, content = ?, date = NOW()', [$_POST['title'], $_POST['text-article']]);
            
            $session->setFlash('success', 'Your article is now online');
            \JBoulay_blog\App::redirect('http://serverjboulay/blog/public/index.php?p=account');
            exit();
            
        }
        
    }

?>


<!- Formulaire permettant d'ajouter un article sur le blog (en page Home).
Affichage du username et de son email.
->


<h1 style="color: blue">Hello <?= $_SESSION['auth']->username; ?></h1>


<p>Your name: <?= $_SESSION['auth']->username; ?></p>
<p>Your mail: <?= $_SESSION['auth']->email; ?></p>


<form action="" method="post">
    
    <div class="form-group">
        
        <label for="">Title</label>
        <input type="text" name="title" class="form-control" required">
    
    </div>
    
    
    <div class="form-group">
        
        <label for="">Your text</label>
        <textarea type="text" name="text-article" class="form-control" required style="height: 200px"></textarea>
    
    </div>
    
    
    <button type="submit" class="btn btn-primary">Post on the website</button>

</form>



