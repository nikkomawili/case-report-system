<?php
    include_once "header.php";

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


    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $department[] = $row['department'];
    }


    $sql2 = "SELECT * FROM case_reports;";
    $result2 = connect()->query($sql2);

    while($row2 = $result2->fetch(PDO::FETCH_ASSOC)){
        $status[] = $row2['status'];
    }

    $sql3 = "SELECT program_year, count(program_year) FROM case_reports;";
    // SELECT age, count(age) FROM Students GROUP by age
    $result3 = connect()->query($sql3);

    while($row3 = $result3->fetch(PDO::FETCH_ASSOC)){
        $year[] = $row3['program_year'];
    }

    // $sql4 = "SELECT SUM(program_year) FROM case_reports WHERE program_year='4'";
    // SELECT age, count(age) FROM Students GROUP by age
    // $result4 = connect()->query($sql4);

    
    // while($row4 = $result4->fetch(PDO::FETCH_ASSOC)){
        // $year[] = $row4['program_year'];
    // }

    $queryTotalCases = "SELECT COUNT(department), department
    FROM case_reports GROUP BY department;";
    $resultTotalCases = connect()->query($queryTotalCases);

    while($rowTotalCases = $resultTotalCases->fetch(PDO::FETCH_ASSOC)){
        
        $rowCase[] = $rowTotalCases['department'];
        $rowNumbers[] = $rowTotalCases["COUNT(department)"];
    }
    
?>

<section id="top">
<div class="container text-center mt-5">

    <div class="row">
    <h1>This is Admin's Dashboard</h1>

    <div class="col-4 text-start m-3">
        <h3 class="mb-3">Total Cases</h3>
        <div id="chart"></div>
    </div>

</div>
</section>

<script defer>
    var options = {
        
        chart: {
            type: 'donut'
        },
        series: <?php echo json_encode($rowNumbers);?>,
        labels: <?php echo json_encode($rowCase);?>
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
</script>

