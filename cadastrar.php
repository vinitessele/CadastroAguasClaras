<?php
$validacao = True;
$img1 ='';
$img2 ='';
$img3 ='';
$img4 ='';
$img5 ='';

if(isset($_POST['enviar-formulario'])){
   if (!empty($_POST['tNome'])) {
      $nome = $_POST['tNome'];
   } else {
      $validacao = False;
   }
   if (!empty($_POST['tEndereco'])) {
      $endereco = $_POST['tEndereco'];
   } else {
      $validacao = False;
   }
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
                     $img4 = md5(time()) .'.'. $extencao;. $extencao;
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

$Mae = $_POST['tMae'];     
$Pai = $_POST['tPai'];     
$Peso = $_POST['tPeso'];     
$complemento = $_POST['tComplemento'];
$bairro  = $_POST['tBairro'];
$cep = ($_POST['tCep']);
$cidade  = ($_POST['tCidade']);
$estado  = ($_POST['tEstado']);
$telefone  = ($_POST['tTelefone']);
$celular  = ($_POST['tCelular']);
$email  = ($_POST['tEmail']);
$dt_nascimento   = ($_POST['tDtNascimento']);
$dt_nascimento   = date('Y-m-d', strtotime($dt_nascimento));
$dt_inicio   = ($_POST['tDtInicio']);
$dt_inicio   = date('Y-m-d', strtotime($dt_inicio));
$nacionalidade  = ($_POST['tNacionalidade']);
$profissao   = ($_POST['tProfissao']);
$professor  = ($_POST['tProfessor']) ;
$cpf   = ($_POST['tCPF']);
$rg  = ($_POST['tRG']);
$orgaoexpedidor  = ($_POST['tOrgaoExpedidor']);
$academia = ($_POST['tAcademia']);
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

//Inserindo no Banco:
    if ($validacao) {
        include 'Conexao.php';
        $sql_query = false;
        $sql_code = "INSERT INTO cadastro (nome, endereco, complemento, 
                                           bairro, cep, cidade, estado, 
                                           telefone, celular, email, 
                                           dt_nascimento, nacionalidade,
                                           profissao, cpf, rg, orgaoexpedidor,
                                           academia, professor, arquivoRG, arquivoFoto, arquivoComResidencia, arquivoUltimoCertificado,
                                           kyu9,
                                           kyu8,
                                           kyu7,
                                           kyu6,
                                           kyu5,
                                           kyu4,
                                           kyu3,
                                           kyu2,
                                           kyu1,
                                           Dan1,
                                           Dan2,
                                           Dan3,
                                           Dan4,
                                           Dan5,
                                           Dan6,
                                           Dan7,
                                           Dan8, dt_inicio, Mae, Pai, Peso, arquivo) 
                                           VALUES('$nome','$endereco','$complemento',
                                           '$bairro','$cep','$cidade','$estado',
                                           '$telefone','$celular','$email',
                                           '$dt_nascimento','$nacionalidade',
                                           '$profissao','$cpf','$rg','$orgaoexpedidor',
                                           '$academia','$professor', '$img1','$img2','$img3','$img4',
                                           '$kyu9',
                                           '$kyu8',
                                           '$kyu7',
                                           '$kyu6',
                                           '$kyu5',
                                           '$kyu4',
                                           '$kyu3',
                                           '$kyu2',
                                           '$kyu1',
                                           '$Dan1',
                                           '$Dan2',
                                           '$Dan3',
                                           '$Dan4',
                                           '$Dan5',
                                           '$Dan6',
                                           '$Dan7',
                                           '$Dan8','$dt_inicio', '$Mae','$Pai','$Peso','$img5')";
        //echo $sql_code;
        $sql_query=$mysqli->query($sql_code) or die($mysqli->error);
        if($sql_query==true)
        {
         echo   '<div class="alert alert-success">
                <strong>Sucesso!</strong> Cadastro realizado com sucesso.
                </div>';
        }
        else
        {
            echo ''.mysql_error();
        }
    }
   }
?>
<!DOCTYPE html>
<html>
<head>
		<title>Cadastro</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Cadastro do Aluno</title>
</head>
<body>
<div class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
				<h1>Cadastro do Aluno</h1>
            </div>
