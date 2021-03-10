<?php
require_once (__DIR__."/../include/db_info.php");
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

function getPosts($category, $page, $onePage) {

    $sql = "SELECT `title`, `content`, `postId`, `writeDate` FROM `post`";
    if ($category != null) {
        $sql .= " WHERE `categoryId` = ".$category;
    }
    $sql .= " ORDER BY `categoryId` ASC LIMIT ".($page * $onePage).", {$onePage}";

    return pdo_query($sql);
}

function getPostSize() {
    $sql = "SELECT COUNT(`postId`) AS c FROM `post`";

    $r = pdo_query($sql);

    return $r[0]['c'];
}