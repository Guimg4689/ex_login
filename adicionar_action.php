<?php 
require "conexao.php";

$cpf = filter_input(INPUT_POST,"cpf",FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST,"senha",FILTER_SANITIZE_SPECIAL_CHARS);
$conn = new Conexao();

if($nome && $senha && $cpf){

   $sql=$conn->conexao->prepare("SELECT * FROM usuarios WHERE cpf= :cpf");
   $sql->bindValue("cpf",$cpf);
   $sql->execute();

   if($sql->rowCount() === 0){
    $sql=$conn->conexao->prepare("INSERT INTO usuarios (cpf,nome,senha) VALUES (:cpf, :nome, :senha)");
    $sql->bindValue("cpf",$cpf);
    $sql->bindValue("nome",$nome);
    $sql->bindValue("senha",$senha);
    $sql->execute();
    header("location: home.php");
    exit;
   }else{
    header("location:cadastra.php");
    exit;
   }


   

   
}else{
   header("location:cadastra.php");
}
?>