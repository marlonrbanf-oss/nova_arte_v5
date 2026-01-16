<?php
include_once("config.php");
date_default_timezone_set('America/Sao_Paulo');

// Capturando as variáveis do ambiente Railway
$host    = getenv('MYSQLHOST');
$banco   = getenv('MYSQLDATABASE');
$usuario = getenv('MYSQLUSER');
$senha   = getenv('MYSQLPASSWORD');
$porta   = getenv('MYSQLPORT');

// Verificação de segurança: se o host estiver vazio, algo está errado nas variáveis
if (!$host) {
	die("Erro crítico: As variáveis de ambiente do Railway não foram detectadas no serviço web.");
}

try {
	// No Railway, usamos o DSN completo para evitar falhas de porta ou host
	$dsn = "mysql:host=$host;port=$porta;dbname=$banco;charset=utf8";
	$pdo = new PDO($dsn, $usuario, $senha);

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	// Exibe o erro detalhado para sabermos se é senha ou host
	echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
}
