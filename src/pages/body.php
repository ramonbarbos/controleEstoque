<?php
include '../class/Painel.php';
include '../class/Componente.php';
   

?>



<div class="container">

<h3><i class='bx bxs-note'></i> Produtos</h3>

    <div class="container-cadastros">

             <div class="info">
                    <?php
                            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE quantidade = 0");
                            $sql->execute();
                            if($sql->rowCount() > 0 ){
                                Painel::alerta('sucesso','<div class="alert alert-warning" style="color:#85202e; font-size: 22px;" role="alert"><i class="bx bxs-info-circle"   ></i>Voce está com produtos em falta! Clique <a data-bs-toggle="modal" data-bs-target="#viewPendentes" style="color:blue;"> aqui </a> para ver</div>');
                            }

                        ?>
                    
             </div>
  
                <form style="width: 600px;" method="post" enctype="multipart/form-data">  

                    <div class="mb-3 d-flex">
                        <input type="text"  class="form-control" name="busca" placeholder="Pesquisar">
                        <input type="submit" class="btn btn-outline-dark" value="Buscar" name="acao">
                    </div>
                </form>

        <div class="content-table">
                            
             
             <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nome do Produto</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col"> </th>
                                    <th scope="col"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                            $query = ''; 
                                            if(isset($_POST['acao']) && $_POST['acao'] == 'Buscar'){
                                                $nome  = @$_POST['busca'];
                                                $query = " WHERE nome LIKE '%$nome%' OR descricao LIKE '%$nome%' ";
                                                
                                            }

                                            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` $query");
                                        $sql->execute();
                                        $produtos = $sql->fetchAll();
                                        $produtosUni = $sql->fetch();
                                        if((count($produtos) == 0 ) || (@$produtosUni['quantidade'] == '0') ){
                                            echo 'Nenhum produto encontrado, pesquise novamente!';
                                            }
                                        foreach( $produtos as $key => $value){ 
                                            if($value['quantidade'] == '0')
                                                continue;
                                           
                                            
                                    ?>
              
                                    <tr>
                                        <th scope="row"><?php echo $value['id'] ?></th>
                                        <td><?php echo $value['nome'] ?></td>
                                        <td><?php echo $value['quantidade'] ?></td>
                                        <td><a     onclick="editarProd(<?php echo $value['id'] ?>)" data-bs-toggle="modal" data-bs-target="#staticBackdrop" ><i class='bx bxs-pencil' style='color:#01aaf6; font-size:25px'  ></i></a></td>
                                        <td><a     onclick="apagarProd(<?php echo $value['id'] ?>)" ><i class='bx bxs-trash' style='color:#f60118;font-size:25px'  ></i></a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                    </table>
                                
        </div>
                    

    </div>


</div>

        <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
                <div class="modal-body" >
                

                <span id="msgRes" ></span>
                <span id="msgADD" ></span>

                    <div class="">
                        <span id="imgProd"></span>
                    </div>
                <form action="" method="post" id="formProd">
                
                    <div class="card-body">
                        <div class="contentLabel">
                            <span class="textlabel">Nome:</span>
                            <span id="nome"></span>
                        </div>
                        <div class="contentLabel">
                            <span class="textlabel">Descrição:</span>
                            <span id="descricao"></span>
                        </div> 
                        <div class="contentLabel">
                            <span class="textlabel">Largura:  </span>
                            <span id="largura"></span>
                        </div>  
                        <div class="contentLabel">
                            <span class="textlabel">Altura:  </span>
                            <span id="altura"></span>
                        </div> 
                        <div class="contentLabel">
                            <span class="textlabel">Comprimento:  </span>
                            <span id="comprimento"></span>
                        </div> 
                        <div class="contentLabel">
                            <span class="textlabel">Peso:  </span>
                            <span id="peso"></span>
                        </div> 
                        <div class="contentLabel">
                            <span class="textlabel">Quantidade:  </span>
                            <span id="quantidade"></span>
                        </div> 
                            <span id="id" ></span>
                        <div class="d-flex" >
                            <input type="button" onclick="upProd()" class="btn btn-outline-success" value="Salvar" >
                        </div>
                </form>
                        
               
            </div>
      </div>
      
    </div>
  </div>
</div>


        <!-- Modal View -->
        <div class="modal fade" id="viewPendentes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewPendentesdrop" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewPendentesdrop">Editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
                <div class="modal-body" >
                
                <div class="content-table">
                            
             
                            <table class="table table-hover">
                                               <thead>
                                                   <tr>
                                                   <th scope="col">Codigo</th>
                                                   <th scope="col">Nome do Produto</th>
                                                   <th scope="col">Quantidade</th>
                                                   <th scope="col"> </th>
                                                   <th scope="col"> </th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                               <?php 
                      

                                                    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE quantidade = 0 ");
                                                    $sql->execute();
                                                    $produtos = $sql->fetchAll();
                                                    if(count($produtos) == 0){
                                                        echo 'Nenhum produto em falta!';
                                                    }
                                                    foreach( $produtos as $key => $value){ 
                                                

                      
                                                   ?>

                             
                                                   <tr>
                                                       <th scope="row"><?php echo $value['id'] ?></th>
                                                       <td><?php echo $value['nome'] ?></td>
                                                       <td><?php echo $value['quantidade'] ?></td>
                                                       <td><a     onclick="editarProd(<?php echo $value['id'] ?>)" data-bs-toggle="modal" data-bs-target="#staticBackdrop" ><i class='bx bxs-pencil' style='color:#01aaf6; font-size:25px'  ></i></a></td>
                                                       <td><a     onclick="apagarProd(<?php echo $value['id'] ?>)" data-bs-toggle="modal" data-bs-target="#staticBackdrop" ><i class='bx bxs-trash' style='color:#f60118;font-size:25px'  ></i></a></td>
                                                   </tr>
                                                   <?php } ?>
                                               </tbody>
                                   </table>
                                               
                       </div>
               
            </div>
      </div>
      
    </div>
  </div>
</div>
