<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array of Fruits</title>
</head>
<body>

<h2>List of Fruits</h2>
    <ol>
        <?php
        $fruits = ["Apple", "Banana", "Mango", "Orange", "Grapes"];
        for ($i = 0; $i < count($fruits); $i++) {
            echo "<li>" . $fruits[$i] . "</li>";
        }
        ?>
    </ol>

</body>
</html>