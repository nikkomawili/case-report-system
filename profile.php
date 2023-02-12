<?php
    include_once "header.php";

    include "classes/dbh.classes.php";
    include "classes/profileinfo.classes.php";
    include "classes/profileinfo-view.classes.php";

    $profileInfo = new ProfileInfoView();
?>

    <section id="top profile">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">

                        <div class="card-body p-4 p-sm-5">
                            <h1 class="card-title text-center mb-5 fw-light "><?php echo $_SESSION["useruid"];?></h1>
                            <h5 class="card-title">Intro</h5>
                            <p class="card-text mt-2" style="height: 140px;">
                                <!-- We have access to this because we are logged in -->
                                <?php $profileInfo->fetchAbout($_SESSION["userid"]);?>
                            </p>
                            <!-- <h5 class="card-title"> 
                                <?php $profileInfo->fetchTitle($_SESSION["userid"]);?>
                            </h5>
                            <p class="card-text">
                                <?php $profileInfo->fetchText($_SESSION["userid"]);?>
                            </p> -->
                            <div class="mb-4 mt-2 text-end">
                                <a type="submit" name="submitProfileInfo" class="btn btn-secondary" href="profilesettings.php">Edit bio</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</body>
</html>