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
//$usuario = new Usuario();
//$usuario->login("user", "1234");
//echo $usuario;

/*INSERT novo usuario
$aluno = new Usuario();
$aluno->setDeslogin("aluno");
$aluno->setDessenha("!@#$");
$aluno->insert();
echo $aluno;
*/

/*INSERT usando o método construtor
$aluno = new Usuario("João","$#@!");
$aluno->insert();
echo $aluno;
*/

//UPDATE
$usuario = new Usuario();
//Carregando o usuário para poder fazer o update
$usuario->loadById(14);
$usuario->update("professor", "1478582");

