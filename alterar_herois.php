  <?php
    // Criar conexao
    $conecta = mysqli_connect('localhost', 'unixlira', '#Fibra13', 'new_way');
    if (mysqli_connect_errno()) {
        die('Conexao falhou: '.mysqli_connect_errno());
    }

    if (isset($_POST['nome'])) {
        $nome = utf8_encode($_POST['nome']);
        $especialidade = utf8_encode($_POST['especialidade']);
        $tipo = utf8_encode($_POST['tipo']);
        $vida = $_POST['vida'];
        $defesa = $_POST['defense'];
        $dano = $_POST['damage'];
        $v_ataque = $_POST['ataque'];
        $v_movimento = $_POST['movimento'];
        $heroiID = $_POST['id'];

        // Objeto para alterar
        $alterar = 'UPDATE herois ';
        $alterar .= 'SET ';
        $alterar .= "nome = '{$nome}', ";
        $alterar .= "especialidade = '{$especialidade}', ";
        $alterar .= "tipo = '{$tipo}', ";
        $alterar .= "vida = {$vida} ";
        $alterar .= "defesa = {$defesa} ";
        $alterar .= "dano = {$dano} ";
        $alterar .= "v_ataque = {$v_ataque} ";
        $alterar .= "v_movimento = {$v_movimento} ";
        $alterar .= "WHERE id = {$heroiID} ";

        $retorno = array();
        $operacao_alterar = mysqli_query($conecta, $alterar);
        if ($operacao_alterar) {
            $retorno['sucesso'] = true;
            $retorno['mensagem'] = 'Heroi alterado com sucesso.';
        } else {
            $retorno['sucesso'] = false;
            $retorno['mensagem'] = 'Falha no sistema, tente mais tarde.';
        }

        echo json_encode($retorno);
    }

    // Fechar conexao
    mysqli_close($conecta);
?>