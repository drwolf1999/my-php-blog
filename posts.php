<?php
require ("include/db_info.php");
require ("include/utility.function.php");

$posts = array();

$sql = "SELECT `title`, `content`, `postId`, `writeDate` FROM `post`";
$result = pdo_query($sql);

foreach ($result as $r) {
    $stripContent = $r['content'];
    $stripContent = preg_replace("/<img[^>]+\>/i", "[그림]&nbsp;", $stripContent);
    $stripContent = strip_tags($stripContent);
    array_push($posts, array(
            "postId" => $r['postId'],
            "title" => $r['title'],
            "content" => $stripContent,
            "time" => dateToString($r['writeDate'])
        ));
}

require ("View/posts.php");