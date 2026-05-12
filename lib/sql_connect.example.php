<?php

// Copy this file to `sql_connect.php` and fill in your MySQL credentials.
// `sql_connect.php` is gitignored so passwords are never committed.

if (!defined('CLAMA_ARTICLE_PUBLISH_WEB_ID')) {
    define('CLAMA_ARTICLE_PUBLISH_WEB_ID', 'your-domain.example');
}

$servername = 'localhost';
$database = 'your_database';
$username = 'your_user';
$password = 'your_password';
$conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Optional second MySQL database for scientific-article wizard drafts (see sql/article_builder_drafts.sql).
$database_article_builder = '';
$builder_dbname = trim((string) $database_article_builder) !== '' ? trim($database_article_builder) : $database;
$conn_builder = new PDO("mysql:host=$servername;dbname=$builder_dbname;charset=utf8mb4", $username, $password);
$conn_builder->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
