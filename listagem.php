<?php
    // Criar objeto de conexao
    $conecta = mysqli_connect('localhost', 'unixlira', '#', 'new_way');
    if (mysqli_connect_errno()) {
        die('Conexao falhou: '.mysqli_connect_errno());
    }

    // tabela de transportadoras
    $tr = 'SELECT * FROM herois ';
    $consulta_tr = mysqli_query($conecta, $tr);
    if (!$consulta_tr) {
        die('erro no banco');
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Way - José Roberto Lira</title>
        
        <!-- estilo -->
        <link href="_css/list.css" rel="stylesheet">
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>        
        <main> 
            <h1>Exclusão de Heróis</h1>
            <div id="janela_transportadoras">
                <?php
                    while ($linha = mysqli_fetch_assoc($consulta_tr)) {
                        ?>
                <ul>
                    <li><?php echo utf8_encode($linha['nome']); ?></li>
                    <li><?php echo utf8_encode($linha['tipo']); ?></li>
                    <li><a href="" class="excluir" title="<?php echo $linha['id']; ?>">Excluir</a></li>
                </ul>
                <?php
                    }
                ?>
            </div>
        </main>

        
        <script src="jquery.js"></script>
        <script>
            $('#janela_transportadoras ul li a.excluir').click(function(e){
                e.preventDefault();
                //Pega o atributo do title
                var id = $(this).attr("title");
                var elemento= $(this).parent().parent();

                $.ajax({
                    type:"POST",
                    data:"id=" + id,
                    url:"exclusao.php",
                    async:false
                }).done(function(data){

                    $sucesso = $.parseJSON(data)["sucesso"];

                    if($sucesso){
                        $(elemento).fadeOut();
                    }else{
                        console.log("ERRO NO SISTEMA");
                    }
                }).fail(function(){

                });
            });
        </script>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>
