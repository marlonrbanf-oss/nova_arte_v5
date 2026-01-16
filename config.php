<?php

$email_adm = 'marlonrbanf@gmail.com';

// 1. Ajuste da URL do Site
// Se existir a variável MYSQLHOST (Railway), usamos a URL da nuvem.
// Caso contrário, usamos o seu caminho do localhost.
if (getenv('MYSQLHOST')) {
    $url_site = 'https://web-production-84e3c.up.railway.app/';
} else {
    $url_site = 'http://localhost/sites/Template%20Nova%20arte/Template%20Inicial/site/';
}

// 2. Dados de Conexão (Plano B para o Localhost)
$banco   = 'delivery';
$host    = 'localhost';
$usuario = 'root';
$senha   = '';
