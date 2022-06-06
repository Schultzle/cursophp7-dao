<?php
    require_once("config.php");
//carrega um usuario
//$jose = new Usuario();
//$jose->loadById(3);
//echo $jose;



//carrega uma lista de usuarios
//$lista = Usuario::getList();
//echo json_encode($lista);

//carregar uma lista de usuarios buscando pelo login
//$search = Usuario::search("jo");
//echo json_encode($search);

//carregar usuário usando login e senha
//$usuario = new Usuario();
//$usuario->login("jose","1234567");
//echo $usuario;


//Criando um novo usuário
//$aluno = new Usuario();
//$aluno->setDeslogin("aluno");
//$aluno->setDessenha("@lun0");
//$aluno->insert();
//echo $aluno; 

$usuario= new Usuario();
$usuario->loadById(8);
$usuario->update("professor","professor123");
echo $usuario;



    