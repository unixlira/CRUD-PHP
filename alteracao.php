<?php
    // Criar objeto de conexao
    $conecta = mysqli_connect('localhost', 'unixlira', '#', 'new_way');
    if (mysqli_connect_errno()) {
        die('Conexao falhou: '.mysqli_connect_errno());
    }

    // Consulta a tabela de herois
    $hr = 'SELECT * FROM herois ';
    if (isset($_GET['codigo'])) {
        $id = $_GET['codigo'];
        $hr .= "WHERE id = {$id} ";
    } else {
        $hr .= 'WHERE id = 1 ';
    }
    // cria objeto com dados dos herois
    $con_herois = mysqli_query($conecta, $hr);
    if (!$con_herois) {
        die('Erro na consulta');
    }
    $info_heroi = mysqli_fetch_assoc($con_herois);

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Way - José Roberto Lira</title>
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>
        <main>
            <h1>Alteração dos Clãs da New Way</h1>
            <div id="janela_formulario">
                <form id="formulario_herois">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo utf8_encode($info_heroi['nome']); ?>">

                    <label for="tipo">Tipo</label>
                    <input type="text" name="tipo" id="tipo" value="<?php echo utf8_encode($info_heroi['tipo']); ?>">

                    <label for="especialidade">Especialidade</label>
                    <input type="text" name="especialidade" id="especialidade" value="<?php echo utf8_encode($info_heroi['especialidade']); ?>">

                    <label for="vida">Vida</label>
                    <input type="text" name="vida" id="vida" value="<?php echo utf8_encode($info_heroi['vida']); ?>">

                    <label for="defense">Defesa</label>
                    <input type="text" name="defense" id="defense" value="<?php echo utf8_encode($info_heroi['defesa']); ?>">

                    <label for="damage">Dano</label>
                    <input type="text" name="damage" id="damage" value="<?php echo utf8_encode($info_heroi['dano']); ?>">

                    <label for="ataque">Velocidade de Ataque</label>
                    <input type="text" name="ataque" id="ataque" value="<?php echo utf8_encode($info_heroi['v_ataque']); ?>">

                    <label for="movimento">Velocidade de Movimento</label>
                    <input type="text" name="movimento" id="movimento" value="<?php echo utf8_encode($info_heroi['v_movimento']); ?>">

                    <input type="hidden" name="id" value="<?php echo $info_heroi['id']; ?>">
                    <input type="submit" value="Confirmar Alteração">
                    
                    <div id="mensagem">
                        <p></p>
                    </div>
                </form> 
                
            </div>
        </main>
        
        <script src="jquery.js"></script>
        <script>
            $('#formulario_herois').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retorno = alterarFormulario(formulario);
                //Teste = alert(formulario.serialize());
            });

            function alterarFormulario(dados) {
                $.ajax ({
                    type:"POST", 
                    data:dados.serialize(),
                    url:"alterar_herois.php",
                    async:false
                }).done(function(data){
                    $sucesso  = $.parseJSON(data)["sucesso"];
                    $mensagem = $.parseJSON(data)["mensagem"];

                    if($sucesso){
                        $('#mensagem p').html($mensagem);
                    }else{
                        $('#mensagem p').html($mensagem);
                    }
                }).fail(function(){
                    $('#mensagem p').html('Erro no sistema, tente mais tarde.');
                }).always(function(){
                    $('#mensagem').show();
                });
            }
        </script>
    </body>
</html>
