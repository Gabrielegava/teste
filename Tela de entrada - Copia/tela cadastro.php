<html lang="en"> 

<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_cadastro.css"> 
    <title>Cadastrar Cliente</title> 
    
</head>

<body> 

  <div id="content"> 
      <div class="logo">
        <img src="aaaa.png">    
     </div>

      <form name="form" enctype='multipart/form-data' method="post" action="inserecliente.php" onsubmit="return validation()"> 
      
          <div class="blocoesq">
            <div class="form-row"> 
                  <div class="form-group col-md-6"> 
                    <label for="inputName"></label> 
                    <input type="text" class="name" name="nome" id="name" placeholder="Nome" maxlength="60" required="required">
                  </div> 

                  <div class="form-group col-md-6"> 
                      <label for="inputAddress"></label> 
                      <input type="text" class="name" name="endereco" id="endereco" aria-label="Endereço" placeholder="Endereço"  maxlength="150"required="required"> 
                  </div> 
                </div> 

                <div class="form-group"> 
                  <label for="inputTelephone"></label> 
                  <input type="text" class="name" name="telefone" id="telefone" placeholder="Telefone"  max="11" required="required"> 
                </div> 
          </div>

          <div class="blocodir"> 
            <div class="form-group"> 
              <label for="inputEmail"></label> 
              <input type="email" class="name1" name="email" id="email" placeholder="Email" maxlength="60" required="required"> 
            </div> 

            <div class="form-row"> 
              <div class="form-group col-md-6"> 
                <label for="inputPassword"></label> 
                <input type="password" class="name1" name="senha" id="senha" aria-label="Senha" placeholder="Senha" required="required"> 
              </div> 

              <div class="form-row"> 
                <div class="form-group col-md-6"> 
                  <label for="inputPassword2"></label> 
                  <input type="password" class="name1" id="confirmsenha" aria-label="confirmar senha" placeholder="Confirme sua senha" required="required"> 
                </div> 
              </div>

            
            <button class="button" class="botao" onclick="validar()" > Enviar</button>
            <!--input type="submit" name="Enviar"/--> 
          </div>
        </div>
      </form> 
        
  </div>
</body> 

</html> 