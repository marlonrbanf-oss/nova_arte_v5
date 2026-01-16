<?php
// 1. Configurações de fuso horário
date_default_timezone_set('America/Sao_Paulo');

// 2. Definição das variáveis de conexão
// O comando getenv busca a configuração no Railway. 
// Se não existir, ele usa o que está depois do '?:' (configuração do seu PC).
$host    = getenv('MYSQLHOST') ?: "localhost";
$banco   = getenv('MYSQLDATABASE') ?: "delivery"; // Nome do seu banco de dados local
$usuario = getenv('MYSQLUSER') ?: "root";
$senha   = getenv('MYSQLPASSWORD') ?: "";
$porta   = getenv('MYSQLPORT') ?: "3306";

try {
	// 3. Criando a conexão com PDO
	// Incluímos a variável $porta para garantir que o Railway localize o banco
	$pdo = new PDO("mysql:dbname=$banco;host=$host;port=$porta", $usuario, $senha);

	// Ativa o modo de erro para nos ajudar caso algo falhe
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo "Erro ao conectar com o banco de dados! " . $e->getMessage();
}
