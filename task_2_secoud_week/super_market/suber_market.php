<?php
$quantity = 0;
if ($_POST && $_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['name_of_user'] = $_POST['name_of_user'];
    $_SESSION['number_of_products'] = $_POST['number_of_products'];

    $city = $_POST['city'];
    $name = $_SESSION['name_of_user'];

    $quantity = $_POST["number_of_products"];
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
            <div class="col-12 text-center my-5">
                <h1> My grade calculator</h1>
            </div>
            <div class="col-4 offset-4">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name_of_user">name</label>
                        <input type="text" name="name_of_user" id="national_id" class="form-control" placeholder="enter name" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="number_of_products">number of products</label>
                        <input type="number" max=10 min=0 name="number_of_products" id="national_id" class="form-control" placeholder="enter number products" aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                        <label for="city">Choose a car:</label>
                        <select id="city" name="city">
                            <option value="cairo">cairo</option>
                            <option value="giza">giza</option>
                            <option value="alex">alex</option>
                            <option value="others">others</option>
                        </select>
                    </div>

                    <button class="btn btn-outline-danger form-control my-3"> Generate </button>

                </form>

                <form action="result.php" method="POST">
                    <?php if ($quantity > 0) {
                        for ($i = 0; $i < $quantity; $i++) { ?>
                            <label> product <?= $i ?></label>
                            <br>
                            <div class="form-group">
                                <label for=<?= "product" . "{$i}" . "name" ?>> product <?= $i ?> name</label>
                                <input type="text" name=<?= "product" . "{$i}" . "name" ?> id="national_id" class="form-control" placeholder="enter product name" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for=<?= "product" . "$i" . "price" ?>> product <?= $i ?> price</label>
                                <input type="number" name=<?= "product" . "$i" . "price" ?> id="national_id" class="form-control" placeholder="enter product price" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for=<?= "product" . "$i" . "quantity" ?>> product <?= $i . " " ?> quantity</label>
                                <input type="number" name=<?= "product" . "$i" . "quantity"  ?> id="national_id" class="form-control" placeholder="enter product quantity" aria-describedby="helpId">
                            </div>
                    <?php }
                        echo $quantity > 0 ? "<button class='btn btn-outline-danger form-control my-3'> submit   </button>" : "";
                    } ?>
                </form>
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