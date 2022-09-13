<?php

if ($_POST && $_SERVER['REQUEST_METHOD'] == 'POST') {

    // $grades_list = [$_POST['grade_1'], $_POST['grade_2'], $_POST['grade_3'], $_POST['grade_4'], $_POST['grade_5'],];

    $total_value_of_grade = 0;

    define("Max_GRADE", 100);

    $total_max_gradse = count($_POST) * Max_GRADE;



    foreach ($_POST as $key => $grade) {
        $total_value_of_grade += $grade;
        // echo $total_number;
    }
    // $total_number = $_POST['grade_1'] + $_POST['grade_2'] + $_POST['grade_3'] + $_POST['grade_4'] + $_POST['grade_5'];

    $percentage = ($total_value_of_grade / $total_max_gradse) * 100;
    // echo "percentage" . $percentage;

    switch ($percentage) {
        case $percentage < 50:
            $total_grade =    "F";
            break;
        case ($percentage >= 50 && $percentage < 60):
            $total_grade =    "E";
            break;
        case ($percentage >= 60 && $percentage < 70):
            $total_grade =    "D";
            break;
        case ($percentage >= 70 && $percentage < 80):
            $total_grade =    "C";
            break;
        case ($percentage >= 80 && $percentage < 90):
            $total_grade =    "B";
            break;
        case $percentage >= 90:
            $total_grade =    "A";
            break;
    }


    // if ($percentage < 50) {
    //     $total_grade =    "F";
    // } else if ($percentage >= 50 && $percentage < 60) {
    //     $total_grade =  "E";
    // } else if ($percentage >= 60 && $percentage < 70) {
    //     $total_grade =     "D";
    // } else if ($percentage >= 70 && $percentage < 80) {
    //     $total_grade =     "C";
    // } else if ($percentage >= 80 && $percentage < 90) {
    //     $total_grade =     "B";
    // } else if ($percentage >= 90) {
    //     $total_grade =     "A";
    // } 
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="alert alert-success container " role="alert">

    </div>

    <div class="alert alert-success container " role="alert">
        <h4 class="alert-heading">your grade is : </h4>
        <p> <?php echo $total_grade ?></p>
        <h4 class="alert-heading">your percentage is : </h4>
        <p> <?php echo $percentage . "%" ?></p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>