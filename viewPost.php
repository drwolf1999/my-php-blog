<?php
require ("include/db_info.php");
require ("include/utility.function.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method != 'GET') {
    $error_msg = "REQUEST_METHOD forbidden";
    echo $error_msg;
    exit(0);
}

$id = $_GET['id'];

$sql = "SELECT `title`, `content`, `writeDate` FROM `post` WHERE `postId` = ?";
$result = pdo_query($sql, $id)[0];

$title = $result['title'];
$content = $result['content'];
$date = dateToString($result['writeDate']);

require ("View/viewPost.php");