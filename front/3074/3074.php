<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

if (!class_exists('lessc')) {
    $dir_block = dirname($_SERVER['SCRIPT_FILENAME']);
    require_once($dir_block . '/libs/lessc.inc.php');
}
$less = new lessc;
$less->compileFile('less/3074.less', 'css/3074.css');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./css/3074.css" />
</head>

<body>

    <div class="type-3074">
        <div class="container">
            <h1 class="title">Get Your Repair Started</h1>
            <p class="subtitle">
                Explore new ways to see what's working and fix what's not. Vivamus sed
                finibus nulla. Suspendisse ac ex sed sem consequat pellentesque ain
                nulla.
            </p>
            <div class="row">
                <div class="card col-md-4">
                    <div class="type-3074">
                        <img class="img_blog" alt="Technicians working on a PC" height="200" src="./img/blog-1.jpg"
                            width="300" />
                        <h3 class="name_blog">PC &amp; MAC Computers</h3>
                        <p class="description"">
                            Fusce eu odio ac neque interdum volutpat. Sed vel pharetra quam.
                        </p>
                        <a class=" link_readmore" href=" #"> READ MORE </a>
                    </div>
                </div>
                <div class="card col-md-4">
                    <div class="type-3074">
                        <img class="img_blog" alt="Technicians working on a PC" height="200" src="./img/blog-2.jpg"
                            width="300" />
                        <h3 class="name_blog">PC &amp; MAC Computers</h3>
                        <p class="description"">
                            Fusce eu odio ac neque interdum volutpat. Sed vel pharetra quam.
                        </p>
                        <a class=" link_readmore" href=" #"> READ MORE </a>
                    </div>
                </div>
                <div class="card col-md-4">
                    <div class="type-3074">
                        <img class="img_blog" alt="Technicians working on a PC" height="200" src="./img/blog-8.jpg"
                            width="300" />
                        <h3 class="name_blog">PC &amp; MAC Computers</h3>
                        <p class="description"">
                            Fusce eu odio ac neque interdum volutpat. Sed vel pharetra quam.
                        </p>
                        <a class=" link_readmore" href=" #"> READ MORE </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>