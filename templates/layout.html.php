<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar nav-expand-lg navbar-light bg-dark mb-5">
        <a href="/hb/PHP-intro/examemPhp" class="navbar-brand">Magasin de vélo</a>
        <ul class="d-flex nav nav-pills">
            <?php if (isset($_SESSION['user'])) { ?>

                <li class="nav-item"><a href="/" class="btn btn-warning"><?= $_SESSION['user']['displayName'] ?></a></li>
            <?php } ?>
            <li class="nav-item"><a href="?type=velo&action=index" class="btn btn-primary">Accès à l'examen</a></li>
            <li class="nav-item"><a href="?type=user&action=signUp" class="btn btn-primary">s'inscrire</a></li>
            <li class="nav-item"><a href="?type=user&action=signIn" class="btn btn-primary">Se connecter</a></li>
            <li class="nav-item"><a href="?type=user&action=signOut" class="btn btn-primary">Se déconnecter</a></li>
            <!-- <li class="nav-item"><a href="?type=infos&action=index" class="btn btn-primary">Nos informations</a></li> -->
        </ul>

    </nav>
    <div class="alert alert-warning alert-dismissible fade <?php if (isset($_GET['info'])) {
                                                                echo 'show';
                                                            } ?>" role="alert">
        <?= $_GET['info'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="container">
        <!--  -->
        <?= $pageContent ?>


    </div>





    <h1 class="mt-5">FIN DE PAGE</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>