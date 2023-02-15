<?php
    include_once "header.php";
    include "classes/dbh.classes.php";

    function connect() {
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=case-report-system_db', $username, $password);
            return $dbh;

        } catch (PDOException $e) {
            print "Database Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    $sql = "SELECT * FROM case_reports";
    $result = connect()->query($sql);
?>

<section id="top">

    <div class="container text-start mt-5 ">
        <h1>Student List</h1>
        <a href="caserecord-create.php" class="btn btn-primary " role="button">New Case</a>

        <table class="m-3 table table-striped table-hover text-start align-middle text-nowrap">
            <thead class="bg-light">
                <tr>
                    <th scope="col">Action</th>
                    <th scope="col">ID Number</th>
                    <th scope="col">Program</th>
                    <th scope="col">Year</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Extension Name</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Address</th>
                    <!-- <th scope="col">Father's Name</th>
                    <th scope="col">Mother's Name</th>
                    <th scope="col">Guardian's Name</th>
                    <th scope="col">Emergency Contact's Name</th>
                    <th scope="col">Emergency Contact's Address</th>
                    <th scope="col">Emergency Contact's Phone No.</th> -->
                </tr>
            </thead>
            <tbody>
                <?php 


                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "
                        <tr>
                            <td>
                                <!-- <a class='btn btn-primary btn-sm' href='caserecord-edit.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='caserecord-delete.php?id=$row[id]'>Delete</a> -->
                                <a class='btn btn-success btn-sm' href='manage-student-edit.php?id=$row[id]'>Full Details</a>
                            </td>
                            <td>$row[id_num]</td>
                            <td>$row[program]</td>
                            <td>$row[program_year]</td>
                            <td>$row[name_last]</td>
                            <td>$row[name_first]</td>
                            <td>$row[name_middle]</td>
                            <td>$row[name_extension]</td>
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>

        </table>
    </div>
    
</section>
