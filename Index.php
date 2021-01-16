<!DOCTYPE HTML>
<html>
	<head>
		<title>Cadastro de Alunos Águas Claras Youbukan II</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
	<body>
	<div class="container">
		<div class="jumbotron">
			<div class="row">
				<h2>Cadastro de Alunos Águas Claras Youbukan II</h2>
			</div>
		</div>
	</div>
		<?php
			include 'Conexao.php';
			$sql_code = "select * from cadastro";
			$sql_query=$mysqli->query($sql_code) or die($mysqli->error);
			$linha = $sql_query-> fetch_assoc();
		?>
		<p>
		<a class="btn btn-success" href="cadastrar.php">Novo cadastro</a>
		</br>
		</p>
		<table class="table">
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Celular</th>
			<th>E-mail</th>
			<th>Academia</th>
			<th>Anexo 1</th>
			<th>Anexo 2</th>
			<th>Anexo 3</th>
			<th>Anexo 4</th>
			<th></th>
		</tr>
		<?php
			do{
		?>
		<tr>
			<td><?php if (!empty($linha['id'])) echo $linha['id']; ?></td>
			<td><?php if (!empty($linha['nome'])) echo $linha['nome']; ?></td>
			<td><?php if (!empty($linha['celular'])) echo $linha['celular']; ?></td>
			<td><?php if (!empty($linha['email'])) echo $linha['email']; ?></td>	
			<td><?php if (!empty($linha['academia'])) echo $linha['academia']; ?></td>	
			<td>
				<a href="/upload/<?php echo $linha['arquivoRG']; ?>"> <?php if (!empty($linha['arquivoRG'])) echo "Download";?>   </a></td>
			<td>
				<a href="/upload/<?php echo $linha['arquivoFoto']; ?>"><?php if (!empty($linha['arquivoFoto'])) echo "Download";?> </a></td>
			<td>
				<a href="/upload/<?php echo $linha['arquivoComResidencia']; ?>"><?php if (!empty($linha['arquivoComResidencia'])) echo "Download";?> </a></td>
			<td>
				<a href="/upload/<?php echo $linha['arquivoUltimoCertificado']; ?>"><?php if (!empty($linha['arquivoUltimoCertificado'])) echo "Download";?> </a></td>	
				
			<td><a class="btn btn-warning" href="alterar.php?id=<?php echo $linha['id']; ?>">Atualizar</a>
				<a class="btn btn-danger" 
					href="javascript: if(confirm('Deseja excluir o cadastro <?php echo $linha['nome']; ?>'))
					location.href='excluir.php?id=<?php echo $linha['id']; ?>';">Deletar</a>
			</td>
		</tr>
		<?php
			}while($linha = $sql_query-> fetch_assoc());
		?>
		</table>
		
		
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>