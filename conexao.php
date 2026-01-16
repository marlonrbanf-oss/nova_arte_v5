<?php
date_default_timezone_set('America/Sao_Paulo');

// No Railway, as variáveis podem vir com nomes ligeiramente diferentes
// Vamos tentar capturar as mais comuns que eles fornecem
$host    = getenv('MYSQLHOST') ?: "mysql.railway.internal";
$banco   = getenv('MYSQLDATABASE') ?: "railway";
$usuario = getenv('MYSQLUSER') ?: "root";
$senha   = getenv('MYSQLPASSWORD') ?: "jQsLshftfeOPcomrUGqsdHsDagGFvGbi";
$porta   = getenv('MYSQLPORT') ?: "3306";

try {
	// Importante: Adicionamos a porta explicitamente na string de conexão
	$pdo = new PDO("mysql:dbname=$banco;host=$host;port=$porta;charset=utf8", $usuario, $senha);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	// Isso vai nos mostrar exatamente qual parâmetro está falhando
	echo "Erro na conexão: " . $e->getMessage();
}
?>