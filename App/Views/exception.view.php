<?php

$title = "Home";
require 'components/header.php';
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3 mb-3">
                <h1 class="border-start border-5 border-danger m-0 pb-1 ps-3">
                    <?= get_class($error) ?>
                </h1>
            </div>
            <div class="col-md-12">
                <p class="text-center p-5 bg-danger rounded fs-4">
                    <?= $error -> getMessage() ?>
                </p>
            </div>
            <div class="col-md-12 mt-4 mb-4">
                <h3 class="m-0 pt-2">
                    Exceptions information:
                </h3>
            </div>
            <div class="col-md-12">
                <ul class="list-group mb-4">
                    <li class="list-group-item custom-item p-4">Status code: <?= $error->getCode() ?></li>
                    <li class="list-group-item custom-item p-4">Line: <?= $error -> getLine() ?></li>
                    <li class="list-group-item custom-item p-4">File: <?= $error -> getFile() ?></li>
                </ul>
                <h4>Full errors information</h4>
                <ul class="list-group">
                    <li class="list-group-item custom-item p-4">
                        <pre><?php print_r($error);?></pre>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>

<?php
require "components/footer.php";