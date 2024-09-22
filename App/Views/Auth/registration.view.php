<?php

$title = "Registration";
require __DIR__ . '/../components/header.php';
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3 mb-5">
                <h1 class="">
                    Registration
                </h1>
            </div>
            <div class="col-md-12">
                <form method="POST" action="/store">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <!--                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
<!--                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password" name="confirm_password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
require __DIR__ . '/../components/footer.php';