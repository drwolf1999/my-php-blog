<?php
require_once ("Controller/post.php");
require_once ("Controller/category.php");
$categories = getCategory();

// POSTS
$page = 1;
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
}

$selectedCategory = null;
if (isset($_GET['category'])) {
    try {
        $selectedCategory = intval($_GET['category']);
    } catch (Exception $e) {
        require ("View/error.php");
    }
}
$onePage = 4;

$result = getPosts($selectedCategory, $page - 1, $onePage);

$posts = array();
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

$pagination = getPagination($page, getPostSize($selectedCategory), $onePage);

require ("View/posts.php");