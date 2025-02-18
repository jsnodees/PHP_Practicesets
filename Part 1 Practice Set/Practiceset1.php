<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Triangle Area Calculator</title>
</head>
<body>
    <h2>Enter the sides of the triangle:</h2>
    <form method="POST">
        <input type="number" name="a" step="0.01" required placeholder="Side 1"><br><br>
        <input type="number" name="b" step="0.01" required placeholder="Side 2"><br><br>
        <input type="number" name="c" step="0.01" required placeholder="Side 3"><br><br>
        <input type="submit" name="calculate" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];

        if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
            $s = ($a + $b + $c) / 2;
            $area = ($s * ($s - $a) * ($s - $b) * ($s - $c)) ** 0.5;
            echo "<h3>Area: " . number_format($area, 2) . " square units</h3>";
        } else {
            echo "<h3 style='color: red;'>Invalid triangle!</h3>";
        }
    }
    ?>
</body>
</html>
