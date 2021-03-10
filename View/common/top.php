<?php /*error_reporting(E_ALL);
ini_set('display_errors', 'on');*/?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="/View/common/base.css">
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>

    <!-- Include stylesheet -->
    <!-- Quill Editor -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <title>
    <?php if(isset($title)) {
        echo $title;
    } else {
        echo "블로그";
    } ?>
    </title>
</head>
<body>
<?php require ("nav.php"); ?>