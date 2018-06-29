<h1>Welcome on my blog</h1>

<h2>Here my posts about Star Wars</h2>
<p><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Star_Wars_Logo.svg/220px-Star_Wars_Logo.svg.png"></p>


<?php
    
    $session = JBoulay_blog\Session::getInstance();
    
    foreach ($db->query('SELECT * FROM Articles', 'JBoulay_blog\table\Article') as $post): ?>
    
    <article>
        <h2><a href="<?=$post->url ?>"> <?= $post->title; ?></a></h2>
        <p>Published the <span style="color: blue"><?= $post->date ?></span></p>
        
        <p><?= $post->extract; ?> </p>
    </article>

<?php endforeach; ?>