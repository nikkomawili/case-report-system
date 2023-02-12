<?php
    include_once "header.php";
?>

<section id="top login-signup">
        <div class="container">
            <div class="row">
                
                <?php if(isset($_SESSION["userid"])) { ?>

                                <!-- <h5 class="card-title text-center mb-5 fw-light fs-5">You are already logged in!</h5> -->

                            <?php } else { ?>
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
                            <?php } ?>


            </div>
        </div>
    </section>

</body>
</html>