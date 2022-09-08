<?php

// dynamic table
// dynamic rows //4 
// dynamic columns // 4
// check if gender of user == m ==> male // 1
// check if gender of user == f ==> female // 1

$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "lib" => 'reading',
            "school" => 'drawing',
            'home' => 'painting'
        ],
        // 'phones' => [012312312, 1231513513, 89746543],
        // 'phone' => null,
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        // 'phones' => [1231513513, 89746543],
        // 'phone' => null,
    ],
    (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        // 'phones' => [],
        // 'phone' => 125487851555,
    ],
    // (object)[
    //     'id' => 3,
    //     'name' => 'menna',
    //     "gender" => (object)[
    //         'gender' => 'f'
    //     ],
    //     'hobbies' => [
    //         'running',
    //     ],
    //     'activities' => [
    //         "school" => 'painting',
    //         'home' => 'drawing'
    //     ],
    //     'phones' => [],
    //     'phone' => 125487851555,
    // ],
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <table class="table ">
        <thead>
            <tr>

                <th scope="col">user_data</th>
                <?php foreach ($users[0] as $col_key => $col_param) { ?>
                    <th scope="col"><?= $col_key ?></th>
                <?php } ?>

            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($users); $i++) { ?>
                <tr>
                    <th scope="row"><?= "user_{$i}" ?></th>
                    <?php
                    $col_arrays = $users[$i];
                    foreach ($col_arrays as $col_key => $col_param) { ?>
                        <td>
                            <?php
                            if (gettype($col_param) == "object" || gettype($col_param) == "array") {
                                // echo $col_key . "    :  " . "<br>";
                                foreach ($col_param  as $level_two_key => $level_two_value) {
                                    if ($level_two_key == "gender") {
                                        $level_two_value =    $level_two_value == "m" ? "Male" : "Fmale";
                                    }
                                    echo  $level_two_key . "     :     " . $level_two_value  . "<br>";
                                }
                            } else {
                                echo $col_key . "   : " . $col_param;
                            }

                            ?>
                        </td>
                    <?php } ?>

                </tr>
            <?php  } ?>

        </tbody>
    </table>
</body>

</html>