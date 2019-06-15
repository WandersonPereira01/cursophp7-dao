<?php 

require_once("config.php");

//carrega 1 usuário
//$root = new Usuario();
//$root->loadById(1);
//echo $root;


//carrega uma lista de usuários
//Como é um método estático, não precisa ser instanciado
//$lista = Usuario::getLista();
//echo json_encode($lista);


//carrega a lista de usuários buscando pelo login
//$busca = Usuario::search("ma"); // vai retornar todos os usuarios que começam com 'ma'
//echo json_encode($busca);


//carrega um usuário usando o login e a senha
$usuario = new Usuario();
$usuario->login("Manolo", "qwert");

echo $usuario;


