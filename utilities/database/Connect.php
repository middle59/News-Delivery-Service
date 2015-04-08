<?php

// NOTE: this file has a password, and so should not be world-readable.
// Usually it would be mode 600, with a ACL permitting the webserver in.
// But it's like this because you have to use it as sample code.
//
// YOURS should also have ME listed on the ACL so I can read it without
// having to use administrative access.

// ConnectDB() - takes no arguments, returns database handle
// USAGE: $dbh = ConnectDB();
function ConnectDB() {

    /*** mysql server info ***/
    $hostname = '127.0.0.1';
    $username = 'middle59';
    $password = 'admin';
    $dbname   = 'middle59';

    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=$dbname",
                       $username, $password);
        //echo "<p>We established dbh.</p>";

    } catch(PDOException $e) {
        echo $e->getMessage();
        die ('PDO error in "ConnectDB()": ' . $e->getMessage() );
    }

    return $dbh;
}

?>

