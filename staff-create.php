<?php
    include "header.php";
    include "classes/dbh.classes.php";

    $serveruser="root";
    $serverpass="";
    $connection = new PDO('mysql:host=localhost;dbname=case-report-system_db', $serveruser, $serverpass);

    $staffsId = "";
    $nameLast = "";
    $nameFirst = "";
    $nameMid = "";
    $nameEmail = "";
    $password = "";
    $role ="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $staffsId = $_POST["nameId"];
        $nameLast = $_POST["nameLast"];
        $nameFirst = $_POST["nameFirst"];
        $nameMid = $_POST["nameMid"];
        $nameEmail = $_POST["nameEmail"];
        $password = $_POST["password"];
        $role = $_POST["role"];

        do {
            if( empty($staffsId) || empty($nameLast) || empty($nameFirst) || empty($nameMid) || empty($nameEmail) || empty($password) || empty($role) ){
                header("location: staff-create.php?error=EmptyInput");
                break;
            }

            // add new user to database
            $stmt = "INSERT INTO staffs (staffs_id, staffs_Lname, staffs_Fname, staffs_Mname, staffs_email, staffs_pwd, staffs_role)" . "VALUES ('$staffsId', '$nameLast', '$nameFirst', '$nameMid', '$nameEmail', '$password', '$role')";
            $result = $connection->query($stmt);

            if (!$result) {
                header("location: staff-create.php?error=InvalidQuery");
                break;
            }
            $staffsId = "";
            $nameLast = "";
            $nameFirst = "";
            $nameMid = "";
            $nameEmail = "";
            $password = "";
            $role = "";

            header("location: manage_staff.php?error=none");
            exit;

        } while (false);
    }
?>

<section id="top login-signup">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-light fs-5">New Staff</h5>
                            <form method="post">
                                <div class="form-floating mb-3">
                                    <input type="int" class="form-control" id="floatingID" placeholder="" name="nameId" value="<?php echo $staffsId; ?>" required>
                                    <label for="floatingID">ID Number</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="" name="nameLast" value="<?php echo $nameLast; ?>" required>
                                    <label for="floatingID">Last Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="" name="nameFirst" value="<?php echo $nameFirst; ?>" required>
                                    <label for="floatingID">First Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="" name="nameMid" value="<?php echo $nameMid; ?>">
                                    <label for="floatingID">Middle Name / Initial</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingEmail" placeholder="" name="nameEmail" value="<?php echo $nameEmail; ?>" required>
                                    <label for="floatingEmail">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="" name="password" value="<?php echo $password; ?>" required>
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPasswordRepeat" placeholder="" name="passwordRepeat" value="<?php echo $password; ?>" required>
                                    <label for="floatingPasswordRepeat">Password Repeat</label>
                                </div>
                                <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="role">
                                    <!--<option selected>What role does the user have?</option>-->
                                    <option value="staff">Staff</option>
                                </select>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="submitSignup">Submit</button>
                                    <a class="btn btn-primary btn-login text-uppercase fw-bold mt-2" href="manage_staff.php" role="button">Cancel</a>

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