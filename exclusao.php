<?php
    // Criar objeto de conexao
    $conecta = mysqli_connect('localhost', 'unixlira', '#', 'new_way');
    if (mysqli_connect_errno()) {
        die('Conexao falhou: '.mysqli_connect_errno());
    }

    if (isset($_POST['id'])) {
        $tID = $_POST['id'];

        $exclusao = 'DELETE FROM herois ';
        $exclusao .= "WHERE id = {$tID}";
        $con_exclusao = mysqli_query($conecta, $exclusao);
        if ($con_exclusao) {
            $retorno['sucesso'] = true;
            $retorno['mensagem'] = 'Herói excluido com sucesso.';
        } else {
            $retorno['sucesso'] = false;
            $retorno['mensagem'] = 'Falha no sistema, tente mais tarde.';
        }
    }

    // converter retorno em json
    echo json_encode($retorno);

    // Fechar conexao
    mysqli_close($conecta);
