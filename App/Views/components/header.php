<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body class="bg-dark text-light">
    <header class="header border-bottom border-secondary border-3">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="/">PHPPro</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= isUrl('/') ? 'active' : '' ?>" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= isUrl('/posts') ? 'active' : '' ?>" href="/posts">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= isUrl('/file') ? 'active' : '' ?>" href="/file">File</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= isUrl('/about') ? 'active' : '' ?>" href="/about">About as</a>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" href="#">Pricing</a>-->
<!--                        </li>-->
                    </ul>
                </div>
                <div class="auth">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/registration" class="nav-link">Registration</a>
                        </li>
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>