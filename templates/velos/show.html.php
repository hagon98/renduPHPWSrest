<hr>
<h2><?= $velo->getName() ?></h2>
<h3><?= $velo->getDescription() ?></h3>
<h3><strong>Prix : <?= $velo->getPrice() ?>€</strong></h3>
<img src="image/<?= $velo->getImage() ?>" alt="" width="200px">
<?php if (\Models\User::getUser() == $velo->getAuthor()) { ?>
    <form action="?type=velo&action=delete" method="post">
        <button type="submit" name="id" value="<?= $velo->getId() ?>" class="btn btn-primary">Supprimer ce vélo</button>
    </form>
    <a href="?type=velo&action=edit&id=<?= $velo->getId() ?>" class="btn btn-warning">Modifier</a>
<?php } ?>
<a href="?type=velo&action=index" class="btn btn-secondary">Retour aux velos</a>
<hr>

<hr>
<?php if (\Models\User::getUser()) { ?>
    <form action="?type=avi&action=new" method="post">


        <div class="form-group">
            <input type="text" placeholder="votre avis" name="content" id="">
        </div>
        <div class="form-group">
            <input type="hidden" name="veloId" value="<?= $velo->getId() ?>">
        </div>
        <div class="form-group">

            <button class="btn btn-success" type="submit">Poster</button>
        </div>
    </form>

<?php } else { ?>

    <h2>Connectez vous pour commenter </h2>
    <a href="?type=user&action=signin" class="btn btn-primary">sign in</a>

<?php } ?>

<hr>

<?php foreach ($velo->getAvis() as $avis) { ?>

    <hr>
    <p>Author : <?= $avis->getAuthor()->getDisplayName() ?></p>

    <p><?= $avis->getContent() ?></p>



    <form action="?type=avi&action=delete" method="post">
        <button name="id" value="<?= $avis->getId() ?>" class="btn btn-danger" type="submit">Supprimer</button>
    </form>

    <a href="?type=avi&action=edit&id=<?= $avis->getId() ?>" class="btn bt-warning">Modifier</a>



    <hr>


<?php } ?>