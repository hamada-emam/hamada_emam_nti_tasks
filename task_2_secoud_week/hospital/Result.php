<?php






session_start();

// echo $_SESSION['phone_number'];
// echo "<br>";
// echo  $_POST['value_rate1'];
// echo "<br>";
// echo  $_POST['value_rate2'];
// echo "<br>";
// echo   $_POST['value_rate3'];
// echo "<br>";
// echo  $_POST['value_rate4'];
// echo "<br>";
// echo  $_POST['value_rate5'];

// echo "<br>";


?>

<!doctype html>
<html lang="en">

<head>
    <title>rating</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>



    <?php

    if ($_POST['value_rate1'] == 0) {
        echo "<table class='table'>
                    <thead>
                        <tr>
                        <th scope='col'>Review</th>
                        <th scope='col'>question</th>
                        
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>سئ</td>
                        <td>هل انت راضي علي الهدوء بالمستشفي؟</td>
                    
                    <br>";
    } elseif ($_POST['value_rate1'] == 3) {
        echo "<table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>Review</th>
                        <th scope='col'>question</th>
                        
                    
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                         <td>جيد</td>
                        <td>هل انت راضي علي الهدوء بالمستشفي؟</td>
                       
                    <br>";
    } elseif ($_POST['value_rate1'] == 5) {
        echo "<table class='table'>
                    <thead>
                        <tr>
                        
                        <th scope='col'>Review</th>
                        <th scope='col'>question</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                         <td>جيد جدا </td>
                        <td>هل انت راضي علي الهدوء بالمستشفي؟</td>
                       
                    <br>";
    } else {
        echo "<table class='table'>
                    <thead>
                        <tr>
                        
                        <th scope='col'>Review</th>
                        <th scope='col'>question</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>ممتاز</td>
                        <td>هل انت راضي علي الهدوء بالمستشفي؟</td>
                        
                    <br>";
    }
    /////////////////////////////
    if ($_POST['value_rate2'] == 0) {
        echo " <tr>
                    <td>سئ</td>    
                    <td>هل انت راضي علي اسعار الخدمات؟</td>
                    
                    <br>";
    } elseif ($_POST['value_rate2'] == 3) {
        echo " <tr>
                           <td>جيد</td> 
                    <td>هل انت راضي علي اسعار الخدمات؟</td>
                
                    <br>";
    } elseif ($_POST['value_rate2'] == 5) {
        echo " <tr>
                         <td>جيد جدا </td>
                    <td>هل انت راضي علي اسعار الخدمات؟</td>
                   
                    <br>";
    } else {
        echo "
                        <tr>
                        
                        <td>هل انت راضي علي اسعار الخدمات؟</td>
                        <td>excelent</td>
                    <br>";
    }
    ////////////////////////
    if ($_POST['value_rate3']  == 0) {
        echo "
                    
                        <tr>
                        <td>سئ</td>
                        <td>هل انت راضي عن خدمة التمريض؟</td>
                        
                    <br>";
    } elseif ($_POST['value_rate3'] == 3) {
        echo "
                    
                    <tr>
                        <td>جيد</td>
                        <td>هل انت راضي عن خدمة التمريض؟</td>
                    
                    <br>";
    } elseif ($_POST['value_rate3']  == 5) {
        echo "
                    
                    <tr>
                     <td>جيد جدا </td>
                    <td>هل انت راضي عن خدمة التمريض؟</td>
                   
                    <br>";
    } else {
        echo "
            <tr>
            <td>ممتاز</td>
                <td>هل انت راضي عن خدمة التمريض؟</td>
                
            <br>";
    }
    ///////////////////////////////
    if ($_POST['value_rate4'] == 0) {
        echo "
            <tr>
                <td>سئ</td>
                <td>هل انت راضي علي مستوي الدكاترة؟</td>
            
            <br>";
    } elseif ($_POST['value_rate4'] == 3) {
        echo "
            <tr>
            <td>جيد</td>
                <td>هل انت راضي علي مستوي الدكاترة؟</td>
                
            <br>";
    } elseif ($_POST['value_rate4'] == 5) {
        echo "
            <tr>
            <td>جيد جدا </td>
                <td>هل انت راضي علي مستوي الدكاترة؟</td>
                
            <br>";
    } else {
        echo "
            <tr>
             <td>ممتاز</td>
                <td>هل انت راضي علي مستوي الدكاترة؟</td>
               
            <br>";
    }
    //////////////////////////
    if ($_POST['value_rate5'] == 0) {
        echo "
            <tr>
            <td>سئ</td>
                <td>هل انت راضي علي الهدوء بالمستشفي؟</td>
                
            <br>";
    } elseif ($_POST['value_rate5'] == 3) {
        echo "
            <tr>
                <td>جيد</td>
                <td>هل انت راضي علي الهدوء بالمستشفي؟</td>
            
            <br>";
    } elseif ($_POST['value_rate5'] == 5) {
        echo "
            <tr>
                <td>جيد جدا </td>
                <td>هل انت راضي علي الهدوء بالمستشفي؟</td>
            
            <br>";
    } else {
        echo "
            <tr>
                 <td>ممتاز</td>
                <td>هل انت راضي علي الهدوء بالمستشفي؟</td>
           
            <br>";
    }
    $result = $_POST['value_rate1'] + $_POST['value_rate2'] +  $_POST['value_rate3'] + $_POST['value_rate4'] + $_POST['value_rate5'];
    if ($result < 15) {
        echo "<tr>
         <td class='bg-dark text-white'>سئ</td>
            <td class='bg-dark text-white'>total review</td>
           
            <div class='bg-dark text-white'><h1 class='text-center'>sorry we will call you in {$_SESSION['phone_number']}</h1></div> ";
    } elseif ($result < 25 && $result >= 15) {
        echo "<tr>
            <td class='bg-dark text-white'>جيد</td>
            <td class='bg-dark text-white'>total review</td>
        
            <div class='bg-dark text-white'><h1 class='text-center'>sorry we will call you in {$_SESSION['phone_number']}</h1></div> ";
    } elseif ($result < 50 && $result >= 25) {
        echo "
        <tr>
                <td class='bg-dark text-white'>جيد جدا </td>
            <td class='bg-dark text-white'>total review</td>
        
            <br>
            <div class='bg-dark text-white'><h1 class='text-center'>thanks for rating</h1></div>";
    } else {
        echo "
        <tr>
            <td class='bg-dark text-white'>ممتاز </td>
            <td class='bg-dark text-white'>total review</td>
            
            <br>
            <div class='bg-dark text-white'><h1 class='text-center'>thanks for rating</h1></div>";
    }
    ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>