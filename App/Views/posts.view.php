<?php

$title = "Posts";
require 'components/header.php';
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h1 class="">
                    Posts page!
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 my-4">
                <a href="/posts/create" class="btn btn-success w-auto">Create</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="list-group ">
                    <?php foreach ($posts as $post) : ?>
                        <a href="/posts/<?= $post['id'] ?>" class="list-group-item list-group-item-action" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $post['title'] ?></h5>
                                <p class="text-secondary m-0">
                                    <small>Created <?= $post['created_at'] ?></small>
                                </p>
                            </div>
                            <p class="mb-1"><?= $post['content'] ?></p>
<!--                            <small>And some small print.</small>-->
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require "components/footer.php";
