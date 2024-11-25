<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "databanco";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if (isset($_POST['candidato'])) {
    $candidato = intval($_POST['candidato']);

    $stmt = $conn->prepare("INSERT INTO votos (candidato_id) VALUES (?)");
    $stmt->bind_param("i", $candidato);

    if ($stmt->execute()) {
        header("Location: confirmacao.html");
        exit();
    }
    $stmt->close();
} else {
    echo "Nenhum candidato selecionado!";
}

$conn->close();
?>