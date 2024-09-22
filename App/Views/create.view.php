<?php

$title = "Create post";
require 'components/header.php';
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3 mb-3">
                <h1 class="m-0">
                    Create post
                </h1>
            </div>
            <div class="col-md-12 mb-5 mt-3">
                <a href="/posts" class="btn btn-outline-primary">Go back</a>
            </div>
            <div class="col-md-12">
                <form method="post" action="/posts" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="content" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea name="content" id="content" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
require "components/footer.php";
