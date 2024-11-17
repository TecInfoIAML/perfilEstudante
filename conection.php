<?php
$servername = "franciscoservidor.database.windows.net";
$username = "ribeiro";
$password = "Prandiano@1";
$dbname = "perfil";

try {
    $conn = new PDO("sqlsrv:server = tcp:$servername,1433; Database = $dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>