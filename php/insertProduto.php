<?php 

include_once "../src/class/Painel.php";
include_once "../src/class/conexao.php";

$dados = filter_input_array(INPUT_POST,  FILTER_DEFAULT);

$file = $_FILES['imagem'];



if(!empty($dados['nome'])){

       #VALIDANDO A IMAGEM
       if($file['type'] == 'image/jpeg' ||
       $file['type'] == 'image/jpg' ||
       $file['type'] == 'image/png' ) {
           #SE TIVER DENTRO DAS NORMAS IRÁ SER SALVA
           $formato = explode('.',$file['name']);
           $imagemNome = uniqid().'.'.$formato[count($formato) - 1];
           move_uploaded_file($file['tmp_name'],'../src/uploads/'.$imagemNome);
             $imagem = $imagemNome ;
           
       }else{
           #SE NÃO IRÁ SER NULL
           $imagem = '' ;
       }
   

    //  $nome=  $dados['nome'];
    //  $descricao=  $dados['descricao'];
    //  $largura=  $dados['largura'];
    //  $altura=  $dados['altura'];
    //  $comprimento=  $dados['comprimento'];
    //  $peso=  $dados['peso'];
    //  $quantidade=  $dados['quantidade'];
     
    // $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.estoque` VALUES(null,?,?,?,?,?,?,?)");
    // $sql->execute(array($nome,$descricao,$largura,$altura,$comprimento,$peso,$quantidade));

     $query = "INSERT INTO `tb_admin.estoque` (nome , descricao, largura, altura,comprimento, peso, quantidade, imagem) VALUES(:nome, :descricao, :largura, :altura, :comprimento, :peso, :quantidade, :imagem)";
     $cad_coment = $conn->prepare($query);
     $cad_coment->bindParam(':nome', $dados['nome']);
     $cad_coment->bindParam(':descricao', $dados['descricao']);
     $cad_coment->bindParam(':largura', $dados['largura']);
     $cad_coment->bindParam(':altura', $dados['altura']);
     $cad_coment->bindParam(':comprimento', $dados['comprimento']);
     $cad_coment->bindParam(':peso', $dados['peso']);
     $cad_coment->bindParam(':quantidade', $dados['quantidade']);
     $cad_coment->bindParam(':imagem', $imagem);
     $cad_coment->execute();


    
    

    $retorna = ['erro' => false, 'msg' => 'Produto cadastrado'];
}else{
    $retorna = ['erro' => true, 'msg' => 'Erro ao cadastrar o produto'];
}    

echo json_encode($retorna );