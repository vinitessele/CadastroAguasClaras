<?php

$id = null;
$img1 ='';
$img2 ='';
$img3 ='';
$img4 ='';
$img5 ='';
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}
include 'Conexao.php';
if (!empty($_POST)) {
    $nomeErro = null;
    $enderecoErro = null;
    $telefoneErro = null;
    $emailErro = null;

    $nome = $_POST['tNome'];
    $endereco = $_POST['tEndereco'];
    $Mae = $_POST['tMae'];     
    $Pai = $_POST['tPai'];     
    $Peso = $_POST['tPeso']; 
    $telefone = $_POST['tTelefone'];
    $celular = $_POST['tCelular'];
    $email = $_POST['tEmail'];
    $complemento = $_POST['tComplemento'];
    $bairro= $_POST['tBairro'];
    $cep= $_POST['tCep'];
    $cidade= $_POST['tCidade'];
    $estado= $_POST['tEstado'];
    $dt_nascimento   = ($_POST['tDtNascimento']);
    $dt_nascimento   = date('Y-m-d', strtotime($dt_nascimento));
    $dt_inicio   = ($_POST['tDtInicio']);
    $dt_inicio   = date('Y-m-d', strtotime($dt_inicio));
    $nacionalidade= $_POST['tNacionalidade'];
    $profissao= $_POST['tProfissao'];
    $cpf= $_POST['tCPF']; 
    $rg= $_POST['tRG']; 
    $orgaoexpedidor= $_POST['tOrgaoExpedidor'];
    $academia= $_POST['tAcademia'];
    $professor= $_POST['tProfessor'];
    $kyu9  = ($_POST['tKyu9']);
    $kyu9   = date('Y-m-d', strtotime($kyu9));
    $kyu8  = ($_POST['tKyu8']);
    $kyu8   = date('Y-m-d', strtotime($kyu8));
    $kyu7  = ($_POST['tKyu7']);
    $kyu7   = date('Y-m-d', strtotime($kyu7));
    $kyu6  = ($_POST['tKyu6']);
    $kyu6   = date('Y-m-d', strtotime($kyu6));
    $kyu5  = ($_POST['tKyu5']);
    $kyu5   = date('Y-m-d', strtotime($kyu5));
    $kyu4  = ($_POST['tKyu4']);
    $kyu4   = date('Y-m-d', strtotime($kyu4));
    $kyu3  = ($_POST['tKyu3']);
    $kyu3   = date('Y-m-d', strtotime($kyu3));
    $kyu2  = ($_POST['tKyu2']);
    $kyu2   = date('Y-m-d', strtotime($kyu2));
    $kyu1  = ($_POST['tKyu1']);
    $kyu1   = date('Y-m-d', strtotime($kyu1));
    $Dan1  = ($_POST['tDan1']);
    $Dan1   = date('Y-m-d', strtotime($Dan1));
    $Dan2  = ($_POST['tDan2']);
    $Dan2   = date('Y-m-d', strtotime($Dan2));
    $Dan3  = ($_POST['tDan3']);
    $Dan3   = date('Y-m-d', strtotime($Dan3));
    $Dan4  = ($_POST['tDan4']);
    $Dan4   = date('Y-m-d', strtotime($Dan4));
    $Dan5  = ($_POST['tDan5']);
    $Dan5   = date('Y-m-d', strtotime($Dan5));
    $Dan6  = ($_POST['tDan6']);
    $Dan6   = date('Y-m-d', strtotime($Dan6));
    $Dan7  = ($_POST['tDan7']);
    $Dan7   = date('Y-m-d', strtotime($Dan7));
    $Dan8  = ($_POST['tDan8']);
    $Dan8   = date('Y-m-d', strtotime($Dan8));
  
    $dir = "upload/"; 

    $countImg = 1;

    /*Aqui você verifica se o file está setado */
    if (isset($_FILES['arquivo'])){
   
       foreach ($_FILES['arquivo']["name"] as $file => $key) {
     
       /*Aqui você evita de tentar enviar inputs vazios */
          if (!empty($_FILES['arquivo']["name"][$file])) {
             $extencao= strtolower(substr($_FILES['arquivo']["name"][$file],-4)); 
             sleep(1);
             if ($countImg == 1)
                {
                  $img1 = md5(time()) .'.'. $extencao;
                   move_uploaded_file($_FILES['arquivo']["tmp_name"][$file], "$dir/".$img1);
                }
                else if ($countImg == 2 )
                {
                   $img2 = md5(time()) .'.'. $extencao;
                   move_uploaded_file($_FILES['arquivo']["tmp_name"][$file], "$dir/".$img2);
                }
                else if ($countImg == 3 )
                {
                   $img3 = md5(time()) .'.'. $extencao;
                   move_uploaded_file($_FILES['arquivo']["tmp_name"][$file], "$dir/".$img3);
                }
                else if ($countImg == 4 )
                {
                   $img4 = md5(time()) .'.'. $extencao;
                   move_uploaded_file($_FILES['arquivo']["tmp_name"][$file], "$dir/".$img4);
                }
                else if ($countImg == 5 )
                {
                   $img5 = md5(time()) .'.'. $extencao;
                   move_uploaded_file($_FILES['arquivo']["tmp_name"][$file], "$dir/".$img5);
                }
                $countImg++;
             //echo $novo_nome;
             //$new_name = date("Y.m.d-H.i.s") . $extencao;
             //echo $new_name;
       
          }
       }
    }
    //Validação
    $validacao = true;
    if (empty($nome)) {
        $nomeErro = 'Por favor digite o nome!';
        $validacao = false;
    }

    if (empty($email)) {
        $emailErro = 'Por favor digite o email!';
        $validacao = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErro = 'Por favor digite um email válido!';
        $validacao = false;
    }

    if (empty($endereco)) {
        $enderecoErro = 'Por favor digite o endereço!';
        $validacao = false;
    }

    if (empty($celular)) {
        $celua = 'Por favor digite o celular!';
        $validacao = false;
    }

        if ($validacao) 
        {
        $sql_code = "UPDATE cadastro set 
					nome ='$nome', 
					endereco = '$endereco', 
					telefone = '$telefone', 
                    celular =  '$celular',
					email ='$email', 
                    complemento = '$complemento',
                    bairro ='$bairro',
                    cep='$cep',
                    cidade='$cidade',
                    estado='$estado',
                    dt_nascimento ='$dt_nascimento',
                    nacionalidade='$nacionalidade',
                    profissao ='$profissao',
                    cpf='$cpf',
                    rg='$rg',
                    orgaoexpedidor='$orgaoexpedidor',
                    academia ='$academia',
                    professor ='$professor',
                    kyu9='$kyu9',
                    kyu8='$kyu8',
                    kyu7='$kyu7',
                    kyu6='$kyu6',
                    kyu5='$kyu5',
                    kyu4='$kyu4',
                    kyu3='$kyu3',
                    kyu2='$kyu2',
                    kyu1='$kyu1',
                    Dan1='$Dan1',
                    Dan2='$Dan2',
                    Dan3='$Dan3',
                    Dan4='$Dan4',
                    Dan5='$Dan5',
                    Dan6='$Dan6',
                    Dan7='$Dan7',
                    Dan8='$Dan8',
                    dt_inicio='$dt_inicio',
                    arquivoRG='$img1',
                    arquivoFoto='$img2',
                    arquivoComResidencia='$img3', 
                    arquivoUltimoCertificado='$img4',
                    dt_inicio = '$dt_inicio',
                    Mae = '$Mae',
                    Pai = '$Pai',
                    Peso = '$Peso',
                    arquivo = '$img5' 
                    WHERE id ='$id'";
                    
            //echo  $sql_code;
            $sql_query=$mysqli->query($sql_code) or die($mysqli->error);
                if($sql_query==true)
                {
                echo   '<div class="alert alert-success">
                        <strong>Sucesso!</strong> Atualização realizado com sucesso.
                        </div>';
                }
                else
                {
                    echo ''.mysql_error();
                }
            $sql_code = "select * from cadastro where id='$id'";
            $sql_query=$mysqli->query($sql_code) or die($mysqli->error);
            $linha = $sql_query-> fetch_assoc();
		}
}
else 
{
		$sql_code = "select * from cadastro where id='$id'";
		$sql_query=$mysqli->query($sql_code) or die($mysqli->error);
		$linha = $sql_query-> fetch_assoc();
}
$img1 = $linha['arquivoRG'];
$img2 = $linha['arquivoFoto'];
$img3 = $linha['arquivoComResidencia'];
$img4 = $linha['arquivoUltimoCertificado'];
$img5 = $linha['arquivo'];
?>
<!DOCTYPE html>
<html>
<head>
		<title>Atualizar</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Atualizar</title>
