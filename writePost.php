<?php

require_once ("Controller/category.php");
require_once ("Controller/post.php");

$categories = getCategory();

if (isset($_GET['id'])) {
    $post = getPost($_GET['id']);
}

require ("View/writePost.php");