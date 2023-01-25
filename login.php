<?php
    session_start();
    if(isset($_SESSION["user_data"]))
        header("location: index.php");
    
    
    if (isset($_POST["login"])) {
        require "scripts/php/database.php";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $salt = "s;dflkjsdflkj";
        $encrypted_password = sha1($password . $salt); //TODO change hash function?

        $sql_query = "
                    SELECT *
                    FROM Users
                    WHERE user_name = \"$username\"
                    AND password = \"$encrypted_password\";
                ";
        
        try {
            $result = $conn->query($sql_query);
            if ($result->num_rows == 1) {
                $_SESSION["user_data"] = $result->fetch_assoc();
                header("location: index.php");
            }
        } catch (Exception $e) {
            echo "<br>"."Error: $e";
            echo "<br>$sql_query";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Document</title>
</head>
<body>
    <section class="vh-100 d-flex justify-content-center align-items-center" id="wrapper">
        <div id="signin-card" class="card w-50 mx-auto mt-5 p-5">
            <div class="text-center pb-4 primary-text fs-3 fw-bold text-uppercase"><i class="fa-solid fa-earth me-2"></i>Planet Dev</div>
            <h3 class="text-center text-muted">Sign In</h3>
            <form  method="POST" action="includes/login.inc.php" class="container">
                <div class="row form-outline my-3">
                    <input type="text" id="email-input" class="form-control" placeholder="email" name="email"/>
                </div>
                <div class="row form-outline my-3">
                    <input type="password" id="password-input" class="form-control" placeholder="Password" name="password"/>
                </div>
                <div class="row text-center d-flex justify-content-center">
                    <button type="submit" id="login-button" class="btn p-2 my-0 mt-4 w-25" name="login"><span class="text-light fw-bold">Sign In</span></button>
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>