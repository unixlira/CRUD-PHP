<?php
    // Criar objeto de conexao
    $conecta = mysqli_connect('localhost', 'unixlira', '#Fibra13', 'new_way');
    if (mysqli_connect_errno()) {
        die('Conexao falhou: '.mysqli_connect_errno());
    }
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
            <h1>Cadastro de Heróis do Clã New Way</h1>
            <div id="janela_formulario">
                <form id="formulario_herois">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome">

                    <label for="tipo">Tipo</label>
                    <input type="text" name="tipo">

                    <label for="especialidade">Especialidade</label>
                    <input type="text" name="especialidade">

                    <label for="vida">Vida</label>
                    <input type="text" name="vida">

                    <label for="defense">Defesa</label>
                    <input type="text" name="defense">

                    <label for="damage">Dano</label>
                    <input type="text" name="damage">

                    <label for="ataque">Velocidade de Ataque</label>
                    <input type="text" name="ataque">

                    <label for="movimento">Velocidade de Movimento</label>
                    <input type="text" name="movimento">

                    
                    <input type="submit" value="Confirmar Inclusão">  
                    
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
                var retorno = inserirFormulario(formulario);
                //Teste = alert(formulario.serialize());
            });

            function inserirFormulario(dados) {
                $.ajax ({
                    type:"POST", 
                    data:dados.serialize(),
                    url:"inserir_herois.php",
                    async:false 
                }).then(sucesso,falha);

                function sucesso(data){
                    $sucesso  = $.parseJSON(data)["sucesso"];
                    $mensagem = $.parseJSON(data)["mensagem"];

                    $('#mensagem').show();

                    if($sucesso){
                        $('#mensagem p').html($mensagem);
                    }else{
                        $('#mensagem p').html($mensagem);

                    }
                }

                function falha(){
                    console.log("ERRoR");
                    
                }
            }
        </script>
    </body>
</html>