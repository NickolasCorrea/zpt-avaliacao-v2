<?php
require_once './User.php';
require_once './Company.php';
require_once './Department.php';

function setDb($entity, $db) {
    if (!method_exists($entity, 'setDb')) {
        throw new Exception('Método setDb não encontrado.');
    }
    
    $entity->setDb($db);
}