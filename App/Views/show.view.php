<?php

$title = "Show";
require 'components/header.php';
?>

<main>
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12">
                <a href="/posts" class="btn btn-outline-primary w-auto">Go back</a>
                <a href="/posts/<?= $post['id'] ?>/edit" class="btn btn-outline-primary w-auto">Edit</a>
                <a href="/posts/<?= $post['id'] ?>/delete" class="btn btn-outline-danger w-auto">Delete</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 my-3 d-flex justify-content-between">
                <h4 class="">
                    <?= $post['title'] ?>
                </h4>
                <small class="w-auto"><?= $post['created_at'] ?></small>
            </div>
            <div class="col-md-12">
                <p><?= $post['content'] ?></p>
            </div>

        </div>
    </div>
</main>

<?php
require "components/footer.php";
