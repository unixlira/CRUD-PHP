<?php

     // Criar objeto de conexao
    $conecta = mysqli_connect('localhost', 'unixlira', '#', 'new_way');
    if (mysqli_connect_errno()) {
        die('Conexao falhou: '.mysqli_connect_errno());
    }

    $herois = 'SELECT * FROM herois ';
    $resultado = mysqli_query($conecta, $herois);

    if (!$resultado) {
        die('Falha na consulta');
    }
?>
    <!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Way - José Roberto Lira</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/bootstrap.css" rel="stylesheet">
        <link href="_css/style.css" rel="stylesheet">

    </head>        
        <main>
            <nav>
                <h1>New Way</h1>
                <ul>
                    <li><a href="cadastro.php">Cadastrar</a></li>
                    <li><a href="listagem.php">Excluir</a></li>
                </ul>
            </nav>
			<div class="container">
				<div class="content-top">					
                    <div class="content-top1">	
                            <div class="row ">
								<?php

                                    while ($linha = mysqli_fetch_assoc($resultado)) {
                                        ?>							
								<div class="col-md-12 col-md2">
									<div class="col-md1">										
										
											<img class="img-responsive" src="<?php echo $linha['imagem']; ?>" alt="<?php echo $linha['nome']; ?>" title=" <?php echo utf8_encode($linha['nome']); ?>" />
										
										<h3><a href="alteracao.php?codigo=<?php echo $linha['id']; ?>"><?php echo utf8_encode($linha['nome']); ?></a></h3>
										<div class="price">
                                            <h5 class="item_price" style="font-size: 30px;"><?php echo $linha['tipo']; ?></h5>
                                        <div class="clearfix"> </div>
                                        </div>
                                        <div class="side">
                                            <h5 class="item_price">Vida:&nbsp<?php echo $linha['vida']; ?>&nbsp</h5>
                                            <h5 class="item_price">Defesa:&nbsp<?php echo $linha['defesa']; ?>&nbsp&nbsp</h5>
                                            <h5 class="item_price">Dano:&nbsp<?php echo $linha['dano']; ?>&nbsp</h5>
                                        </div>    
                                        <div class="price">    
                                            <h5 class="item_price">Velocidade de Ataque:&nbsp<?php echo $linha['v_ataque']; ?></h5>
                                            <div class="clearfix"> </div>
                                        </div>
                                        <div class="price">   
                                            <h5 class="item_price">Velocidade de Movimento:&nbsp<?php echo $linha['v_movimento']; ?></h5>
                                            <button class="btn btn-block"><a href="alteracao.php?codigo=<?php echo $linha['id']; ?>">Alterar</a></button>                                      
											<div class="clearfix"> </div>
										</div>	
									</div>
								</div>
								<?php
                                    }
                                    //Liberar dados da memória do servidor
                                    mysqli_free_result($produtos);
                                ?>
							</div>								
						</div>							
						<div class="clearfix"> </div>
				</div>	
                                </div>
        </main>

        <footer>
            <p>Desenvolvido por <a href="http://unixlira.github.io" target="_blank">José Roberto Lira.</a></p>
        </footer>
    </body>
</html>
