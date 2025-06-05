<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2><i>Koło szachowe gambit piona</i></h2>
    </header>
    <section id="left">
        <h4>Polecane linki</h4>
        <ul>
            <li><a href="kw1.png">kwerenda1</a></li>
            <li><a href="kw2.png">kwerenda2</a></li>
            <li><a href="kw3.png">kwerenda3</a></li>
            <li><a href="kw4.png">kwerenda4</a></li>
        </ul>

        <img src="logo.png" alt="Logo koła">
    </section>
    <section id="right">
        <h3>Najlepsi gracze naszego koła</h3>
        <table>
            <tr>
                <th>Pozycja</th>
                <th>Pseudonim</th>
                <th>Tytuł</th>
                <th>Ranking</th>
                <th>Klasa</th>
            </tr>
        

            <?php 
                $conection = mysqli_connect('localhost', 'root', '', 'szachy');
                if(!$conection){
                    die("błąd łączenia z bazą danych : " . mysqli_error($conection));
                }
                $query = 'SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC';

                $return = mysqli_query($conection, $query);

                $i = 1;
                    while ($row = $return->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $row["pseudonim"] . "</td>";
                        echo "<td>" . $row["tytul"] . "</td>";
                        echo "<td>" . $row["ranking"] . "</td>";
                        echo "<td>" . $row["klasa"] . "</td>";
                        echo "</tr>";
                        $i++;
                    }
                    echo "<tr>";
                    echo "</tr>";

        ?>
        </table>
        

        <form action="szachy.php" method="post">
            <input type="submit" value="Losuj nową parę graczy" id="losuj" name="losuj">
            <?php 
                
                if (isset($_POST['losuj'])) {
                    $sql = "SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
                    $return = $conection->query($sql);
                    echo "<h4>";
                    while ($row = $return->fetch_assoc()) {
                        echo $row["pseudonim"]." ".$row['klasa']." ";
                    }
                    echo "</h4>";
                }
            ?>
             
        </form>
        <br>
        <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
    </section>
    <footer>
        <p>Stronę wykonał: Juliusz Jaszczyk</p>
    </footer>
</body>
</html>