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

            <h1>Mostrar Arquivo de imagem</h1>
        </header>

        <section>
            <?php
            $id = filter_input(INPUT_GET, "id");
            ?>
            <img src="mostrar-imagem.php?id=<?= $id ?>" alt="Imagem" style="max-width: 100vh;" />
            <br><br>
            <p>
                <a href="listagem.php" class="btn btn-info">Voltar à listagem</a>
            </p>
        </section>

    </div>
</body>

</html>