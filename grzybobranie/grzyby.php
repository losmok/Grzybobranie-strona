<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grzybobranie</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="title">
        <br>
        <h1>Czas na grzyby!</h1>
    </div>
    <div class="miniaturka">
        <a href="podgrzybek.jpg"><img src="podgrzybek-miniatura.jpg" alt="Grzybobranie"></a>
    </div>
    <div class="left">
        <h3>Grzyby jadalne</h3>
        <!-- Script -->
        <?php 
            $con = mysqli_connect("localhost","root","","grzybobranie");
            $zapytanie = "SELECT `id`, `nazwa`, `potoczna` FROM `grzyby` WHERE `jadalny` = 1;";
            $odpowiedz = mysqli_query($con, $zapytanie);
            while ($result = mysqli_fetch_row($odpowiedz)) {
                echo "<p>$result[0]. $result[1]. ($result[2])</p><br>";
            }
        ?>
        <h3>Polecamy do zakupu</h3>
        <ul>
            <!-- Script2 -->
            <?php 
                $con = mysqli_connect("localhost","root","","grzybobranie");
                $zapytanie1 = "SELECT `potoczna`, rodzina.nazwa FROM `grzyby` JOIN `rodzina` ON grzyby.rodzina_id = rodzina.id WHERE potrawy_id = 4;";
                $odpowiedz1 = mysqli_query($con, $zapytanie1);
                while ($result1 = mysqli_fetch_row($odpowiedz1)) {
                    echo "<li>$result1[0]., rodzina: $result1[1].</li>";
                }
            ?>
        </ul>
    </div>
    <div class="right">
        <!-- Script3 -->
        <?php 
            $con = mysqli_connect("localhost","root","","grzybobranie");
            $zapytanie2 = "SELECT `nazwa_pliku`, `nazwa` FROM `grzyby`;";
            $odpowiedz2 = mysqli_query($con, $zapytanie2);
            while ($result2 = mysqli_fetch_row($odpowiedz2)){
                echo "
                    <img src='$result2[0]' title='$result2[1]'>
                ";
            }
            mysqli_close($con);
        ?>
    </div>
    <div class="footer">
        <p>Autor: Paweł Lewandowski</p>
    </div>
</body>
</html>