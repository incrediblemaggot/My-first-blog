<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../public/img/favicon.ico">
    
    <title>Le blog de Julien</title>
    
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="text-center">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Blog of Julien</h3>
            <nav class="nav nav-masthead justify-content-center">
                
                <a class="nav-link active" href="index.php?p=home">Home</a>
                <a class="nav-link" href="index.php?p=contact">Contact</a>
                
                <?php if (isset($_SESSION['auth'])): ?>
                    <a class="nav-link" href="index.php?p=account">Your account</a>
                    <a class="nav-link" href="index.php?p=logout">LogOut</a>
                
                <?php else: ?>
                    <a class="nav-link" href="index.php?p=register">Registration</a>
                    <a class="nav-link" href="index.php?p=login">Login</a>
                <?php endif; ?>
                
                <a class="nav-link" href="../../../index.html">HomePage server</a>
            </nav>
        </div>
        
        
        <?php if (JBoulay_blog\Session::getInstance()->hasFlashes()) : ?>
            
            <?php foreach (\JBoulay_blog\Session::getInstance()->getFlashes() as $type => $message) : ?>
                
                <div class="alert alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
            
            <?php endforeach; ?>
        <?php endif; ?>
    
    </header>
    
    <main role="main" class="inner cover">
        
        <?= $content; ?>
    
    </main>
    
    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Copyright J. Boulay <a href="https://twitter.com/IncrediblMaggot">my Twitter</a>.</p>
        </div>
    </footer>
</div>

</body>
</html>

