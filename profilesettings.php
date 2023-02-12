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

                <!-- Actual Card Column -->
                <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                    <!-- Card Shadow -->
                    <div class="card border-0 shadow rounded-3 my-5">

                        <div class="card-body p-4 p-sm-5">
                            <h1 class="card-title text-center mb-5 fw-light">
                                <?php echo $_SESSION["useruid"];?>
                            </h1>
                            <form action="includes/profileinfo.inc.php" method="post">
                                <h5 class="card-title">Intro</h5>
                                <div class="mt-2">
                                    <textarea id="query" class="form-control" style="height: 140px;" name="about"><?php $profileInfo->fetchAbout($_SESSION["userid"]);?></textarea>
                                    <!-- <label for="query">Your About...</label> -->
                                </div>
                                <!-- <div class="mb-4 input-group">
                                    <input type="text" class="form-control" placeholder="..." name="introtitle" value="<?php $profileInfo->fetchTitle($_SESSION["userid"]);?>">
                                </div> -->
                                <!-- <div class="form-floating mb-4 mt-3">
                                    <textarea id="query" class="form-control" style="height: 140px;" name="introtext"><?php $profileInfo->fetchText($_SESSION["userid"]);?></textarea>
                                    <label for="query">Your Information...</label>
                                </div> -->
                            <div class="mb-4 mt-2 text-end">
                                <button type="submit" name="submitProfileInfo" class="btn btn-secondary">Save</button>
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