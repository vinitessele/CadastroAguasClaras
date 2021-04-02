<!DOCTYPE HTML>
<html>
	<head>
		<title>Cadastro de Alunos Águas Claras Yobukan II</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
''	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<div class="d-flex justify-content-center">
					<h2>Cadastro de Alunos Dojo Águas Claras Yobukan II</h2>
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-center">
			<form method="POST" action="index.php">
				<fieldset id="Identificacao">
					<legend>Identificação Professor</legend>
					<label class="form-label">Login:</label>
					<input type="text" class="form-control" name="login" id="login"><br>
					<label class="form-label" >Senha:</label>
					<input class="form-control" type="password" name="senha" id="senha"><br>
					<input type="submit" class="btn btn-secondary" value="Logar" id="logar" name="enviar-formulario">
				</fieldset>

				<fieldset id="Alteracao">
					<div class="d-flex justify-content-center">
						<h5>Deseja alterar seu cadastro?<br><br> informe seu cpf</h5>
					</div>
					<div class="d-flex justify-content-center">
						<p><label for="cCPF">CPF:</label> 
						<input type="text" name="tCPF" id="cCPF" placeholder="CPF" /></p>
					</div>
					</br></br>
					<div class="d-flex justify-content-center">
					<p>
						<input type="submit" class="btn btn-info btn-lg" value="Clique aqui para visualizar e alterar meu cadastro" id="Alterar" name="enviar-formulario">
					</p>
					</div>
				</fieldset>
			</form>
			</br>
			</br>
		</div>
		<?php
			include 'Conexao.php';
			$sql_query= '';
			$linha= '';
			if(isset($_POST['enviar-formulario'])){
				$login = $_POST['login'];
				$senha = $_POST['senha'];
				$cpf   = $_POST['tCPF'];
				if (empty($login) && empty($senha) && !empty($cpf))
				{ 
					$sql_code = "select * from cadastro where cpf='$cpf'";
					$sql_query=$mysqli->query($sql_code) or die($mysqli->error);
					$linha = $sql_query-> fetch_assoc();
				}
				else
				{
					$sql_code = "SELECT * FROM usuario WHERE login = '$login' and senha ='$senha'";
					$sql_query1=$mysqli->query($sql_code) or die($mysqli->error);
					$linha1 = $sql_query1-> fetch_assoc();

					if (is_array($linha1))
					{
							$sql_code = "select * from cadastro";
							$sql_query=$mysqli->query($sql_code) or die($mysqli->error);
							$linha = $sql_query-> fetch_assoc();
					}
					else
					{
						echo '</br><div class="alert alert-danger" role="alert">
							Login ou senha estão incorretos
						</div>';
					}
				}
		}

		?></br>
		</br></br>
		<div class="d-flex justify-content-center">
			<h5>
				Para preencher o cadastro deixe preparado os arquivos  RG, Último certificado, 
				Comprovante de residência, Foto 3X4, pois são necessários.
			</h5>
		</div>
			</br>
			<div class="d-flex justify-content-center">
				<h5>Pronto, podemos continuar?</h5>
			</div>

			<div class="d-flex justify-content-center">
			<p>
				<a class="btn btn-success btn-lg" href="cadastrar.php">Quero me cadastrar</a>
				</br>
			</p>
		</div>

		</br></br>

		<?php
			if (!empty($linha['id'])){
		?>
			<table id="myTable2" class="table">
			<tr>
				<th>Id</th>
				<th onclick="sortTable(0)">Nome</th>
				<th>Celular</th>
				<th>E-mail</th>
				<th>Academia</th>
				<th>Anexo 1</th>
				<th>Anexo 2</th>
				<th>Anexo 3</th>
				<th>Anexo 4</th>
				<th>Anexo 5</th>
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

				<td>
					<a href="/upload/<?php echo $linha['arquivo']; ?>"><?php if (!empty($linha['arquivo'])) echo "Download";?> </a></td>		

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
		<?php
			}
		?>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable2");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
	</body>
</html>