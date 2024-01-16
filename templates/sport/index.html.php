

<h2> Les sports </h2>

<?php foreach ($sports as $sport): ?>

<div class="container form-control">
    <h4><?= $sport->getName(); ?></h4>
    <h5><?= $sport->getAccessory(); ?></h5>
    <a href="?type=sport&action=show&id=<?= $sport->getId() ?>">Show</a>
    <a href="?type=sport&action=delete&id=<?= $sport->getId() ?>">Delete</a>
    <a href="?type=sport&action=edit&id=<?= $sport->getId() ?>">edit</a>

</div>



<?php endforeach; ?>

<a href="?type=sport&action=insert">Create</a>
