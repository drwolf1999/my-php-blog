<?php require ("common/top.php"); ?>

<div class="container is-widescreen">
    <?php require("common/category_select.php"); ?>
<?php
if (isset($posts)) {
    foreach ($posts as $p) {
?>
        <div class="box">
            <article class="media">
                <div class="media-left">
                    <figure class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                    </figure>
                </div>
                <div class="media-content">
                    <div class="content">
                        <a href="/viewPost.php?id=<?= $p['postId'] ?>" class="has-text-black"><strong><?= $p['title'] ?></strong></a>
                        <br/>
                        <div class="overflow-hidden">
                            <?= $p['content'] ?>
                        </div>
                    </div>
                    <nav class="level is-mobile">
                        <div class="level-left">
                            <a class="level-item">
                                <span class="icon is-small">
                                    <i class="far fa-clock" aria-hidden="true"></i>
                                </span>
                                <span>&nbsp;<?= $p['time'] ?></span>
                            </a>
                        </div>
                    </nav>
                </div>
            </article>
        </div>
<?php
    }
}
?>
</div>

<?php require ("common/script.php") ?>
<script>
    $(document).ready(function () {
        $('select#category').on('change', function() {
            let selectedCategory = $('select#category').val();
            let address = `/posts.php`;
            if (selectedCategory !== null && selectedCategory !== '') {
                address += `?category=${selectedCategory}`;
            }
            location.href = address;
        });
    });
</script>
<?php require ("common/bottom.php"); ?>