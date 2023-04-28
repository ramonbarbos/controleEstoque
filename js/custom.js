 //INSERINDO COMENTARIOS NA PUBLICAÇÃO

 async function insertProd(){

    const cadForm = document.getElementById("form-prod");

    const dadosForm =  new FormData(cadForm);
    dadosForm.append("add", 1)
    console.log(dadosForm)

    const dadosInsert = await fetch("php/insertProduto.php",{
        method: "POST",
        body:dadosForm
    });

    const respostaInsert = await dadosInsert.json();
    console.log(respostaInsert);

    if(respostaInsert['erro']){
       
       document.getElementById('msg').innerHTML ='<div class="alert alert-danger" style="color:#85202e; font-size: 22px;" role="alert"><i class="bx bxs-info-circle"   ></i>'+respostaInsert['msg']+'</div>'  ;
    }else{
        document.getElementById('msg').innerHTML ='<div class="alert alert-success" style="color:#0f5132;font-size: 22px;" role="alert"><i class="bx bx-check"   ></i>'+ respostaInsert['msg']+'</div>'  ;
    }

    //return false;

 }
 
  //DELETAR  PUBLICAÇÃO
  async function apagarProd(id){
    console.log("Envido: " +id)
    const dados = await fetch("php/apagarProd.php?id=" + id) //enviar
    const resposta = await dados.json(); //receber
    

    if(resposta['erro']){
        
        alert(resposta['msg'])
         }else{
    
        alert(resposta['msg'])
            
        }

    window.location.reload();



}

  //BUSCAR PRODUTO
  async function editarProd(id){
    console.log("Envido: " +id)
    const dados = await fetch("php/consultaProd.php?id=" + id) //enviar
    const resposta = await dados.json(); //receber
    console.log(resposta)

    if(resposta['erro']){
    document.getElementById('msgRes').innerHTML ='<div class="alert alert-danger" role="alert">'+resposta['msg']+'</div>'  ;
    
     }else{

        document.getElementById('imgProd').innerHTML = '<img src="./src/uploads/'+resposta['dados'].imagem+'" class="card-img" alt="...">' ;
        document.getElementById('nome').innerHTML = '<input type="text" name="nome" id="nome" class="" value="'+resposta['dados'].nome+'" >' ;
        document.getElementById('descricao').innerHTML = '<input type="text" name="descricao" id="descricao" class="" value="'+resposta['dados'].descricao+'" >' ;
        document.getElementById('largura').innerHTML = '<input type="number" name="largura" id="largura" class="" value="'+resposta['dados'].largura+'" >' ;
        document.getElementById('altura').innerHTML = '<input type="number" name="altura" id="altura" class="" value="'+resposta['dados'].altura+'" >' ;
        document.getElementById('comprimento').innerHTML = '<input type="number" name="comprimento" id="comprimento" class="" value="'+resposta['dados'].comprimento+'" >' ;
        document.getElementById('peso').innerHTML = '<input type="number" name="peso" id="peso" class="" value="'+resposta['dados'].peso+'" >' ;
        document.getElementById('quantidade').innerHTML = '<input type="number" name="quantidade" id="quantidade" class="" value="'+resposta['dados'].quantidade+'" >' ;
        document.getElementById('id').innerHTML = '<input type="hidden" name="id" id="id" class="" value="'+resposta['dados'].id+'" >' ;
        
    }

 }

    //UPDATE NA PUBLICAÇÃO

    async function upProd(){

    const cadForm = document.getElementById("formProd");

        console.log("chegou a requisição para ser atualizada")

        const dadosForm =  new FormData(cadForm);
        dadosForm.append("add", 1)

        const dadosPubli = await fetch("php/atualizarProd.php",{
            method: "POST",
            body:dadosForm
        });
        const respostaPubli = await dadosPubli.json();
        console.log(respostaPubli)

        if(respostaPubli['erro']){
            document.getElementById('msgADD').innerHTML ='<div class="alert alert-danger" role="alert">'+respostaPubli['msg']+'</div>'  ;
            
                //const visModal = document.getElementById("feedUser");
            // visModal.show();
        }else{
            document.getElementById('msgADD').innerHTML ='<div class="alert alert-success" role="alert">'+respostaPubli['msg']+'</div>'  ;

            console.log(respostaPubli);
        }


 }

 

