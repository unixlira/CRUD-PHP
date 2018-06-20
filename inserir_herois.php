  <?php
    $conecta = mysqli_connect('localhost', 'unixlira', '#Fibra13', 'new_way');
    if (mysqli_connect_errno()) {
        die('Conexao falhou: '.mysqli_connect_errno());
    }

    if (isset($_POST['nome'])) {
        $nome = utf8_decode($_POST['nome']);
        $especialidade = utf8_decode($_POST['especialidade']);
        $tipo = utf8_decode($_POST['tipo']);
        $vida = $_POST['vida'];
        $defesa = $_POST['defense'];
        $dano = $_POST['damage'];
        $v_ataque = $_POST['ataque'];
        $v_movimento = $_POST['movimento'];

        $inserir = 'INSERT INTO herois ';
        $inserir .= '(`nome`, `especialidade`, `tipo`, `vida`, `defesa`, `dano`, `v_ataque`, `v_movimento` )';
        $inserir .= 'VALUES ';
        $inserir .= "('$nome','$especialidade','$tipo', '$vida', '$defesa', '$dano', '$v_ataque', '$v_movimento')";

        $retorno = array();
        $opreacao_inserir = mysqli_query($conecta, $inserir);
        if ($opreacao_inserir) {
            $retorno['Sucesso'] = true;
            $retorno['mensagem'] = 'Herói cadastrado com sucesso.';
        } else {
            $retorno['Sucesso'] = false;
            $retorno['mensagem'] = 'Falhano sistema, tente mais tarde.';
        }
        echo json_encode($retorno);
    }
?>