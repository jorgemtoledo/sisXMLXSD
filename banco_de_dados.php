<?php
// Iniciamos a sessão para armazenar dados entre páginas
session_start();
try{
    // Faz conexão com banco de daddos
    $pdo = new PDO('mysql:host=localhost;dbname=sistemaXML', '####', '####', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}catch(PDOException $e){
    // Caso ocorra algum erro na conexão com o banco, exibe a mensagem
    echo 'Falha ao conectar no banco de dados: '.$e->getMessage();
    die;
}
?>