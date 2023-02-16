<?php
    include_once "header.php";
    include "classes/dbh.classes.php";
?>

<section id="top">

    <div class="container text-start mt-5 ">
        <h1>Staff List</h1>
        <a href="staff-create.php" class="btn btn-primary " role="button">Add Staff</a>

        <table class="my-3 table table-striped table-hover text-start align-middle text-nowrap">
            <thead class="bg-light">
                <tr>
                    <th scope="col">Action</th>
                    <!--<th scope="col">Status</th>-->
                    <th scope="col">ID Number</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Midle Name/Initial</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Role</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 

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

                    $sql = "SELECT * FROM staffs";
                    $result = connect()->query($sql);

                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "
                        <tr>
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit-staff.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='delete-staff.php?id=$row[id]'>Delete</a>
                            </td>
                            
                            <td>$row[staffs_id]</td>
                            <td>$row[staffs_Lname]</td>
                            <td>$row[staffs_Fname]</td>
                            <td>$row[staffs_Mname]</td>
                            <td>$row[staffs_email]</td>
                            <td>$row[staffs_pwd]</td>
                            <td>$row[staffs_role]</td>
                            
                        </tr>
                        ";
                    }
                ?>
<!--line53--<td><span class='badge text-primary'>$row[status]</span></td>-->

            </tbody>
            <tbody>
                
            </tbody>
        </table>
    </div>
    
</section>
