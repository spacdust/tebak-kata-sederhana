<?php
session_start();


if (!isset($_SESSION['word'])) {
    die("Sesi tidak ditemukan. Silakan mulai ulang permainan.");
}

$word = $_SESSION['word'];
$letters = str_split($word);
$length = count($letters);
$poin = 0;
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
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['letter']) && is_array($_POST['letter'])) {
                $user_letters = array_map('strtoupper', $_POST['letter']);


                if (count($user_letters) != $length) {
                    die("Jumlah huruf yang dimasukkan tidak sesuai.");
                }


                $result = [];
                for ($i = 0; $i < $length; $i++) {
                    if ($i === 2 || $i === 6) {
                        $result[$i] = "<span style='color: green;'>{$user_letters[$i]}</span>";
                    } else {
                        if ($user_letters[$i] == $letters[$i]) {
                            $poin += 10;
                            $result[$i] = "<span style='color: green;'>{$user_letters[$i]}</span>";
                        } else {
                            $poin += -2;
                            $result[$i] = "<span style='color: red;'>{$user_letters[$i]}</span>";
                        }
                    }
                }

                echo "<h2>Hasil Tebakan</h2>";
                echo "<h4>Poin:" . $poin . "</h4>";
                echo "<div class='textbox-container'>";

                foreach ($result as $char) {
                    echo "<div style='width:40px; height:40px; display:flex; align-items:center; justify-content:center; border:1px solid #000; font-size:24px;'>$char</div>";
                }
                echo "</div>";


                if ($user_letters === $letters) {
                    echo "<h3>Selamat! Anda menebak kata dengan benar: <strong>$word</strong></h3>";
                    echo "<div class='button-group'>";
                    echo "<button><a href='index.php'>Ulangi</a></button>";
                    echo "<button id='showPopup'>Simpan Poin</button>";
                    echo "</div>";

                    session_destroy();
                } else {
                    echo "<p>Silakan coba lagi.</p>";
                    echo "<div class='button-group'>";
                    echo "<button><a href='index.php'>Ulangi</a></button>";
                    echo "<button id='showPopup'>Simpan Poin</button>";
                    echo "</div>";

                    session_destroy();
                }
            } else {
                echo "Tidak ada input yang diterima.";
            }
        } else {
            echo "Akses tidak sah.";
        }
        ?>
    </div>
    <div id="popup" class="popup">
        <div class="popup-content">
            <span id="closePopup" class="close-popup">&times;</span>
            <h3>Simpan Poin</h3>
            <p>Silahkan isi nama anda.</p>
            <form action="savepoint.php" method="POST">
                <input type="text" name="nama" placeholder="Nama" required>
                <input type="hidden" name="poin" value="<?php echo $poin; ?>">
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</body>
<script>
    var showPopupButton = document.getElementById('showPopup');
    var popup = document.getElementById('popup');
    var closePopupButton = document.getElementById('closePopup');

    showPopupButton.addEventListener('click', function() {
        popup.style.display = 'block';
    });

    closePopupButton.addEventListener('click', function() {
        popup.style.display = 'none';
    })
</script>

</html>