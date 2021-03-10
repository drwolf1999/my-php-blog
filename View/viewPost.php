<?php require ("common/top.php"); ?>
<style>
    .reply-comment {
        padding-left: 100px;
    }
</style>
<?php
if (!isset($post)) {
    die ("error");
}
?>

<div class="container">
    <section class="hero is-medium has-text-centered set-background">
        <div class="hero-body blur-background">
            <div class="container">
                <h1 class="title has-text-white"><?= $post['title'] ?></h1>
                <h2 class="subtitle has-text-white"><?= $post['date'] ?></h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="level">
            <div class="level-left"></div>
            <div class="level-right">
                <a class="level-item" href="/writePost.php?id=<?= $post['id'] ?>">[ 수정 ]</a>
            </div>
        </div>
        <div class="container">
            <?= $post['content'] ?>
        </div>
    </section>
    <div id="post-comments"></div>
    <article class="media">
        <div class="media-left">
            <div class="field columns">
                <label class="label column is-one-quarter" for="username">이름</label>
                <div class="control column">
                    <input class="input is-small" type="text" placeholder="your fucking name" id="username">
                </div>
            </div>
            <div class="field columns">
                <label class="label column is-one-quarter" for="password">비밀 번호</label>
                <div class="control column">
                    <input class="input is-small" type="password" placeholder="your fucking password" id="password">
                </div>
            </div>
        </div>
        <div class="media-content">
            <label class="label" for="body">내용</label>
            <textarea class="textarea is-small" id="body"></textarea>
            <div class="field">
                <p class="control">
                    <button class="button" onclick="addComment(null)">댓글 달기(구현 중...)</button>
                </p>
            </div>
        </div>
    </article>
</div>

<?php require ("common/script.php") ?>

<script>
    function deleteComment(commentId) {
        $.ajax({
            url: '/ajax/deleteComment.php',
            type: 'POST',
            data: {
                'commentId': commentId
            },
            success: function (data) {
                loadComment();
            },
            error: function (error) {
                console.log(error);
            }
        })
    }

    function reply(commentId) {
        $('.reply-template').remove();
        let template = `
        <article class="media reply-template reply-comment">
            <div class="media-left">
                <div class="field columns">
                    <label class="label column is-one-quarter" for="${commentId}-username">이름</label>
                    <div class="control column">
                        <input class="input is-small" type="text" placeholder="your fucking name" id="${commentId}-username">
                    </div>
                </div>
                <div class="field columns">
                    <label class="label column is-one-quarter" for="${commentId}-password">비밀 번호</label>
                    <div class="control column">
                        <input class="input is-small" type="password" placeholder="your fucking password" id="${commentId}-password">
                    </div>
                </div>
            </div>
            <div class="media-content">
                <label class="label" for="${commentId}-body">내용</label>
                <textarea class="textarea is-small" id="${commentId}-body"></textarea>
                <div class="field">
                    <p class="control">
                        <button class="button" onclick="addComment(${commentId})">댓글 달기(구현 중...)</button>
                    </p>
                </div>
            </div>
        </article>
        `;
        $('#content-' + commentId).append(template);
    }

    function addComment(id) {
        let parentComment = id;
        if (id === null) id = '';
        else id = id + '-';
        let postId = <?= $post['id'] ?>;
        let username = $('#' + id + 'username').val();
        let password = $('#' + id + 'password').val();
        let body = $('#' + id + 'body').val();
        $.ajax({
            url: '/ajax/doWriteComment.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'postId': postId,
                'username': username,
                'password': password,
                'body': body,
                'parentComment': parentComment,
            },
            success: function (data) {
                console.log('success');
                loadComment();
            },
            error: function (error) {
                console.log(error);
            }
        })
    }

    function loadComment() {
        $.ajax({
            url: '/ajax/getComment.php',
            type: 'GET',
            data: {
                'postId': <?= $post['id'] ?>
            },
            success: function (data) {
                $('#post-comments').html(data);
            },
            error: function () {
                //
            }
        });
    }

    loadComment();
</script>

<?php require ("common/bottom.php"); ?>