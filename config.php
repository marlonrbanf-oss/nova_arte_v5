<?php
// Configurações Gerais
$email_adm = 'marlonrbanf@gmail.com';

// 1. Detecção de Ambiente e Definição da URL
if (getenv('MYSQLHOST')) {
    // AMBIENTE PRODUÇÃO (RAILWAY)
    $url_site = 'https://web-production-84e3c.up.railway.app/';
    
    // Captura as variáveis automáticas do Railway
    $host = getenv('MYSQLHOST');
    $port = getenv('MYSQLPORT') ?: '3306';
    $db   = getenv('MYSQLDATABASE');
    $user = getenv('MYSQLUSER');
    $pass = getenv('MYSQLPASSWORD');
} else {
    // AMBIENTE LOCAL (XAMPP)
    // Ajustado para o caminho que você forneceu
    $url_site = 'http://localhost/sites/Template%20Nova%20arte/Template%20Inicial/site/';
    
    $host = 'localhost';
    $port = '3306';
    $db   = 'delivery';
    $user = 'root';
    $pass = '';
}

// 2. Conexão com o Banco usando PDO
try {
    // String de conexão robusta
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
    
    // Habilita o modo de erros para facilitar o seu desenvolvimento
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Se falhar, exibe o erro de forma clara
    if (!getenv('MYSQLHOST')) {
        die("Erro ao conectar no Localhost: " . $e->getMessage());
    } else {
        // No Railway, se der erro, provavelmente é falta de vínculo de variáveis
        die("Erro crítico: As variáveis de ambiente do Railway não foram detectadas no serviço web.");
    }
}
?>
