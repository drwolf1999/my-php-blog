<?php require ("common/top.php"); ?>

<?php require ("common/script.php") ?>

<div class="container">
    <?php if (isset($post)) { ?>
    <input hidden type="text" id="id" value="<?= $post['id'] ?>"/>
    <?php } ?>
    <div class="field is-four-fifths">
        <label class="label" for="title">제목</label>
        <div class="control">
            <input class="input" type="text" placeholder="title" id="title" value="<?= isset($post) ? $post['title'] : '' ?>">
        </div>
    </div>
    <div class="field is-four-fifths">
        <label class="label" for="category">분류</label>
        <div class="control">
            <?php $selectedCategory = isset($post) ? $post['category'] : null; ?>
            <?php require("common/category_select.php") ?>
        </div>
    </div>
    <div class="field is-four-fifths">
        <label class="label" for="contents">내용</label>
        <div class="control">
            <div id="contents"><?= isset($post) ? $post['content'] : '' ?></div>
        </div>
    </div>
    <div class="field buttons level">
        <div class="level-left"></div>
        <div class="level-right">
            <a class="button is-primary level-item" onclick="doPost()" href="javascript:void(0)">post</a>
        </div>
    </div>
</div>

<script>
    let quill = new Quill('#contents', {
        theme: 'snow',
        modules: {
            imageResize: {
                displaySize: true,
            },
            toolbar: [
                [{'header': [1, 2, 3, 4, 5, 6, false]}],
                ['bold', 'italic', 'underline', 'strike'],
                [{'color': []}, {'background': []}],
                [{'align': []}],
                ['link', 'image'],
                [{list: 'ordered'}, 'blockquote'],
                ['clean']
            ]
        }
    });

    function doPost() {
        let id_selector = $('input#id');
        let id = id_selector !== undefined && id_selector !== null ? id_selector.val() : null;
        let title = $('input#title').val();
        let category = $('select#category').val();
        let content = quill.root.innerHTML;
        if (title.length === 0 || content.length === 0) {
            alert('제목과 내용을 채워주세요');
            return;
        }
        let data = {
            'title': title,
            'content': content,
            'category': category,
        };
        if (id !== null) data['id'] = id;
        $.ajax({
            url: '/ajax/doWritePost.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                // TODO: 알림처리
                location.href = "/posts.php";
            },
            error: function (error) {
                alert('처리 중 문제가 발생하였습니다. 블로그 담당자에게 문의하세요');
            }
        });
    }
</script>

<?php require ("common/bottom.php"); ?>
