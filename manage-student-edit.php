<?php
    include "header.php";
    include "classes/dbh.classes.php";

    $serveruser="root";
    $serverpass="";
    $connection = new PDO('mysql:host=localhost;dbname=case-report-system_db', $serveruser, $serverpass);

    $id = "";
    $nameLast = "";
    $nameFirst = "";
    $nameMid = "";
    $nameExt = "";
    $department = "";
    $program = "";
    $year ="";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if (!isset($_GET["id"])){
            header("location: caserecord.php?error=NotFound");
            exit;
        }

        $id = $_GET["id"];

        // reads the row of the selected user from the database
        $sql = "SELECT * from case_reports WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            header("location: caserecord.php?error=NoSuchData");
            exit;
        }

        $nameLast = $row["name_last"];
        $nameFirst = $row["name_first"];
        $nameMid = $row["name_middle"];
        $nameExt = $row["name_extension"];
        $department = $row["department"];
        $program = $row["program"];
        $year = $row["program_year"];

    } else {

        $id = $_POST["id"];
        $nameLast = $_POST["nameLast"];
        $nameFirst = $_POST["nameFirst"];
        $nameMid = $_POST["nameMid"];
        $nameExt = $_POST["nameExt"];
        $department = $_POST["department"];
        $program = $_POST["program"];
        $year = $_POST["year"];

        do {
            if( empty($id) || empty($nameLast) || empty($nameFirst) || empty($nameMid) || empty($nameExt) || empty($department) || empty($program) || empty($year) ){
                header("location: caserecord-edit.php?error=EmptyInput");
                break;
            }

            // add new user to database
            $stmt = "UPDATE case_reports " . 
                "SET name_last = '$nameLast', name_first = '$nameFirst', name_middle = '$nameMid', name_extension = '$nameExt', department ='$department', program = '$program', program_year = '$year' " . 
                "WHERE id = $id";

            $result = $connection->query($stmt);

            if (!$result) {
                header("location: caserecord-create.php?error=InvalidQuery");
                break;
            }

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
                            <h5 class="card-title text-center mb-5 fw-light fs-5"><?php echo $nameFirst .' '.$nameMid.' '.$nameLast; ?></h5>
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                                    <!-- <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="submit">Submit</button> -->
                                    <a class="btn btn-primary btn-login text-uppercase fw-bold mt-2" href="manage_student.php" role="button">Back</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
