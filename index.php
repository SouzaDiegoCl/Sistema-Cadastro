<!-- Imports -->
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="shortcut icon" href="imgs/faviconBank.ico" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="views/styles/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/092f5e2d18.js" crossorigin="anonymous"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
</head>

<body>

<div id="homePageMain">
    <div id="homePageImageContainer">
        <img src="imgs/homePageCard.png" id="homePageImg" alt="">
    </div>
    <div id="homePageMainContent">
        <div id="homePageMainText">
            <h1 id="homePageTitle">ClBank</h1>
            <p id="homePageSubtitle">Atuando no mercado de finanças desde 1950. A empresa ideal para confiar o seu
                investimento!</p>
        </div>
        <div id="homePageCardContainer">
            <div class="card bg-light m-2" id="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-money-bill"></i></h5>
                </div>
            </div>
            <div class="card bg-light  m-2" id="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-regular fa-credit-card"></i></h5>
                </div>
            </div>
            <div class="card bg-light  m-2" id="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-lock"></i></h5>
                </div>
            </div>
        </div>
        <div id="homePageButtonsContainer">
            <div class="p-2">
                <a href="views/cadastroScreen.php">
                    <button class="btn btn-warning" id="homePageBtn">Criar Conta</button>
                </a>
            </div>
            <div class="p-2">
                <a>
                    <button class="btn btn-outline-warning" id="homePageBtn">Acessar Conta</button>
                </a>
            </div>

        </div>
    </div>
</div>

<?php include("views/blades/footer.php"); ?>