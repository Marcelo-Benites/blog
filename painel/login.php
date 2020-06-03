<?php
  if(isset($_COOKIE['lembrar'])){
      $user = $_COOKIE['user'];
      $password = $_COOKIE['password'];
      $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ?AND password = ?");
      $sql->execute(array($user,$password));
      if($sql->rowCount() == 1){  
        $info = $sql->fetch();

       $_SESSION['login'] = true;
       $_SESSION['user'] = $user;
       $_SESSION['password'] = $password;
       $_SESSION['id_user'] = $info['id'];
       $_SESSION['nome'] = $info['nome'];
       $_SESSION['cargo'] = $info['cargo'];
       $_SESSION['img'] = $info['img'];
        header('Location:'.INCLUDE_PATH_PAINEL);
        die();

      }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,300&display=swap" rel="stylesheet">
	 <meta charset="viewport" content="width=device-width;initial-scale=1.0;maximum-scale=1.0">
	<meta name="keyworks" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrção do meu website">
	<meta charset="utf-8">
</head>
<body>
    <div class="box-login">
    	<?php
    	 if(isset($_POST['acao'])){
    	 	$user = $_POST['user'];
    	 	$password = $_POST['password'];
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
            $sql->execute(array($user,$password));
            if($sql->rowCount() == 1){
            	$info = $sql->fetch();
               //Logamos com sucesso!!
               $_SESSION['login'] = true;
               $_SESSION['user'] = $user;
               $_SESSION['password'] = $password;
               $_SESSION['id_user'] = $info['id'];
               $_SESSION['nome'] = $info['nome'];
               $_SESSION['cargo'] = $info['cargo'];
               $_SESSION['img'] = $info['img'];
               if(isset($_POST['lembrar'])){
                    setcookie('lembrar',true,time()+(60*60+24),'/');
                    setcookie('user',$user,time()+(60*60+24),'/');
                    setcookie('password',$password,time()+(60*60+24),'/');
               }
               header('Location:'.INCLUDE_PATH_PAINEL);
               die();
            }else{
            	//Falhou
            	echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos</div>';
            }

    	 }
    	?>
    	<h2>Efetue o login:</h2>
    	<form method="post">
    		<input type="text" name="user" placeholder="login..." required>
    		<input type="password" name="password" placeholder="senha..." required>
        <div class="form-group-login left">
    		<input type="submit"  name="acao"   value="Logar!">
      </div>
      <div class="form-group-login right">
        <label>Lembrar-me</label>
        <input type="checkbox" name="lembrar">
      </div>
      <div class="clear"></div>
    	</form>
    </div><!--box-login-->
</body>
</html>