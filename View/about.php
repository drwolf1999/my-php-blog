<?php require_once ("common/top.php"); ?>

<?php
if (!isset($skill) || !is_array($skill)) {
    exit(0);
}
?>

<div class="title is-ancestor">
    <div class="tile is-four-fifths is-parent">
        <article class="content tile notification is-child has-background-primary-light">
            <strong>기술 스펙</strong>
            <ul>
            <?php foreach ($skill as $s) { ?>
                <li class="is-size-5"><?= $s ?></li>
            <?php } ?>
            </ul>
        </article>
    </div>
</div>

<?php require_once ("common/script.php"); ?>
<?php require_once ("common/bottom.php"); ?>