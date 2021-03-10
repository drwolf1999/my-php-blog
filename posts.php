<?php
require_once ("include/db_info.php");
require_once ("include/utility.function.php");

// CATEGORIES
require_once ("Controller/category.php");
$categories = getCategory();

// POSTS
$posts = array();

$sql = "SELECT `title`, `content`, `postId`, `writeDate` FROM `post`";

$selectedCategory = null;
if (isset($_GET['category'])) {
    try {
        $selectedCategory = intval($_GET['category']);
    } catch (Exception $e) {
        require ("View/error.php");
    }
    $sql .= " WHERE `categoryId` = ".$selectedCategory;
}

$page = 1;
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
}
$page -= 1;
$sql .= " ORDER BY `categoryId` ASC LIMIT ".($page * 5).", 5";


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