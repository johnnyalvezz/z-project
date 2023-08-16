<?php 

include('conexao.php');   // inclui a conexão com o banco de dados


session_start();   // starta a sessão



date_default_timezone_set("America/Sao_Paulo");
$datadehoje = date("Y-m-d H:i:s"); // pega a data de hoje e insere na variável
$timestamp_dt_atual = strtotime($datadehoje);    // aqui transformamos a data de hoje em timestamp unix, um modelo padrão 

$oi = $_SERVER['REMOTE_ADDR'];
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);  // pega o que tiver no post usuario e joga na variável usuario
$senha = mysqli_real_escape_string($conexao, $_POST['senha']); // pega o que tiver no post senha e joga na variável senha


$query = "select * from acesso where usuario = '{$usuario}' and senha = '{$senha}' ";   // abre uma query, selecionando tudo dentro de usuários onde o usuario for o que tiver na variavel usuario ( ou seja, o que for digitado no post usuario )
$result = mysqli_query($conexao, $query);  // passa a conexão entre query e banco de dados
$row = mysqli_num_rows($result);    // faz a contagem do numero de rows (linhas) encontradas no result

if($row == 1){ 

   $dados = mysqli_fetch_assoc($result);
    $_SESSION["success"] = true;
    $_SESSION["id"] = $dados["id"];
    $_SESSION["rank"] = $dados["rank"];
    $_SESSION["saldo"] = $dados["saldo"];
    $_SESSION["lives"] = $dados["lives"];
    $_SESSION["usuario"] = $dados["usuario"];
    $_SESSION["tipologin"] = $dados["tipologin"];
    $_SESSION["data"] = $dados["data"];

    // se tiver 1 linha ( ou seja, achou o usuário e senha correspondentes)

$sql= "SELECT (data) from acesso where usuario = '$usuario'";  // vai selecionar a data do usuario que tiver na variavel     
$sqlpassar = mysqli_query($conexao, $sql); // passamos a conexao entre a query novamente
$rowzinha = mysqli_fetch_array($sqlpassar);   // aqui vamos pegar o array da variavel anterior
     
$roz = $rowzinha['data'];   // vamos falar que a variavel $roz é o array da data, ou seja, vai selecionar a data daquele usuário
$timestamp_dt_expira = strtotime($roz);   // vamos converter novamente a variavel (roz) que guarda a data do usuário para timestamp unix
}else{                         // se não achar uma linha ( em possibilidade do usuario errar a senha, login ou similar ) 

    $_SESSION['nao_autenticado'] = true;    // abre uma sessão nao autenticado para o usuario
    header('Location: index.php');   // manda ele de volta para o login

    exit();   // finaliza
}



$sql= "SELECT (tipologin) from acesso where usuario = '$usuario'";  // vai selecionar a data do usuario que tiver na variavel     
$passa = mysqli_query($conexao, $sql); // passamos a conexao entre a query novamente
$bola = mysqli_fetch_array($passa);
$bo = $bola['tipologin'];


     if ($bo == 0) { 
	if($row == 1){  $_SESSION['usuario'] = $usuario;


$sss = $_SESSION["saldo"];
$le = $_SESSION["lives"];
$dadada = $_SESSION["data"];
#====================================
$botoken = "1659315500:AAEX8RoaZ4EWKMEY5fcklwdG5z0yVEFXOqM";
$data = ['text' => '[LOGIN] User: '.$usuario.' | IP: '.$oi.' | Créditos: '.$sss.' | Lives: '.$le.'','chat_id' => '-1001256771814'];
file_get_contents("https://api.telegram.org/bot$botoken/sendMessage?" . http_build_query($data) );




   // abre a sessão pro usuario
     header('Location: central/'); 
             exit;  }
	 }
if ($timestamp_dt_expira > $timestamp_dt_atual){ 


$botoken = "1659315500:AAEX8RoaZ4EWKMEY5fcklwdG5z0yVEFXOqM";
$data = ['text' => '[LOGIN] User: '.$usuario.' | IP: '.$oi.' | Vencimento: '.$roz.'','chat_id' => '-1001256771814'];
file_get_contents("https://api.telegram.org/bot$botoken/sendMessage?" . http_build_query($data) );


  // aqui continua o código, achando uma linha, ele vai conferir de a data de expiração é maior que a data atual, caso sim, então o usuário é permitido logar no sistema e acessar o conteúdo

     $_SESSION['usuario'] = $usuario; 
   // abre a sessão pro usuario
     header('Location: central/');   
      // manda ele pro conteudo


} else {     // se a data nao for maior ( ou seja, a data de expiração do usuário passou)
    $_SESSION['loginErro'] = true;    // abre uma sessão novamente (dica: receba essa sessão na pagina de login com um alerta para o usuário contatar um adm e renovar o mes)
    header('Location: index.php');    // manda ele pra pagina de login
    exit();    // finaliza
}

?>
