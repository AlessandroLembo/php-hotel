<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

     
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

</head>


<body>
    <div class="container mt-5">

         <table class="table">
           <thead>
               <th scope="row" class="mb-5 fs-2">HOTELS</th>
               <tr>
                 <th scope="col">#</th>

                 <!-- loop for each to print keys -->
                 <?php foreach ($hotels[0] as $key => $value ) : ?>
                    <th scope="col"><?= $key ?></th>
                 <?php endforeach; ?>
               </tr>
           </thead>
        
         <!-- loop for to print 5 rows -->
         <tbody>
           <?php for ($i = 0; $i < count($hotels); $i++) : ?>
           
             <tr>
               <th scope="row"><?= $i + 1 ?></th>

               <!-- loop for to print value -->
               <?php foreach ($hotels[$i] as $key => $value) : ?>
                   <td><?= $value ?></td>
               <?php endforeach; ?>  
             </tr>
           
           <?php endfor; ?>
        </tbody>

         </table>
    </div>
    
</body>
</html>