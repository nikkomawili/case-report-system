<?php
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        section{
            padding: 30px 0;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container-xxl">
            <a href="#intro" class="navbar-brand">
                <span class="fw-bold text-secondary">
                    Case Reports DB
                </span>
            </a>
            <!-- Toggle Button for Mobile Nav -->
            <!-- Arias are for accessibility -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                    <?php
                        if(isset($_SESSION["userid"]))
                        {
                    ?>
                        <li class="nav-item"><a href="#" class="nav-link"> <?php echo $_SESSION["useruid"];?></a></li>
                        <li class="nav-item ms-2 d-none d-md-inline"><a href="includes/logout.inc.php" class="btn btn-secondary"> Logout</a></li>
                    <?php
                        }
                        else
                        {
                    ?>
                    
                        <!-- <li class="nav-item">User</li> -->
                        <li class="nav-item ms-2 d-none d-md-inline"><a href="#" class="btn btn-secondary">Login</a></li>

                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <section id="login-signup">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-light fs-5">Log in</h5>
                            <form action="includes/login.inc.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="User ID" name="uid">
                                    <label for="floatingID">User ID</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd">
                                    <label for="floatingPassword">Password</label>
                                </div>

                                <!-- Forgot Password -->
                                <!-- <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                                    <label class="form-check-label" for="rememberPasswordCheck">
                                    Remember password
                                    </label>
                                </div> -->

                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="submitLogin">Log
                                    in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign up</h5>
                            <form action="includes/signup.inc.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="User ID" name="uid">
                                    <label for="floatingID">User ID</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingEmail" placeholder="Email" name="email">
                                    <label for="floatingEmail">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPasswordRepeat" placeholder="Repeat Password" name="pwdRepeat">
                                    <label for="floatingPasswordRepeat">Repeat Password</label>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="submitSignup">Sign
                                    up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</body>
</html>