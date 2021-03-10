<?php
require_once ("include/db_info.php");
require_once ("include/utility.function.php");

function getPost($id) {
    $sql = "SELECT `title`, `content`, `writeDate`, `categoryId`
            FROM `post`
            WHERE `postId` = ?";
    $result = pdo_query($sql, $id)[0];

    $title = $result['title'];
    $content = $result['content'];
    $date = dateToString($result['writeDate']);
    $category = $result['categoryId'];

    return array(
        'id' => $id,
        'title' => $title,
        'content' => $content,
        'date' => $date,
        'category' => $category
    );
}