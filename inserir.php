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
                                <a class="nav-link active" aria-current="page" href="formulario-cadastro.php">Formulário</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="listagem.php">Listagem</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="galeria.php">Galeria</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <h1>Página de inserir (gravar no banco)</h1>
        </header>

        <section>
            <?php

            require "conexao.php";

            $nome = $_FILES['imagem']['name'];
            $tamanho = $_FILES['imagem']['size'];
            $tipo = $_FILES['imagem']['type'];
            $extensao = pathinfo($nome, PATHINFO_EXTENSION);

            // Read in a binary file
            $data = file_get_contents($_FILES['imagem']['tmp_name']);

            // Valid image extension
            $valid_extension = array("png", "jpeg", "jpg");

            if (in_array($extensao, $valid_extension)) {

                $sql = "insert into imagens (nome, tipo, tamanho, imagem)  values (:nome, :tipo, :tamanho, :data)";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(1, $nome, PDO::PARAM_STR);
                $stmt->bindValue(2, $tipo, PDO::PARAM_STR);
                $stmt->bindValue(3, $tamanho, PDO::PARAM_STR);
                $stmt->bindValue(4, $data, PDO::PARAM_LOB);
                $result = $stmt->execute();


                if ($result == true) {
            ?>
                    <div class="alert alert-success" role="alert">
                        <h4>Dados gravados com sucesso!</h4>
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <h4>Falha ao efetuar gravação.</h4>
                        <p><?php echo $stmt->error; ?></p>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Erro: tipo de arquivo não permitido.</h4>
                </div>
            <?php
            }


            ?>
            <p>
                <a href="formulario-cadastro.php" class="btn btn-info">Voltar ao formulário</a>
            </p>
        </section>

    </div>
</body>

</html>