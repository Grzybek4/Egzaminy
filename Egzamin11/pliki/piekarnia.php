<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <img src="wypieki.png" alt="Produkty naszej piekarni">
    <nav>
        <a href="kw1.png">KWERENDA1</a>
        <a href="kw2.png">KWERENDA2</a>
        <a href="kw3.png">KWERENDA3</a>
        <a href="kw4.png">KWERENDA4</a>
    </nav>
    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i 
            zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>
    <main>
        <h4>Wybierz rodzaj wypieków:</h4>
        <form method="post" action="piekarnia.php">
            <select name="rodzaj" id="rodzaj">
                <?php 
                    $conn = mysqli_connect('localhost', 'root', '', 'piekarnia');
                    $query1 = 'SELECT DISTINCT Rodzaj FROM wyroby';
                    $result1 = mysqli_query($conn, $query1);
                    while($row = mysqli_fetch_array($result1)){
                        echo("<option value='" . $row[0] . "'>" . $row[0] . "");
                    }
                ?>
            </select>
            <button type="submit">Wybierz</button>
        </form>
        <table>
            <tr>
                <th>Rodzaj</th><th>Nazwa</th><th>Gramatula</th><th>Cena</th>
            </tr>
            <?php 
                $rodzaj = $_POST['rodzaj'];
                $query2 = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$rodzaj'";
                $result2 = mysqli_query($conn, $query2);
                while($row = mysqli_fetch_row($result2)){
                    echo("<tr>");
                    echo("<td>" . $row[0] . "</td>");
                    echo("<td>" . $row[1] . "</td>");
                    echo("<td>" . $row[2] . "</td>");
                    echo("<td>" . $row[3] . "</td>");
                    echo("</tr>");
                }
            ?>
        </table>
    </main>
    <footer>
        <p>AUTOR: Juliusz Jaszczyk</p>
        <p>DATA: 8.06.2025</p>
    </footer>
</body>
</html>