<div class="card-body">
<form action="cadastrar.php" method="POST" enctype="multipart/form-data">
	<fieldset id="Cadastro do Aluno">
		<legend>Identificação</legend>
			
         <p><label for="cNome">Nome:</label> 
				<input type="text" class="form-control" name="tNome" 
				id="cNome" placeholder="Insira seu nome" 
				required name="tNome" title="Preencha o campo Nome***"/></p>
				
			<p><label for="cEmail">E-mail:</label> 
				<input type="email" class="form-control"  name="tEmail" id="cEmail" 
                placeholder="Insira seu e-mail" required/></p>

         <p><label for="cMae">Nome da Mãe:</label> 
				<input type="text" class="form-control"  name="tMae" id="cMae" 
                placeholder="Nome da mãe" /></p>
         
         <p><label for="cPai">Nome do Pai:</label> 
				<input type="text" class="form-control"  name="tPai" id="cPai" 
                placeholder="Nome do Pai" /></p>

         <p><label for="cPeso">Peso atual:</label> 
				<input type="text" class="form-control"  name="tPeso" id="cPeso" 
                placeholder="Peso atual" /></p>

			<p><label for="cTelefone">Telefone:</label> 
				<input type="text" class="form-control" name="tTelefone" id="cTelefone" 
               placeholder="Insira seu telefone"/></p>

         <p><label for="cCelular">Celular:</label> 
				<input type="text" class="form-control" name="tCelular" id="cCelular" 
                placeholder="Insira seu Celular" required/></p>
				
			<p><label for="cEndereco">Endereço:</label> 
				<input type="text" class="form-control" name="tEndereco" id="cEndereco" placeholder="Endereço" /></p>
			
         <p><label for="cComplemento">Complemento:</label> 
				<input type="text" class="form-control" name="tComplemento" id="cComplemento" placeholder="Complemento" /></p>
			
         <p><label for="cBairro">Bairro:</label> 
				<input type="text" class="form-control" name="tBairro" id="cBairro" placeholder="Bairro" /></p>
            
         <p><label for="cCep">Cep:</label> 
				<input type="text" class="form-control" name="tCep" id="cCep" placeholder="Cep" /></p>
			
         <p><label for="cCidade">Cidade:</label> 
				<input type="text" class="form-control" name="tCidade" id="cCidade" placeholder="Cidade" /></p>
			
         <p><label for="cEstado">Estado:</label> 
				<input type="text" class="form-control" name="tEstado" id="cEstado" placeholder="Estado" /></p>

         <p><label for="cDataNascimento">Data de Nascimento:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDtNascimento" id="cDataNascimento" placeholder="Data Nascimento" /></p>
            
         <p><label for="cDataInicio">Data de início com o Karatê:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDtInicio" id="cDataInicio" placeholder="Data inicio com o Karatê" /></p>   
         
         <p><label for="cNacionalidade">Nacionalidade:</label> 
				<input type="text" class="form-control" name="tNacionalidade" id="cNacionalidade" placeholder="Nacionalidade" /></p>
            
         <p><label for="cProfissao">Profissão:</label> 
				<input type="text" class="form-control" name="tProfissao" id="cProfissao" placeholder="Profissão" /></p>
            
         <p><label for="cCPF">CPF:</label> 
				<input type="text" class="form-control" name="tCPF" id="cCPF" placeholder="CPF" required/></p>
            
         <p><label for="cRG">RG:</label> 
				<input type="text" class="form-control" name="tRG" id="cRG" placeholder="RG" /></p>
            
         <p><label for="cOrgaoExpedidor">Orgão Expedidor:</label> 
				<input type="text" class="form-control" name="tOrgaoExpedidor" id="cOrgaoExpedidor" placeholder="Orgão Expedidor" /></p>
            
         <p><label for="cAcademia">Academia:</label> 
				<input type="text" class="form-control" name="tAcademia" id="cAcademia" placeholder="Academia" /></p>

         <p><label for="cProfessor">Professor:</label> 
				<input type="text" class="form-control" name="tProfessor" id="cProfessor" placeholder="Professor" /></p>   

         <p><label for="cKyu9">Kyu 9:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu9" id="cKyu9" placeholder=" Data Kyu 9" /></p>
         
         <p><label for="cKyu8">Kyu 8:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu8" id="cKyu8" placeholder="Data Kyu 8" /></p>
         
         <p><label for="cKyu7">Kyu 7:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu7" id="cKyu7" placeholder="Data Kyu 7" /></p>
         
         <p><label for="cKyu6">Kyu 6:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu6" id="cKyu6" placeholder="Data Kyu 6" /></p>
         
         <p><label for="cKyu5">Kyu 5:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu5" id="cKyu5" placeholder="Data Kyu 5" /></p>
         
         <p><label for="cKyu4">Kyu 4:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu4" id="cKyu4" placeholder="Data Kyu 4" /></p>
            
         <p><label for="cKyu3">Kyu 3:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu3" id="cKyu3" placeholder="Data Kyu 3" /></p>
         
         <p><label for="cKyu2">Kyu 2:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu2" id="cKyu2" placeholder="Data Kyu 2" /></p>
         
         <p><label for="cKyu1">Kyu 1:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tKyu1" id="cKyu1" placeholder="Data Kyu 1" /></p>
         
         <p><label for="cDan1">DAN 1:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan1" id="cDan1" placeholder="Data Dan 1" /></p>
         
         <p><label for="cDan2">DAN 2:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan2" id="cDan2" placeholder="Data Dan 2" /></p>
         
         <p><label for="cDan3">DAN 3:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan3" id="cDan3" placeholder="Data Dan 3" /></p>
         
         <p><label for="cDan4">DAN 4:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan4" id="cDan4" placeholder="Data Dan 4" /></p>
         
         <p><label for="cDan5">DAN 5:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan5" id="cDan5" placeholder="Data Dan 5" /></p>
         
         <p><label for="cDan6">DAN 6:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan6" id="cDan6" placeholder="Data Dan 6" /></p>
         
         <p><label for="cDan7">DAN 7:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan7" id="cDan7" placeholder="Data Dan 7" /></p>
         
         <p><label for="cDan8">DAN 8:</label> 
				<input data-mask='dd/mm/yyyy' type="date" class="form-control" name="tDan8" id="cDan8" placeholder="Data Dan 8" /></p>

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
		<button type="submit" class="btn btn-success" name="enviar-formulario">Adicionar</button>
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