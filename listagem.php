<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Formulário de cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
                                <a class="nav-link active" href="listagem.php">Listagem</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="galeria.php">Galeria</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <h1>Listagem</h1>
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

            ?>

            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Tamanho</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {
                        ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['nome'] ?></td>
                                <td>
                                    <?= $row['tipo'] ?>
                                </td>
                                <td>
                                    <?= formatBytes($row['tamanho']); ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="visualizar-imagem.php?id=<?= $row['id'] ?>" title="Visualizar" target="_blank">
                                    Visualizar
                                    </a>
                                    <a class="btn btn-sm btn-primary" href="baixar-imagem.php?id=<?= $row['id'] ?>" title="Baixar" target="_blank">
                                    Baixar
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="excluir.php?id=<?= $row['id'] ?>" onclick="if (!confirm('Tem certeza que deseja excluir?'))
                                            return false;">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

    </div>
</body>

</html>