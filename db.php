<?php

// ToDo : Vérifier que la connexion est OK
$db = new PDO("mysql:host=127.0.0.1:51033;port=5433;dbname=localdb","azure","6#vWHD_$");

// Pour éviter d'avoir à réutiliser "global" par la suite
function db() { global $db; return $db; }
