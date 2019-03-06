<?php 
include ('../../ctrl_restrito_logado.php');
include('../cabecalho.php');
include('../../conexao.php');


$id = $_GET["id"];
$query = mysql_query("SELECT ps.*, tp.tbpessoastipodescricao FROM pdv.tbpessoas as ps
						left join tbpessoastipo tp on
						tp.idtbpessoastipo = tbpessoastipo
						where ps.idtbpessoas = ".$id." and ps.tbpessoasst > 0;");


$row = mysql_fetch_array($query);

$idtipo =  $row["tbpessoastipo"];
$tipo =  $row["tbpessoastipodescricao"];
$nome =  $row["tbpessoasnome"];
$nasc =  $row["tbpessoasnascimento"];
$cpf =  formatCpfCnpj($row["tbpessoascpfcnpj"]);
$tel1 =  formatFone($row["tbpessoastel1"]);
$tel2 =  formatFone($row["tbpessoastel2"]);
$email1 =  $row["tbpessoasemail1"];
$email2 =  $row["tbpessoasemail2"];
$endereco =  $row["tbpessoasendereco"];
$cep =  formatCep($row["tbpessoascep"]);

?>



<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Clientes</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Cliente
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" action="../clientes/editar_action.php">
                                <div class="form-group">
                               		<label>Id</label>
                                    <p class="form-control-static"><?php echo $id;?></p>
                                    <input class="form-control" id="id"  name="id" type="hidden" value="<?php echo $id;?>">
                                    <input class="form-control" id="tipo"  name="tipo" type="hidden" value="1">
                                    <label>Nome</label>
                                    <input class="form-control" id="nome"  name="nome" type="text" value="<?php echo $nome;?>">
                                    <label>Data de Aniversário</label>
                                    <input class="form-control" id="nasc"  name="nasc" type="date" value="<?php echo $nasc;?>">
                                    <label>CPF</label>
                                    <input class="form-control" id="cpf"  name="cpf" type="text" value="<?php echo $cpf;?>">
                                    <label>Telefone 1</label>
                                    <input class="form-control" id="tel1"  name="tel1" type="text" value="<?php echo $tel1;?>">
                                    <label>Telefone 2</label>
                                    <input class="form-control" id="tel2"  name="tel2" type="text" value="<?php echo $tel2;?>">
                                    <label>E-mail 1</label>
                                    <input class="form-control" id="email1"  name="email1" type="text" value="<?php echo $email1;?>">
                                    <label>E-mail2</label>
                                    <input class="form-control" id="email2"  name="email2" type="text" value="<?php echo $email2;?>">
                                    <label>CEP</label>
                                    <input class="form-control" id="cep"  name="cep" type="text" value="<?php echo $cep;?>">
                                    <label>Endereço</label>
                                    <input class="form-control" id="endereco"  name="endereco" type="text" value="<?php echo $endereco;?>">
                                </div>
                                <a href="../clientes/visualizar.php" class="btn btn-primary">Voltar</a> 
                                <input class="btn btn-primary" type="submit" value="Salvar">
                             </form>    
						</div>
                    </div>
                </div>
           	</div>
         </div>
    </div>
</div>
  

    
    
<?php

include("../rodape.php");

?>
