<?php

include_once 'includes/functions.php';

session_start();
if (!isset($_SESSION['user_info']))
    header('location: login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Planet Dev</title>
</head>

<body>
    <div class="d-flex shadow-sm bg-light" id="wrapper">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="row mx-4 mt-4 d-flex align-items-center">
                        <div class="p-0 w-25 p-3">
                            <img src="assets/images/icons/user.png" class="rounded-circle button1" width="100%" alt="user">
                        </div>
                        <div class="p-0 w-75">
                            <div class="fw-bolder fs-5">Administrator</div>
                            <div><?= $_SESSION['user_info']['email']; ?></div>
                        </div>
                    <div class="row my-4">
                        <a href="includes/logout.inc.php" class="btn button1 rounded-1">Log out</a>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body">
                <form method="GET" action="<?= $_SERVER['PHP_SELF'] ?>" class="list-group list-group-flush my-3">
                    <button type="submit" name="dashboard" class="list-group-item list-group-item-action fw-bold"><i class="uil uil-chart-bar fs-4 me-2"></i>Dashboard</button>
                    <button type="submit" name="articles" class="list-group-item list-group-item-action fw-bold"><i class="uil uil-document-layout-center  me-2 fs-4"></i>articles</button>
                    <button type="submit" name="new_article" class="list-group-item list-group-item-action fw-bold"><i class="uil uil-edit-alt fs-4 me-2"></i>new article</button>
                </form>
                <!-- </div> -->
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" style="height: 100vh; overflow: scroll;">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 justify-content-between" id="dashboard">
                <button class="d-flex align-items-center border-0 bg-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="fas fa-align-left mycolor fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-3 m-0">Dashboard</h2>
                </button>
                <div class="d-flex align-items-center end-50">
                    <div class="pt-3 me-3">
                        <p class="fs-6 text-secondary" style="margin-bottom: -5px;">Today's date</p>
                        <p class="fs-6 text-black fw-bold"><?= date("Y-m-d") ?></p>
                    </div>
                    <i class="uil uil-calendar-alt fs-2 mt-1 box rounded p-2"></i>
                </div>
            </nav>

            <!-- main content -->
            <main class="container-fluid px-4">
                <?php
                if (isset($_GET["articles"]))
                    require "./includes/templates/articles.php";
                else if (isset($_GET["users"]))
                    require "./includes/templates/users.php";
                else if (isset($_GET["new_article"]))
                    require "./includes/templates/new_article.php";
                else
                    require "./includes/templates/dashboard.php";
                ?>
            </main>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>