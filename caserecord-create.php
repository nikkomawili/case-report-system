<?php
    include "header.php";
    include "classes/dbh.classes.php";

    $serveruser="root";
    $serverpass="";

    $connection = new PDO('mysql:host=localhost;dbname=case-report-system_db', $serveruser, $serverpass);

    $nameLast = "";
    $nameFirst = "";
    $nameMid = "";
    $nameExt = "";
    $department = "";
    $program = "";
    $year ="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nameLast = $_POST["nameLast"];
        $nameFirst = $_POST["nameFirst"];
        $nameMid = $_POST["nameMid"];
        $nameExt = $_POST["nameExt"];
        $department = $_POST["department"];
        $program = $_POST["program"];
        $year = $_POST["year"];

        do {
            if( empty($nameLast) || empty($nameFirst) || empty($nameMid) || empty($nameExt) || empty($department) || empty($program) || empty($year) ){
                header("location: caserecord-create.php?error=EmptyInput");
                break;
            }

            // add new user to database
            $stmt = "INSERT INTO case_reports (name_last, name_first, name_middle, name_extension, department, program, program_year)" . "VALUES ('$nameLast', '$nameFirst', '$nameMid', '$nameExt', '$department', '$program', '$year')";
            $result = $connection->query($stmt);

            if (!$result) {
                header("location: caserecord-create.php?error=InvalidQuery");
                break;
            }

            $nameLast = "";
            $nameFirst = "";
            $nameMid = "";
            $nameExt = "";
            $department = "";
            $program = "";
            $year ="";

            header("location: caserecord.php?error=none");
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
                            <h5 class="card-title text-center mb-5 fw-light fs-5">New Case Record</h5>
                            <form method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="" name="nameLast" value="<?php echo $nameLast; ?>">
                                    <label for="floatingID">Last Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="" name="nameFirst" value="<?php echo $nameFirst; ?>">
                                    <label for="floatingID">First Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="" name="nameMid" value="<?php echo $nameMid; ?>">
                                    <label for="floatingID">Middle Name / Initial</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="" name="nameExt" value="<?php echo $nameExt; ?>">
                                    <label for="floatingID">Extension Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="" name="department" value="<?php echo $department; ?>">
                                    <label for="floatingID">Department</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="" name="program" value="<?php echo $program; ?>">
                                    <label for="floatingID">Course</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingID" placeholder="" name="year" value="<?php echo $year; ?>">
                                    <label for="floatingID">Year</label>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="submit">Submit</button>
                                    <a class="btn btn-primary btn-login text-uppercase fw-bold mt-2" href="caserecord.php" role="button">Cancel</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
