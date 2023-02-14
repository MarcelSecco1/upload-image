<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Formulário de cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            width: 180px;
        }

        div.gallery:hover {
            border: 1px solid #777;
            background-color: lightblue;
            cursor: pointer;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="container">

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Menu</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="formulario-cadastro.php">Formulário</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="listagem.php">Listagem</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="galeria.php">Galeria</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <h1>Galeria de imagens</h1>
        </header>

        <section>
            <?php

            function formatBytes($size, $precision = 2)
            {
                $base = log($size, 1024);
                $suffixes = array('', 'K', 'M', 'G', 'T');

                return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
            }

            require "conexao.php";

            $sql = "select id, nome, tipo, tamanho, imagem FROM imagens order by id";
            $stmt = $conn->query($sql);

            while ($row = $stmt->fetch()) {
            ?>
                <div class="gallery">
                    <a target="_blank" href="mostrar-imagem.php?id=<?= $row["id"] ?>">
                        <img src="mostrar-imagem.php?id=<?= $row["id"] ?>" alt="Imagem" />
                    </a>
                    <div class="desc"><?= $row["nome"] ?></div>
                </div>
            <?php
            }
            ?>
        </section>

    </div>
</body>

</html>