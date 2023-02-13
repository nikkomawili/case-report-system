<?php
    include_once "header.php";
?>

<section id="top login-signup">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-light fs-5">Register Users</h5>
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
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="role">
                                    <option selected>What role does the user have?</option>
                                    <option value="user">Student</option>
                                    <option value="staff">Staff</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <label for="floatingSelect">Role</label>
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