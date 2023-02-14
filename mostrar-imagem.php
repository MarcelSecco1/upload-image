<?php
require "conexao.php";

$id = filter_input(INPUT_GET, "id");

$sql = "select tipo, imagem FROM imagens where id = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$data = $row['imagem'];
$tipo = $row['tipo'];

$string = stream_get_contents($data);

header("Content-type: $tipo");
echo $string;