</head>
<body>
<div class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
				<h1>Atualizar cadastro</h1>
            </div>
            <div class="card-body">
<form action="alterar.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
	<fieldset id="cliente">
		<legend>Identificação</legend>
        <p><label for="cNome">Nome:</label> 
				<input type="text" class="form-control" name="tNome" 
				id="cNome" required name="tNome" value='<?php echo $linha['nome']; ?>' title="Preencha o campo Nome***"/></p>
				
			<p><label for="cEmail">E-mail:</label> 
				<input type="email" class="form-control"  name="tEmail" id="cEmail" required value='<?php echo $linha['email'];?>' /></p>

            <p><label for="cMae">Nome da Mãe:</label> 
				<input type="text" class="form-control"  name="tMae" id="cMae" value='<?php echo $linha['Mae'];?>'
                placeholder="Nome da mãe" /></p>
         
             <p><label for="cPai">Nome do Pai:</label> 
				<input type="text" class="form-control"  name="tPai" id="cPai" value='<?php echo $linha['Pai'];?>'
                placeholder="Nome do Pai" /></p>

             <p><label for="cPeso">Peso atual:</label> 
				<input type="text" class="form-control"  name="tPeso" id="cPeso" value='<?php echo $linha['Peso'];?>'
                placeholder="Peso atual" /></p>


			<p><label for="cTelefone">Telefone:</label> 
				<input type="text" class="form-control" name="tTelefone" id="cTelefone" value='<?php echo $linha['telefone'];?>' /></p>

             <p><label for="cCelular">Celular:</label> 
				<input type="text" class="form-control" name="tCelular" id="cCelular" value='<?php echo $linha['celular'];?>' required/></p>
				
			<p><label for="cEndereco">Endereço:</label> 
				<input type="text" class="form-control" name="tEndereco" id="cEndereco" value='<?php echo $linha['endereco'];?>' /></p>
			
         <p><label for="cComplemento">Complemento:</label> 
				<input type="text" class="form-control" name="tComplemento" id="cComplemento" value='<?php echo $linha['complemento']; ?>' /></p>
			
         <p><label for="cBairro">Bairro:</label> 
				<input type="text" class="form-control" name="tBairro" id="cBairro" value='<?php echo $linha['bairro'];?>'/></p>
            
         <p><label for="cCep">Cep:</label> 
				<input type="text" class="form-control" name="tCep" id="cCep" value='<?php echo $linha['cep']; ?>' /></p>
			
         <p><label for="cCidade">Cidade:</label> 
				<input type="text" class="form-control" name="tCidade" id="cCidade" value='<?php echo $linha['cidade']; ?>' /></p>
			
         <p><label for="cEstado">Estado:</label> 
				<input type="text" class="form-control" name="tEstado" id="cEstado" value='<?php echo $linha['estado']; ?>' /></p>

         <p><label for="cDataNascimento">Data de Nascimento:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDtNascimento" id="cDataNascimento" value='<?php echo $linha['dt_nascimento']; ?>' /></p>
        
         <p><label for="cDataInicio">Data de início com o Karatê:</label> 
            <input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDtInicio" id="cDataInicio" placeholder="Data inicio com o Karatê" /></p>   
            
         <p><label for="cNacionalidade">Nacionalidade:</label> 
				<input type="text" class="form-control" name="tNacionalidade" id="cNacionalidade" value='<?php echo $linha['nacionalidade']; ?>' /></p>
            
         <p><label for="cProfissao">Profissão:</label> 
				<input type="text" class="form-control" name="tProfissao" id="cProfissao" value='<?php echo $linha['profissao']; ?>' /></p>
            
         <p><label for="cCPF">CPF:</label> 
				<input type="text" class="form-control" name="tCPF" id="cCPF" value='<?php echo $linha['cpf']; ?>' /></p>
            
         <p><label for="cRG">RG:</label> 
				<input type="text" class="form-control" name="tRG" id="cRG" value='<?php echo $linha['rg']; ?>' /></p>
            
         <p><label for="cOrgaoExpedidor">Orgão Expedidor:</label> 
				<input type="text" class="form-control" name="tOrgaoExpedidor" id="cOrgaoExpedidor" value='<?php echo $linha['orgaoexpedidor']; ?>' /></p>
            
         <p><label for="cAcademia">Academia:</label> 
				<input type="text" class="form-control" name="tAcademia" id="cAcademia" value='<?php echo $linha['academia']; ?>' /></p>

         <p><label for="cProfessor">Professor:</label> 
				<input type="text" class="form-control" name="tProfessor" id="cProfessor" value='<?php echo $linha['professor']; ?>' /></p>   

         <p><label for="cKyu9">Kyu 9:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu9" id="cKyu9" value='<?php echo $linha['kyu9']; ?>' /></p>
         
         <p><label for="cKyu8">Kyu 8:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu8" id="cKyu8" value='<?php echo $linha['kyu8']; ?>'/></p>
         
         <p><label for="cKyu7">Kyu 7:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu7" id="cKyu7" value='<?php echo $linha['kyu7']; ?>'/></p>
         
         <p><label for="cKyu6">Kyu 6:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu6" id="cKyu6" value='<?php echo $linha['kyu6']; ?>' /></p>
         
         <p><label for="cKyu5">Kyu 5:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu5" id="cKyu5" value='<?php echo $linha['kyu5']; ?>'/></p>
         
         <p><label for="cKyu4">Kyu 4:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu4" id="cKyu4" value='<?php echo $linha['kyu4']; ?>' /></p>
            
         <p><label for="cKyu3">Kyu 3:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu3" id="cKyu3" value='<?php echo $linha['kyu3']; ?>'/></p>
         
         <p><label for="cKyu2">Kyu 2:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu2" id="cKyu2" value='<?php echo $linha['kyu2']; ?>'/></p>
         
         <p><label for="cKyu1">Kyu 1:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu1" id="cKyu1"value='<?php echo $linha['kyu1']; ?>'/></p>
         
         <p><label for="cDan1">Dan 1:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan1" id="cDan1" value='<?php echo $linha['Dan1']; ?>'/></p>
         
         <p><label for="cDan2">Dan 2:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan2" id="cDan2" value='<?php echo $linha['Dan2']; ?>'/></p>
         
         <p><label for="cDan3">Dan 3:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan3" id="cDan3" value='<?php echo $linha['Dan3']; ?>'/></p>
         
         <p><label for="cDan4">Dan 4:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan4" id="cDan4" value='<?php echo $linha['Dan4']; ?>'/></p>
         
         <p><label for="cDan5">Dan 5:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan5" id="cDan5" value='<?php echo $linha['Dan5']; ?>'/></p>
         
         <p><label for="cDan6">Dan 6:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan6" id="cDan6" value='<?php echo $linha['Dan6']; ?>'/></p>
         
         <p><label for="cDan7">Dan 7:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan7" id="cDan7" value='<?php echo $linha['Dan7']; ?>'/></p>
         
         <p><label for="cDan8">Dan 8:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan8" id="cDan8" value='<?php echo $linha['Dan8']; ?>'/></p>


      <p>
         <label class="form-label" for="customFile">RG</label>
         <input id="imgDoc" name="arquivo[]" type="file" class="file" data-show-preview="false">
      </p>

      <p>
         <label class="form-label" for="customFile">Foto 3x4</label>
         <input id="imgFoto" name="arquivo[]" type="file" class="file" data-show-preview="false">
      </p>

      <p>
         <label class="form-label" for="customFile">Comprovante de residência</label>
         <input id="imgComResidencia" name="arquivo[]" type="file" class="file" data-show-preview="false">
      </p>

      <p>
         <label class="form-label" for="customFile">Último certificado</label>
         <input id="imgUltCertificado" name="arquivo[]" type="file" class="file" data-show-preview="false">
      </p>

      <p>
         <label class="form-label" for="customFile">Anexo</label>
         <input id="img" name="arquivo[]" type="file" class="file" data-show-preview="false">
      </p>

	</fieldset>
	<div class="form-actions">
	<br/>
		<button type="submit" class="btn btn-success">Adicionar</button>
		<a href="index.php" type="btn" class="btn btn-outline-dark">Voltar</a>
	</div>
</form>
	</div>
</div>
</div>
</div>
<script src="https://jsuites.net/v3/jsuites.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>