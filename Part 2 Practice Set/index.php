<?php

require_once 'process.php';

$stopWords = stopsWord();
$text = InputText();
$sortOrder = $_POST['sort'] ?? 'desc';
$limit = $_POST['limit'] ?? 10;

if (!empty($text)) {
    $words = wordText($text);

    $wordCount = calculatedWordFrequencies($words, $stopWords);

    $sortedWord = sortWords($wordCount, $sortOrder);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h1>Word Frequency Counter</h1>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" required></textarea><br><br>
        
        <label for="sort">Sort by frequency:</label>
        <select id="sort" name="sort">
        <option value="asc" <?php if ($sortOrder === 'asc') echo 'selected'; ?>>Ascending</option>
        <option value="desc" <?php if ($sortOrder === 'desc') echo 'selected'; ?>>Descending</option>
        </select><br><br>
        
        <label for="limit">Number of words to display:</label>
        <input type="number" id="limit" name="limit" value="10" min="1"><br><br>
        
        <input type="submit" name="calculatedWF" value="Calculate Word Frequency">
        </form>

<?php if (!empty($text)): ?>
    <div class="results">
        <h2>Word Frequency Results</h2>
        <table>
            <thead>
            <tr>
                <th>Word</th>
                <th>Frequency</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            foreach ($sortedWord as $word => $frequency) {
                echo "<tr>";
                echo "<td>$word</td>";
                echo "<td>$frequency</td>";
                echo "</tr>";
                $count++;
                if ($count >= $limit) {
                    break;
                }
            }
            ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

</body>
</html>
