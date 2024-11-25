<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "databanco";


$conn = new mysqli($host, $usuario, $senha, $banco);


if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$idade = $_POST['idade'];

$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, idade) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $nome, $email, $idade);

if ($stmt->execute()) {
    header("Location: votacao.html");
    exit();
}
$stmt->close();

$conn->close();
?>
