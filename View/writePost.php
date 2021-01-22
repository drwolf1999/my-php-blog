<?php require ("common/top.php"); ?>

<?php require ("common/script.php") ?>

<div class="container">
    <div class="field is-four-fifths">
        <label class="label" for="title">제목</label>
        <div class="control">
            <input class="input" type="text" placeholder="title" id="title">
        </div>
    </div>
    <div class="field is-four-fifths">
        <label class="label" for="contents">내용</label>
        <div class="control">
            <div id="contents"></div>
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
                ['clean']
            ]
        }
    });

    function doPost() {
        let title = $('input#title').val();
        let content = quill.root.innerHTML;
        if (title.length === 0 || content.length === 0) {
            alert('제목과 내용을 채워주세요');
            return;
        }
        $.ajax({
            url: 'doWritePost.php',
            type: 'POST',
            data: {
                'title': title,
                'content': content,
            },
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
