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


    <script src="node_modules/apexcharts/dist/apexcharts.min.js"></script>

    <style>
        section{
            padding: 30px 0;
        }

        .navbar {
            background-color: white;
        }

    </style>

</head>
<body>

    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container-xxl">
            <a href="#" class="navbar-brand">
                <span class="fw-bold text-secondary">
                    SVMS + DA
                </span>
            </a>
            <!-- Toggle Button for Mobile Nav -->
            <!-- Arias are for accessibility -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                    <?php if(isset($_SESSION["userid"])) { ?>
                        <?php if($_SESSION["userrole"] == "admin") { 
                        // echo $_SESSION["userrole"];
                        ?>
                        <li class="nav-item"><a href="indexadmin.php" class="nav-link">Admin's Dashboard</a></li>
                        <li class="nav-item"><a href="caserecord.php" class="nav-link">Case Records</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Manage
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="manage_staff.php">Staff</a></li>
                                <li><a class="dropdown-item" href="manage_student.php">Students</a></li>
                                <!-- <li><hr class="dropdown-divider"></li> -->
                                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </li>
                        
                        <?php } elseif($_SESSION["userrole"] == "staff") { ?>
                        <li class="nav-item"><a href="indexstaff.php" class="nav-link">Staff's Dashboard</a></li>
                        <?php } elseif($_SESSION["userrole"] == "user") { ?>
                        <li class="nav-item"><a href="indexuser.php" class="nav-link">User's Dashboard</a></li>
                        <?php } ?>
                        
                        <!-- <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li> -->
                        <li class="nav-item"><a href="profile.php" class="nav-link"> <?php echo $_SESSION["useruid"];?></a></li>
                        <li class="nav-item ms-2 d-none d-md-inline"><a href="includes/logout.inc.php" class="btn btn-secondary"> Logout</a></li>
                    <?php } else { ?>
                        <!-- <li class="nav-item">User</li> -->
                        <!-- <li class="nav-item ms-2 d-none d-md-inline"><a href="#" class="btn btn-secondary">Login</a></li> -->
                    <?php } ?>
                </ul>
            </div>

        </div>
    </nav>