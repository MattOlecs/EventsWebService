<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Events Web Service</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/styles/myStyle.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link href="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
</head>

<body>
    <div style="min-height: 100vh; display:flex; flex-direction:column;">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">Events Web Service</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                        <li class="nav-item dropdown">
                            <?php if ($loginInfo != 0) {?>
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">My events</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/favourite-events">Favourites</a></li>
                                    <li><a class="dropdown-item" href="/crated-by-me-events">Created by me</a></li>
                                </ul>
                            <?php }?>
                        </li>
                        <li class="nav-item dropdown">
                            <?php
                            if ($loginInfo != 0) {
                            ?>
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/add-event">Add event</a></li>
                                    <li><a class="dropdown-item" href="/edit-profile/<?= $loginInfo ?>">Edit profile</a></li>
                                    <?php
                                    if ($_SESSION['isAdmin']) {
                                    ?>
                                        <li><a class="dropdown-item" href="/admin-panel">Admin Panel</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if ($loginInfo == 0) {
                        ?>
                            <li><a id="register-link" href="/register">
                                    <button style="margin-top: -7px; margin-bottom: -7px; margin-right: 5px;" class="btn btn-secondary bg-primary">Register</button></a></li>
                            <li><a id="signin-link" href="/login">
                                    <button style="margin-top: -7px; margin-bottom: -7px;" class="btn btn-secondary bg-primary">Login</button></a></li>
                            </a></li>
                        <?php
                        } else {
                        ?>
                            <li><a id="signin-link" href="/logout">
                                    <button style="margin-top: -7px; margin-bottom: -7px;" class="btn btn-secondary bg-primary">Logout</button></a></li>
                            </a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>