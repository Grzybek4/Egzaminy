<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header>
        <section id="header1">
            <img src="logo1.png" alt="lipiec">
        </section>
        <section id="header2">
            <h1>TERMINARZ</h1>
            <p>najbliższe zadania:</p>
            <?php
                echo "<p>nabliższe zadania: ";
                $conn = mysqli_connect('localhost', 'root', '', 'terminarz');
                if(!$conn){
                    die("Błąd w połączeniu:" . mysqli_error($conn));
                }
                $query = "SELECT DISTINCT wpis FROM zadania WHERE dataZadania <= '2020-07-07' AND wpis <> '';";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result)){
                    echo("$row[0]; ");
                }
            ?>
        </section>
    </header>
    <main>
        <?php
            $query2 = "SELECT dataZadania, wpis FROM zadania WHERE miesiac='lipiec';";
            $result2 = mysqli_query($conn, $query2);
            while($row2 = mysqli_fetch_array($result2)){
                echo("<section id='block'>");
                echo "<h6>$row2[0]</h6>";
                echo "<p>$row2[1]</p>";
                echo("</section>");
            }
            mysqli_close($conn);
        ?>
    </main>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>stronę wykonał: 07292203474</p>
    </footer>
</body>
</html>