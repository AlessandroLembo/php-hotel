<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere vista sul mare',
        'parking' => true,
        'vote' => 4,
        'distance' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro all\'avanguardia',
        'parking' => true,
        'vote' => 2,
        'distance' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare a due passi',
        'parking' => false,
        'vote' => 1,
        'distance' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista anche di notte',
        'parking' => false,
        'vote' => 5,
        'distance' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano centro storico',
        'parking' => true,
        'vote' => 2,
        'distance' => 50
    ],

];

// array sul quale girare per mostrare il voto dell'hotel sottoforma di stelline
$stars = [
    [
        'star' => 1,
    ],
    [
        'star' => 2,
    ],
    [
        'star' => 3,
    ],
    [
        'star' => 4,
    ],
    [
        'star' => 5,
    ],

];

// array vuoto che riempio con le votazioni d ogni hotel
$arrayStars = [];

// dichiaro un array vuoto per poi riempirlo aggiornato al valore della proprietà 'parking'
$updateHotels = [];

// giro sull'array di hotel
foreach ($hotels as $hotel) {

    // giro sull'array stars e controllo quante stelle 'piene' e quante 'vuote' pushare nell'array dichiarato vuoto in precedenza
    foreach ($stars as $star) {

        // ternario per controllare quante e quali stelle inserie nell'array
        $hotel['vote'] >= $star['star'] ? array_push($arrayStars, '<i class="fa-solid fa-star" style="color: #c1ad49;"></i>') : array_push($arrayStars, '<i class="fa-regular fa-star" style="color: #c1ad49;"></i>');
    }

    // converto l'array in stringa
    $starString = implode($arrayStars);

    // salvo in una variabile il valore nuovo assegnato alla proprietà 'vote'
    $starsVote = array('vote' => $starString);

    // sostituisco a tutti gli hotels il booleano del voto con la stringa di stelle
    $hotel = array_replace($hotel, $starsVote);



    // aggiungo una stringa al voto
    $hotel['distance'] .= ' Km';

    // In base alla disponibilità di parcheggio uso il metodo array_replace per cambiare la proprietà 'parking' del singolo hotel
    $hotel['parking'] == true ? $replacements = array('parking' => '<i class="fa-solid fa-circle-check" style="color: #269c3d;"></i>') : $replacements = array('parking' => '<i class="fa-solid fa-circle-xmark" style="color: #d90d0d;"></i>');
    $hotel = array_replace($hotel, $replacements);

    // inserisco nell'array gli hotel con la proprità 'parking' aggiornata
    array_push($updateHotels, $hotel);

    // svuoto l'array per riempirlo di stelle del prossimo hotel su cui giro
    $arrayStars = [];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
    <div id="background">
        <div class="container pt-5">

            <table class="table">
                <thead>
                    <th scope="row" class="mb-5 fs-2 custom-text">HOTELS</th>
                    <tr>
                        <th scope="col" class="custom-text"></th>

                        <!-- loop for each to print keys -->
                        <?php foreach ($hotels[0] as $key => $value) : ?>
                            <th scope="col" class="custom-text"><?= $key ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>

                <!-- loop for to print 5 rows -->
                <tbody>
                    <?php for ($i = 0; $i < count($hotels); $i++) : ?>

                        <tr class="row-hotel">
                            <th scope="row" class="custom-text"><?= $i + 1 ?></th>

                            <!-- loop for to print value -->
                            <?php foreach ($updateHotels[$i] as $key => $value) : ?>
                                <td class="custom-text"><?= $value ?></td>
                            <?php endforeach; ?>
                        </tr>

                    <?php endfor; ?>
                </tbody>

            </table>
        </div>

    </div>
</body>

</html>