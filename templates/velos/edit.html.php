<form action="?type=velo&action=edit" method="post" enctype="multipart/form-data">


    <input type="text" name="name" value="<?= $velo->getName() ?>">
    <input type="file" | name="image" value="<?= $velo->getImage() ?>">
    <input type="text" name="description" value="<?= $velo->getdescription() ?>">
    <input type="text" name="price" value="<?= $velo->getPrice() ?>">

    <button type="submit" name="idEdit" value="<?= $velo->getId() ?>" class="btn btn-success">Enregistrer Les modifications</button>
</form>