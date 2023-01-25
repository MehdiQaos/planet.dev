<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
    <title>Document</title>
</head>
<body>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <section class="vh-100 d-flex justify-content-center align-items-center" id="wrapper">
        <div id="signin-card" class="card w-50 mx-auto mt-3 p-5">
            <div class="text-center pb-4 primary-text fs-3 fw-bold text-uppercase"><i class="fa-solid fa-earth me-2"></i>Planet Dev</div>
            <h3 class="text-center text-muted">Sign Up</h3>
            <form  method="POST" action="includes/signup.inc.php" class="container" data-parsley-validate>
                <div class="row form-outline my-3 gap-1">
                    <input type="text" id="firstname-input" class="col form-control" placeholder="First name" name="firstname" required data-parsley-trigger="keyup" autofocus/>
                    <input type="text" id="lastname-input" class="col form-control" placeholder="Last name" name="lastname"/>
                </div>
                <div class="row form-outline my-3">
                    <input type="email" id="email-input" class="form-control" placeholder="Email" required data-parsley-trigger="keyup" name="email"/>
                </div>
                <div class="row form-outline my-3">
                    <input type="password" id="password-input" class="form-control" placeholder="Password" required data-parsley-trigger="keyup" name="pwd"/>
                </div>
                <div class="row form-outline my-3">
                    <input type="password" id="password-repeated-input" class="form-control" required data-parsley-trigger="keyup" placeholder="Repeat password" name="rpwd"/>
                </div>
                <div class="row d-flex justify-content-center text-center">
                    <button type="submit" id="login-button" class="btn p-2 mt-2 w-25" name="signup"><span class="text-light fw-bold">Sign Up</span></button>
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>