<?php

session_start();

include 'db/connection.php';

$sql = "SELECT * FROM master_kata ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$word = strtoupper($row['kata']);
$clue = $row['clue'];
$_SESSION['word'] = $word;

$conn->close();

$length = strlen($word);
// echo "length:. $length ."
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="center">
        <div>
            <h1>Permainan Asah Otak</h1>
            <p>Sebuah permainan melengkapi kata sederhana</p>
        </div>
        <div class="quiz">
            <h2>Clue:</h2>
            <?php

            echo "<h3>" . $clue . "</h3>";

            ?>
        </div>
        <div>
            <form action="process.php" method="post" class="form">
                <div class="textbox-container">
                    <?php
                    for ($i = 0; $i < $length; $i++) {
                        //huruf ke 3 dan 7 (-1 karna dari 0)
                        if ($i == 2 || $i == 6) {
                            echo '<input readonly type="text" name="letter[]" maxlength="1" value="' . $word[$i] . '">';
                        } else {
                            echo '<input type="text" name="letter[]" maxlength="1" required>';
                        }
                    }
                    ?>
                </div>
                <button class="btn-submit" type="submit">Jawab</button>
            </form>
        </div>
    </div>

</body>

</html>