<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Option Dropdown</title>
</head>
<body>
    <style>
        body {
            font-size: 2em;
        }
        .container {
            display: grid;
            grid-template-rows: repeat(2, 1fr);
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 6rem;
            padding: 5rem;
            border: 1px solid #ccc;
            justify-content: space-evenly;
        }
        select {
            font-size: 1em;
        }
    </style>

    <div class="container">
        <div>Selected From Array</div>
        <div>Selected From DB Record</div>
        <div>
            <?php
                $selected = "Adult";
                $options = array('Comedy', 'Adventure', 'Drama', 'Crime', 'Adult', 'Horror');
                echo "<select>";
                foreach($options as $option){
                    if($selected == $option) {
                        echo "<option selected='selected' value='$option'>$option</option>";
                    }
                    else {
                        echo "<option value='$option'>$option</option>";
                    }
                }
                echo "</select>";
            ?>
        </div>
        <div>
        
        <?php
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', 'password');
        define('DB_NAME', 'phplearning');

        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if($link === false){
            die("Error: Could not connect." . mysqli_connect_error());
        }

        if(isset($_GET['category'])){
            $categoryName = $_GET['category'];

            $sql = "SELECT * FROM categories WHERE id = $categoryName";
            if($result = mysqli_query($link, $sql)) {
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)){
                        $dbselected = $row['category'];
                    }
                    // Function frees the memory associated with the result
                    mysqli_free_result($result);
                }
                else {
                    echo "Something went wrong...";
                }
            }
            else {
                echo "ERROR: Could not execute $sql." . mysql_error($link);
            }
        }

        $options = array('Comedy', 'Adventure', 'Drama', 'Crime', 'Adult', 'Horror');
        echo "<select>";
        foreach($options as $option){
            if($dbselected == $option) {
                echo "<option selected='selected' value='$option'>$option</option>";
            }
            else {
                echo "<option value='$option'>$option</option>";
            }
        }
        echo "</select>";
        ?>
        
        </div>
    </div>
</body>