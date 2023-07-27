<?php

// preparo le informazioni di connessione

const DB_SERVERNAME = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'root';
const DB_NAME = 'hotels';

// costrutto Try Cacth: nel try metto il tentativo di connessione, se non ci riesco entro nel catch (catturo l'eccezione, l'errore) blocco tutto
try {
    // usiamo queste informazioni salvate nelle variabili sopra e le usiamo per connetterci passandole a Mysqli
    $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME); // in questo modo sto dicendo di aprire la connessione al database

} catch (Exception $e) {
    // in questo caso decido di stampare un messaggio di errore in pagina
    echo $e->getMessage();
    die();
}


// query per interrogare il database
// faccio un altro try catch perchè catturare l'erroe in caso di query sbagliata
try {
    // tento la query alla tabella hotel del database al uale ci siamo connessi
    $sql = "SELECT `Name`, `Description`, `Parking`, `Vote`, `Distance` FROM `hotel`";

    // raccolgo il risultato della query
    $result = $conn->query($sql);

    if ($result->num_rows) {
        $hotels = [];
        // ...ho trovato almeno un risultato
        // ciclo per stampare i risultati
        while ($row = $result->fetch_assoc()) {
            array_push($hotels, $row);
        }
    } else {
        // non ci sono risultati
    }
} catch (Exception $e) {
    // errore nella query, lo stampo in pagina e blocco con die().
    echo $e->getMessage();
    die();
}

// chiudo la connessione
$conn->close();
