<?php

	/* include 'config.php'; */
	
	//logar usuário no sistema
	if(isset($_POST['login_btn'])){
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM usuario WHERE username = '$username' AND senha = '$password'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$_SESSION['username'] = $username;
			//colocar na session o ranking do usuário
			$sql = "SELECT * FROM usuario WHERE username = '$username'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$_SESSION['ranking'] = addslashes($row['RANKING']);
			$_SESSION['foto'] = $row['FOTO'];
			$_SESSION['logado'] = true;
			$_SESSION['nome'] = $row['NOME'];
			$_SESSION['id'] = $row['ID_USUARIO'];
			$_SESSION['rede_social'] = $row['REDE_SOCIAL'];
			$_SESSION['capa'] = $row['CAPA'];
			header("Location: ../public/index.php");
		}else{
			echo "Usuário ou senha incorretos!";
		}
	}