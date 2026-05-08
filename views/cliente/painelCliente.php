<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['dados-pessoais']['nome_completo']?> - Pagina Inicial</title>
    <link rel="stylesheet" href="/css/painelCliente/painelCliente.css">
</head>
<body>
    <header>

        <div class="up-header">
            <a href="#">
                <img src="/assets/painelCliente/default-user.png" alt="">
            </a>
            <p class="tipoConta">Nº da Conta: <?php echo $_SESSION['usuario-credenciais']['num_conta']; ?></p>

        </div>
        <div class="down-header">
            <p class="welcome" >Olá, <?php echo $_SESSION['dados-pessoais']['nome_completo'];?>!</p>

            <p class="type-account"><?php echo "Conta: ";
            
                switch($_SESSION['usuario-credenciais']['tipo_conta']){
                    case 'poupanca':
                        echo "Poupança";
                        break;

                    case 'corrente':
                        echo "Corrente";
                        break;

                    case 'salario':
                        echo "Salário";
                        break;
                }
            
            
            ?></p>
        </div>

        
        <a class="sair" href="/logout">Sair</a>
    </header>
    <div class="blank-space"></div>
    <div class="body-page">

            <div class="label-conta">
                <p>Saldo Disponivel</p>
            </div>

            <div class="saldo-conta">
                <p>R$ <?php echo number_format($_SESSION['dados-pessoais']['saldo_conta'],2,',','.'); ?></p>
            </div>

            <div class="icons-page">

                <a class="icon" href="./transferir/transferir.php">
                    <img src="/assets/icons/transferir.png" alt="">
                    <p>Transferir</p>
                </a>

                <a class="icon" href="./pagar/pagar.php">
                    <img src="/assets/icons/boleto.png" alt="">
                    <p>Pagar</p>
                </a>

                <a class="icon" href="./depositar/depositar.php">
                    <img src="/assets/icons/depositar.png" alt="">
                    <p>Depositar</p>
                </a>

            </div>
           

             <div class="blank-space"></div>
            



    <footer>
        <div class="icon-inferior">
            <a href="">
                <img src="/assets/icons/home.png" alt="">
                <p>Home</p>
            </a>
        </div>

        <div class="icon-inferior">
            <a href="./extratoCliente/extratoCliente.php">
                <img src="/assets/icons/barra-inferior-extrato.png" alt="">
                <p>Extrato</p>
            </a>
        </div>
    </footer>
    
</body>
</html>