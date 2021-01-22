<?php require ("common/top.php"); ?>

<div class="container">
    <section class="hero is-medium has-text-centered set-background">
        <div class="hero-body blur-background">
            <div class="container">
                <h1 class="title has-text-white"><?= isset($title) ? $title : '' ?></h1>
                <h2 class="subtitle has-text-white"><?= isset($date) ? $date : '' ?></h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <?= isset($content) ? $content : '' ?>
        </div>
    </section>
</div>

<?php require ("common/script.php") ?>
<?php require ("common/bottom.php"); ?>