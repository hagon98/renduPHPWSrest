<form action="?type=avi&action=edit" method="post">
    <div class="form-group">
        <input type="text" placeholder="votre nom" name="author" value="<?= $avi->getAuthor() ?>" id="">
    </div>
    <div class="form-group">
        <input type="text" placeholder="votre avis" name="content" value="<?= $avi->getContent() ?>" id="">
    </div>
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $avi->getId() ?>">
    </div>
    <div class="form-group">

        <button class="btn btn-success" type="submit">Poster</button>
    </div>
</form>