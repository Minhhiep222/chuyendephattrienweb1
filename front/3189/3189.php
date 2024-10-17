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
$less->compileFile('less/3189.less', 'css/3189.css');
?>
<html>

<head>
    <title>Product Listing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/3189.css">
</head>

<body>
    <div class="type-3189">
        <div class="container">
            <div class="header">
                <div class="results">Showing 1–12 of 16 results</div>
                <div class="controls">
                    <i class="fas fa-th-large"> </i>
                    <i class="fas fa-bars"> </i>
                    <select class="select_price">
                        <option>Sort by latest</option>
                    </select>
                    <button class="btn_filter">Filter</button>
                </div>
            </div>
            <div class="row products">
                <div class="col-md-3 product">
                    <div class="type-3189">
                        <img class="img_product" alt="Shield Shampoo" height="300"
                            src="./img/product-01-1-1-400x533.jpg" width="200" />
                        <div class="price">$45.00</div>
                        <div class="name">Shield Shampoo</div>
                        <div class="rating">
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 product">
                    <div class="type-3189">
                        <img class="img_product" alt="Shield Shampoo" height="300"
                            src="./img/product-02-1-1-400x533.jpg" width="200" />
                        <div class="price">$45.00</div>
                        <div class="name">Shield Shampoo</div>
                        <div class="rating">
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 product">
                    <div class="type-3189">
                        <div class="discount">-24%</div>
                        <img class="img_product" alt="Shield Shampoo" height="300"
                            src="./img/product-03-1-1-400x533.jpg" width="200" />
                        <div class="price">$45.00</div>
                        <div class="name">Shield Shampoo</div>
                        <div class="rating">
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 product">
                    <div class="type-3189">
                        <img class="img_product" alt="Shield Shampoo" height="300"
                            src="./img/product-06-1-1-400x533.jpg" width="200" />
                        <div class="price">$45.00</div>
                        <div class="name">Shield Shampoo</div>
                        <div class="rating">
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                            <i class="fas fa-star"> </i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>