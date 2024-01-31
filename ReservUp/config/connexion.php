<?php
try {
    $access = new pdo("mysql:host=localhost;dbname=reservationnew;charset=utf8", "root", "");
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
    $e->getMessage();
}
