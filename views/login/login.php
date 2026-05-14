
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Civix Bank - Entre na sua conta</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="main-page">

    <a href="/"><img src="assets/img/logo-civix-bank.png" alt="Civix Bank"></a>

        

        <?php
            if(isset($_GET['ErrorPage'])){
                ?>
                <div id="error-bar">
                <?php

                echo "Erro " . $_GET['ErrorPage'] . ": " . $_GET['msgError'];
                
                ?>
                </div>
                <?php
            }
            
        ?>

        <form action="/check-login" method="post">
            <div class="input-box">
                <label>Conta*</label>
                <input type="text" name="conta" placeholder="Digite o Nº da conta...">
            </div>

            <div class="input-box">
                <label>Senha da Conta*</label>
                <input type="password" name="senha" placeholder="Digite a senha..." required>
            </div>

            <div class="input-box">
                <a href="/criarConta">Crie sua conta</a>
            </div>

            <div class="button-box">
                <button type="submit">Acessar</button> 
                <!-- alterar depois -->
            </div>
            
        </form>

    </div>
    <footer>
        <img src="assets/img/cynex-logo-white.png" alt="">
        <p>&copy 2025 Civix Bank - Todos os direitos reservados.</p>
    </footer>
</body>
</html>