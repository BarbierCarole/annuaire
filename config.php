<?php

// const MYSQL_HOST = 'localhost';
// const MYSQL_PORT = 3306;
// const MYSQL_NAME = 'lzfw2493_annuaire';
// const MYSQL_CHARSET = 'utf8';
// const MYSQL_USER = 'lzfw2493_annuaire';
// const MYSQL_PASSWORD = 'Carole83*';


const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 'repertoire';
const MYSQL_CHARSET = 'utf8';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = '';

try {
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $exception) {
    // die('Erreur : '.$exception->getMessage());
    die('Impossible de se connecter à la base');
}
