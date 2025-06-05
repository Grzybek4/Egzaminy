<?php
    $connect = mysqli_connect("localhost", "root", "", "zawody_wędkarskie");
    if(!$connect){
        die("Błąd połączenia" . mysqli_connect_error());
    }
    
    $lowisko = $_POST['lowisko'];
    $data = $_POST['data'];
    $sedzia = $_POST['sedzia'];
    $id_lowisko = 0;

    if($lowisko == "Zalew Wegrowski"){
        $id_lowisko = 1;
    }elseif($lowisko == "Zbiornik Bukowka"){
        $id_lowisko = 2;
    }elseif($lowisko == "Jeziorko Bartbetowskie"){
        $id_lowisko = 3;
    }elseif($id_lowisko == "Warta-Obrzycko"){
        $id_lowisko = 4;
    }elseif($lowisko == "Stawy Milkow"){
        $id_lowisko = 5;
    }elseif($lowisko == "Przemsza k. Okradzinowa"){
        $lowisko = 6;
    }else{
        return 0;
        die();
    }

    $zapytanie = "INSERT INTO `zawody_wedkarskie`(Karty_wedkarskie_id, Lowisko_id, data_zawodow, sedzia) VALUES (0, '$lowisko', '$data', '$sedzia')";
    $wynik = mysqli_query($connect, $zapytanie);
    if($wynik){
        echo "Dane zostały zapisane!";
    } else {
        echo "Błąd zapisu: " . mysqli_error($connect);
    }

    
?>