<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="icon" href="fav.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="baner.png" alt="Mieszalnia farb">
    </header>
    <section id="formularz">
        <form method="post" action="index.php">
            <label for="data_odbioru1">Data Odbioru od: <input type="date" id="data_odbioru1" name="data_odbioru1"></label>
            <label for="data_odbioru2">do: <input type="date" id="data_odbioru2" name="data_odbioru2"></label>
            <button type="submit" name="wyszukaj" id="wyszukaj">Wyszukaj</button>
        </form>
    </section>
    <main>
        <table>
            <tr>
                <th>Nr zamówienia</th><th>Nazwisko</th><th>Imię</th><th>Kolor</th><th>Pojemność [ml]</th><th>Data odbioru</th>
            </tr>
            <tr>
                <?php
                    $connection = mysqli_connect('localhost', 'root', '', ' mieszalnia');
                    if(!$connection){
                        die("Błąd w połączeniu: " . mysqli_error($connection));
                    }
                    

                    if(isset($_POST['wyszukaj'])){
                        $data_odbioru1 = $_POST['data_odbioru1'];
                        $data_odbioru2 = $_POST['data_odbioru2'];
                        $zapytanie = 'SELECT klienci.Nazwisko, 
                                                        klienci.Imie, 
                                                        klienci.Id, 
                                                        zamowienia.kod_koloru, 
                                                        zamowienia.pojemnosc, 
                                                        zamowienia.data_odbioru 
                                                        FROM klienci 
                                                        INNER JOIN zamowienia 
                                                        ON zamowienia.id_klienta = klienci.Id 
                                                        WHERE zamowienia.data_odbioru >= "' . $data_odbioru1 . '" AND zamowienia.data_odbioru <= "' . $data_odbioru2 . '"
                                                        ORDER BY zamowienia.data_odbioru ASC';

                        $wynik = $connection->query($zapytanie);
                        while ($wiersz = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $wiersz["id"] . "</td>";
                            echo "<td>" . $wiersz["nazwisko"] . "</td>";
                            echo "<td>" . $wiersz["imie"] . "</td>";
                            echo "<td style='background-color: #".$wiersz["kod_koloru"].";'>" . $wiersz["kod_koloru"] . "</td>";
                            echo "<td>" . $wiersz["pojemnosc"] . "</td>";
                            echo "<td>" . $wiersz["data_odbioru"] . "</td>";
	                        echo "</tr>";
                        }
                        
                    }else{
                        $zapytanie = "SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci JOIN zamowienia ON klienci.id = id_klienta ORDER BY data_odbioru;";
                        $wynik = $connection->query($zapytanie);
                        while ($wiersz = $wynik->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $wiersz["id"] . "</td>";
                            echo "<td>" . $wiersz["nazwisko"] . "</td>";
                            echo "<td>" . $wiersz["imie"] . "</td>";
                            echo "<td style='background-color: #".$wiersz["kod_koloru"].";'>" . $wiersz["kod_koloru"] . "</td>";
                            echo "<td>" . $wiersz["pojemnosc"] . "</td>";
                            echo "<td>" . $wiersz["data_odbioru"] . "</td>";
                            echo "</tr>";
                    }
                };
                mysqli_close($connection);
                ?>
            </tr>
        </table>
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <br>Autor: 07292203474
    </footer>
</body>
</html>