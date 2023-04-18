<?php 
    function verificar($emailLogin, $senhaLogin){
        $arquivo = 'cadastros.txt'; 
        if(file_exists($arquivo)){
            $arq = fopen($arquivo , 'r');

            $texto = fread($arq , filesize($arquivo));

            if(isset($emailLogin) && isset($senhaLogin)){
                if(str_contains($texto , $emailLogin) && str_contains($texto , $senhaLogin)){
                    echo "<p>Seja bem vindo(a) ao site!</p>";    
                }else{
                    echo "Seu cadastro não foi encontrado.";
                }
            }else{
                echo "Sua senha e/ou email cadastrados não foram encontrados, tente novamente!";
            }
        }else{
            echo "Nenhum cadastro com essa senha e/ou email foram encontrados no sistema.";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body class="body">
    <div class="container text-center">
        <div class="box">
            <div class="col">
                <h2>Verificador de conta...</h2>
            </div>
            <form action="cadastrado.php" method="POST">
                <div class="col">
                    <label for="email" class="formulario__titulos">Email: </label><br>
                    <input type="email" pattern=".+@gmail.com" name="emailLogin" id="email" required><br>
                </div>
                <div class="col">
                <label for="senha" class="formulario__titulos--senha">Senha: </label><br>
                <label for="senha" class="formulario__titulos">(mínimo com 8 caracteres)</label><br>
                <input type="password" minlength="8" name="senhaLogin" id="" placeholder="********" required><br>
                </div>
                <div class="col">
                    <br><a href="index.php" class="link">Não tem cadastro?</a>
                </div>
                <?php 
                    require_once('verificar.php');
                    $emailLogin = $_POST['emailLogin'];
                    $senhaLogin = $_POST['senhaLogin'];
                    verificar($emailLogin, $senhaLogin)
                ?>
            </form>
        </div>
    </div>
    
</body>
</html>