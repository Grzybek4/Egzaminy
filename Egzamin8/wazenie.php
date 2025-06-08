<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section id="header_lewy">
        <h1>Ważenie pojazdów we Wrocławiu</h1>
    </section>
    <section id="header_prawy">
        <img src="obraz1.png" alt="waga">
    </section>
    <section id="lewy">
        <h2>Lokalizacje wag</h2>
        <ol>
        <?php 
            $conn = mysqli_connect('localhost', 'root', '', 'wazenietirow');
            if(!$conn){
                die("błąd połączenia z bazą, " . mysqli_error($conn));
            }
            $query1 = "SELECT lokalizacje.ulica FROM lokalizacje;";
            $result1 = mysqli_query($conn, $query1);
            for($i = 0; $i < mysqli_num_rows($result1); $i++){
                echo('<li> ulica ' . mysqli_fetch_row($result1)[0] . '</li><br>');
            }
        ?>
        </ol>
         <h2>Kontakt</h2>
         <a href="wazenie@wroclaw.pl">napisz</a>
    </section>
    <section id="srodkowy">
        <h2>Alerty</h2>
        <table>
            <tr>
                <th>rejestracja</th><th>ulica</th><th>waga</th><th>dzień</th><th>czas</th>
            </tr>
            <?php
                $query2 = 'SELECT wagi.rejestracja, wagi.waga, wagi.dzien, wagi.czas, lokalizacje.ulica 
                FROM wagi 
                INNER JOIN lokalizacje 
                ON lokalizacje.id = wagi.lokalizacje_id 
                WHERE wagi.waga <= 5';
                $result2 = mysqli_query($conn, $query2);
                $zmienna = 0;
                while($row = mysqli_fetch_array($result2)){
                    $zmienna++;
                    if($zmienna ==  mysqli_num_rows($result2)){
                        echo("<tr id='ostatni_wiersz'>");
                        echo("<td>" . $row[0] . "</td>");
                        echo("<td>" . $row[1] . "</td>");
                        echo("<td>" . $row[2] . "</td>");
                        echo("<td>" . $row[3] . "</td>");
                        echo("<td>" . $row[4] . "</td>");
                        echo("</tr>");
                    }else{
                        echo("<tr>");
                        echo("<td>" . $row[0] . "</td>");
                        echo("<td>" . $row[1] . "</td>");
                        echo("<td>" . $row[2] . "</td>");
                        echo("<td>" . $row[3] . "</td>");
                        echo("<td>" . $row[4] . "</td>");
                        echo("</tr>");
                    }
                }
                $query3 = "INSERT INTO wagi (lokalizacje_id, waga, rejestracja, dzien, czas) VALUES ('5', FLOOR(1+RAND()*10), 'DW12345', CURRENT_DATE, CURRENT_TIME)";
                $result3 = mysqli_query($conn, $query3);
                header(header: "refresh: 10");


            ?>
        </table>
    </section>
    <section id="prawy">
        <img src="obraz2.jpg" alt="tir">
    </section>
    <footer>
        <p>Stronę wykonał: Juliusz Jaszczyk</p>
    </footer>
</body>
</html>