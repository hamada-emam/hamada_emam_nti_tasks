<?php
$result = null;
if ($_POST && $_SERVER['REQUEST_METHOD'] == 'POST') {


    $result = calc(
        $_POST['number_1'],
        $_POST['number_2'],
        $_POST['operators']
    );
}

function calc($number_1, $number_2, $operator)
{


    if ($operator === "+") {
        return  "{$number_1} + {$number_2} =  " . $number_1 + $number_2;
    } else if ($operator === "-") {
        return "{$number_1} -{$number_2} =  " . $number_1 - $number_2;
    } else if ($operator === "*") {
        return "{$number_1} * {$number_2} =  " . $number_1 * $number_2;
    } else if ($operator === "/") {
        return "{$number_1} / {$number_2} =   " .  $number_1 / $number_2;
    } else if ($operator === "%") {
        return "{$number_1} % {$number_1} =  " . $number_1 % $number_2;
    } else if ($operator === "**") {
        return "{$number_1} raised to the power {$number_1} is :  " . $number_1 ** $number_2;
        // اي جذر 
    } else if ($operator === "^") {
        return "the {$number_2} root of {$number_1} is :  " .  $number_1 ** (1 / $number_2);
    }
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
    <div class="container">
        <div class="row">
            <div class="col-12 text-center  my-5">
                <h1>My Calc</h1>
            </div>
            <div class="alert alert-success container " role="alert">
                <h4 class="alert-heading">Hi you will select operator for number one to number two </h4>

            </div>
            <div class="col-4 offset-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="operators">Choose an operator:</label>
                        <select name="operators" id="operators">
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">*</option>
                            <option value="/">/</option>
                            <option value="%">%</option>
                            <option value="**">**</option>
                            <option value="^"> Root </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number_1">number 1</label>
                        <input type="number" name="number_1" id="national_id" class="form-control" placeholder="enter grade in rang 0 and 100" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="number_2">number 2</label>
                        <input type="number" name="number_2" id="national_id" class="form-control" placeholder="enter grade in rang 0 and 100" aria-describedby="helpId">
                    </div>

                    <button class="btn btn-outline-danger form-control my-3"> Calc </button>

                </form>


                <div class="alert alert-success container " role="alert">

                </div>
                <?php if ($result != null) { ?>
                    <div class="alert alert-success container " role="alert">
                        <h4 class="alert-heading">Answer : </h4>
                        <p> <?php echo $result; ?></p>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>