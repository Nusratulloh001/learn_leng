<?php

$title = "Home";
require 'components/header.php';
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3 mb-3">
                <h1 class="">
                    Test page for download file!
                </h1>
            </div>
            <div class="col-md-12">
                <form action="/download-file" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label for="file" class="form-label fs-4">Choose your file</label>
                        <input type="file" class="form-control" id="file" aria-describedby="fileHelp" name="file">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
require "components/footer.php";