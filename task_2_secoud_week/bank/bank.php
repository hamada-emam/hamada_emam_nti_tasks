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
            <div class="col-12 text-center my-5">
                <h1> My grade calculator</h1>
            </div>
            <div class="col-4 offset-4">
                <form action="" method="POST">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="tex" name="name" id="national_id" class="form-control" placeholder="enter your name" aria-describedby="helpId">
                    </div>


                    <div class="form-group">
                        <label for="loan">loan amount</label>
                        <input type="number" name="loan" id="national_id" class="form-control" placeholder="enter the amount of loan" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="number_of_years">yeers</label>
                        <input type="number" name="number_of_years" id="national_id" class="form-control" placeholder="enter number of yeers" aria-describedby="helpId">
                    </div>


                    <button class="btn btn-outline-danger form-control my-3"> Calc </button>

                </form>

                <div class="alert alert-success container " role="alert">

                </div>
                <?php


                if ($_POST && $_SERVER['REQUEST_METHOD'] == 'POST') {

                    if ($_POST['number_of_years'] <= 3) {


                ?>
                        <div class="alert alert-success container " role="alert">

                            <h4 class="alert-heading">Name : </h4>
                            <p> <?= $_POST['name'] ?></p>

                            <h4 class="alert-heading">monthly installment : </h4>
                            <p> <?php echo ($_POST['loan'] * .1 + $_POST['loan']) / ($_POST['number_of_years'] * 12) ?></p>
                        </div>'
                    <?php
                    } else {

                    ?>
                        <div class="alert alert-success container " role="alert">

                            <h4 class="alert-heading">Name : </h4>
                            <p> <?= $_POST['name'] ?></p>

                            <h4 class="alert-heading">monthly installment : </h4>
                            <p> <?php echo ($_POST['loan'] * .15 + $_POST['loan']) / ($_POST['number_of_years'] * 12) ?></p>
                        </div>'
                    <?php } ?>

                <?php
                }
                ?>


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