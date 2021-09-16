<?php
try {
    $user = 'root';
    $log = new PDO('mysql:host=localhost;dbname=projet_gite;charset=utf8', $user);
        } catch (PDOException $e) {
            print "Erreur: " . $e->getMessage() . "<br/>";
            die();
    }