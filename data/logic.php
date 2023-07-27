<?php

require_once __DIR__ . '/../conn_db.php';

require_once __DIR__ . '/data.php';


// array vuoto che riempio con le votazioni di ogni hotel
$arrayStars = [];

// dichiaro un array vuoto per poi riempirlo aggiornato al valore della proprietà 'parking'
$updateHotels = [];

// giro sull'array di hotel
foreach ($hotels as $hotel) {

    // giro sull'array stars e controllo quante stelle 'piene' e quante 'vuote' pushare nell'array dichiarato vuoto in precedenza
    foreach ($stars as $star) {

        // ternario per controllare quante e quali stelle inserie nell'array
        $hotel['Vote'] >= $star['star'] ? array_push($arrayStars, '<i class="fa-solid fa-star" style="color: #c1ad49;"></i>') : array_push($arrayStars, '<i class="fa-regular fa-star" style="color: #c1ad49;"></i>');
    }

    // converto l'array in stringa
    $starString = implode($arrayStars);

    // salvo in una variabile il valore nuovo assegnato alla proprietà 'vote'
    $starsVote = array('Vote' => $starString);

    // sostituisco a tutti gli hotels il booleano del voto con la stringa di stelle
    $hotel = array_replace($hotel, $starsVote);

    // elimino lo zero decimale dalla proprietà distanza
    $floatDistance = floatval($hotel['Distance']);

    // aggiungo una stringa al voto
    $floatDistance .= ' Km';

    // cambio la proprietà Distance degli hotels con la variabile senza lo zero decimale
    $replaceDistance = array('Distance' => $floatDistance);
    $hotel = array_replace($hotel, $replaceDistance);

    // In base alla disponibilità di parcheggio uso il metodo array_replace per cambiare la proprietà 'parking' del singolo hotel
    $hotel['Parking'] == true ? $replacements = array('Parking' => '<i class="fa-solid fa-circle-check" style="color: #269c3d;"></i>') : $replacements = array('Parking' => '<i class="fa-solid fa-circle-xmark" style="color: #d90d0d;"></i>');
    $hotel = array_replace($hotel, $replacements);

    // inserisco nell'array gli hotel con la proprietà 'parking' aggiornata
    array_push($updateHotels, $hotel);

    // svuoto l'array per riempirlo di stelle del prossimo hotel su cui giro
    $arrayStars = [];
}
