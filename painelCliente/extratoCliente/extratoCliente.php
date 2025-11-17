<?php
require $_SERVER['DOCUMENT_ROOT'] . '../civix-bank/scripts/conexao-banco.php';


session_start();

function pesquisarTransferencias($conexao, $id)
{
    $sql = "SELECT * FROM transacoes WHERE id_origem = ? OR id_destino = ? ORDER BY data_hora DESC";


    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ii", $id, $id);
    $stmt->execute();

    $resultado = $stmt->get_result();

    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function pesquisarNome($conexao, $id){
     $sql = "SELECT nome_completo FROM cliente WHERE usuario_id = ? LIMIT 1";


    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($linha = $resultado->fetch_assoc()) {
        return $linha['nome_completo']; 
    } else {
        return null;
    }
    
}



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['nome_completo']; ?> - Extrato Bancario</title>
    <link rel="stylesheet" href="./css/extratoCliente.css">
</head>

<body>

    <header>
        <a href="../painelCliente.php">
            <img src="../../icons/back-button.png" alt="">
        </a>

        <p>Meu Extrato</p>

    </header>

    <?php

    $id_logado = $_SESSION['id'];

    $transferencias = pesquisarTransferencias($conexao, $id_logado);

    foreach ($transferencias as $transacao) {

        ?>
        <div class="transfer-box">

            <div class="up-transfer">
                <p><?php echo $transacao['data_hora'] ?></p>
                <p><?php echo $transacao['id'] ?></p>
            </div>
            <div class="middle-tranfer">
                <p <?php

                if ($transacao['id_origem'] == $id_logado) {
                    echo 'style="color:red"';
                } else if ($transacao['id_destino'] == $id_logado) {
                    echo 'style="color:green"';
                }

                ?>>

                    <?php

                    if ($transacao['id_origem'] == $id_logado) {
                        echo "- R$ " . number_format($transacao['valor'], 2, ",", ".");
                    } else if ($transacao['id_destino'] == $id_logado) {
                        echo "+ R$ " . number_format($transacao['valor'], 2, ",", ".");
                    }

                    ?>

                </p>
                <p>

                    <?php

                    echo $transacao['tipo_transacao'];


                    ?>


                </p>
            </div>
            <div class="foot-transfer">
                <p>

                    <?php 

                        if($transacao['id_origem'] == $id_logado){
                            $id_procurado = $transacao['id_destino'];
                        }else if($transacao['id_destino'] == $id_logado){
                            $id_procurado = $transacao['id_origem'];
                        }
                    
                        $nome = pesquisarNome($conexao,$id_procurado);
                        
                        echo $nome;
                    
                    ?>


                </p>
            </div>

        </div>

    <?php } ?>

    <div class="blank-space"></div>

    <footer>
        <div class="icon-inferior">
            <a href="../../painelCliente/painelCliente.php">
                <img src="../../icons\home.png" alt="">
                <p>Home</p>
            </a>
        </div>

        <div class="icon-inferior">
            <a href="">
                <img src="../../icons\barra-inferior-extrato.png" alt="">
                <p>Extrato</p>
            </a>
        </div>
    </footer>

</body>

</html>