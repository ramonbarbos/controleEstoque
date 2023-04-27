<div class="container">

<h3><i class='bx bxs-package' ></i> Cadastro de Produtos</h3>

    <div class="container-principal">

                

                <form id="form-prod" style="width: 600px;" method="post" enctype="multipart/form-data">

                <div id="msg" ></div>

                
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do produto</label>
                        <input type="text" class="form-control" id="nome" name="nome" >
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Descrição do Produto</label>
                        <input type="text" class="form-control" id="descricao" name="descricao">
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Largura</label>
                        <input type="number" name="largura" min="0" max="900" step="1" class="form-control" value="0" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Altura</label>
                        <input type="number" name="altura" min="0" max="900" step="1" class="form-control" value="0" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comprimento</label>
                        <input type="number" name="comprimento" min="0" max="900" step="1" class="form-control" value="0" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Peso</label>
                        <input type="number" name="peso" min="0" max="900" step="1" class="form-control" value="0" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantidade</label>
                        <input type="number" name="quantidade" min="0" max="900" step="1" class="form-control" value="0" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagem</label>
                        <input multiple type="file" class="form-control"  name="imagem">
                    </div>
                  
                    <input type="button" onclick="insertProd()" class="btn btn-outline-success" value="Casdastrar produto" >
               

                </form>

    </div>


</div>
