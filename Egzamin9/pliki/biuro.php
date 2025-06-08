<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl9.css">
</head>
<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <section id="lewy">
        <h2>Promocje</h2>
        <table>
            <tr>
                <td>Warszawa</td><td>od 600 zł</td>
            </tr>
            <tr>
                <td>Wenecja</td><td>od 1200 zł</td>
            </tr>
            <tr>
                <td>Paryż</td><td>od 1200 zł</td>
            </tr>
        </table>
    </section>
    <section id="srodkowy">
        <h2>W tym roku jedziemy do...</h2>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'podroze');
            $query1 = 'SELECT zdjecia.nazwaPliku, zdjecia.podpis FROM zdjecia ORDER BY zdjecia.podpis ASC;';
            $result1 = mysqli_query($conn, $query1);
            while($row = mysqli_fetch_array($result1)){
                echo("<img src='" . $row[0] . "' alt='" . $row[1] . "'>");
            }
        ?>
    </section>
    <section id="prawy">
        <h2>Kontakt</h2>
        <a href="biuro@wycieczki.pl">napisz do nas</a>
        <p>telefon: 444555666</p>
    </section>
    <main>
        <h3>
            W poprzednich latach byliśmy...
        </h3>
        <ol>
            <?php 
                $query2 = 'SELECT wycieczki.cel, wycieczki.dataWyjazdu FROM wycieczki WHERE wycieczki.dostepna = FALSE;';
                $result2 = mysqli_query($conn, $query2);
                while($row = mysqli_fetch_array($result2)){
                    echo("<li>");
                    echo("Dnia ");
                    echo($row[1]);
                    echo(" pojechaliśmy do ");
                    echo($row[0]);
                }
                mysqli_close($conn);
            ?>
        </ol>
    </main>
    <footer>
        <p>Stronę wykonał: Juliusz Jaszczyk</p>
    </footer>
</body>
</html>