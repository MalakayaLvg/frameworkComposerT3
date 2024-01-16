
<div class="container form-control">
    <h2><?= $sport->getName(); ?></h2>
    <h4> Accessory : <?= $sport->getAccessory(); ?></h4>

</div>

<div class="form-control mt-3 mb-5">
<h3>Les clubs</h3>
<?php foreach($sport->getClubs() as $club): ?>

    <div><strong><?= $club->getName() ?></strong></div>

    <a href="?type=club&action=delete&id=<?= $club->getId() ?>">Supprimer</a>
    <a href="?type=club&action=edit&id=<?= $club->getId() ?>">edit</a>

    <input type="hidden" name="idSport" value="<?= $sport->getId() ?>">


<?php endforeach; ?>
</div>

<div class="container form-control">
    <h3>Create a new clubs</h3>
    <form action="?type=club&action=insert" method="post" class="input-group">
        <input type="text" name="name" placeholder="club name">
        <input type="hidden" name="sport_id" value="<?= $sport->getId() ?>">
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>


