<?php
    /**
     * Created by PhpStorm.
     * User: dl
     * Date: 22/06/2018
     * Time: 16:33
     */
    
    $post = $db->prepare('SELECT * FROM Articles WHERE id= ?', [$_GET['id']], 'JBoulay_blog\table\Article', true);
    
    ?>

<h1><?= $post->title ?></h1>

<p><?= $post->content ?></p>