<form action="?type=sport&action=edit" method="post">

    <input class="form-control"  type="text" name="name" value="<?= $sport->getName(); ?>">


    <input class="form-control"  type="text" name="accessory" value="<?= $sport->getAccessory(); ?>">

    <input type="hidden" name="idEdit" value="<?= $sport->getId() ?>">

    <button class="btn btn-success">Edit</button>
    <a href="?type=sport&action=index" class="btn btn-primary">Retour</a>

</form>
