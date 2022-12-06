<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coloque para adoção</title>
    <style>
        
         #content{ 
          background-color: white;
            text-align: center;
            font-size: 25px;
     } 

     .logo{
            margin-left: auto;
            max-width: 250%;
        }

    .name{
      margin-top: 1%;
      margin-left: 0%;
      border-radius: 25px;
      border-color: rgb(134, 186, 235);
      border-style: double;
      width: 40%;
      height: 10%;
      padding-left: 1%;


    }

    form{ 
        margin-left: 150px; 
        font-family: arial; 
        line-height:40px; 
        font-weight: bold; 
        width:500px; 
        height:130px; 
        margin-top: -8%; 
    } 

    .button{ 
      width: 20%;
      height: 10%;
      background: #ED7E32;
      border-radius: 40px;
      margin-left: auto;
      margin-top:  2%;
      border: none;
      font-family: Bahnschrift Light;
      font-size: 35px;
      color: #ffffff; 
      
    } 


    .enter{
            font-family: Bahnschrift Light;
            font-size: 20px;
            color: #ffffff;
            text-decoration: none;
        }

    .radio, .radio{
      width: 3%;
      height: 3%;
      color:#ED7E32;
      margin-left: 0%;
      margin-top: -5%;
    }
    
    .btnseta {
      width: 4%;
      height: 7%;
      margin-top: 1%;
      margin-left: -92%;
      background-color: #4B8DA5;
      font-size: 36px;
      color: #fff;
      border: none;
      border-radius: 9px;
    }

    .foto{
    font-family: Bahnschrift Light;
     font-size: 20px;
     margin-left: 0%;
     background-color: white;
    }
     p{
      font-family: Bahnschrift Light;
     font-size: 22px;
     margin-left: -9%;
    }
   

    input, span{
      font-family: Bahnschrift Light;
      font-size: 20px;
    }

    input[type=text]:focus {
     border: 3px solid #ED7E32;
   }


    .popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s
}

    </style>
    
</head>
<body>


    <!-- header -->
<div id="content"> 
     <button class="btnseta" onclick="location.href='telaentrada.php'" type="button">⟵</button>
        <div class="logo">
          <img src="aaaa.png">    
      </div>
    

        <div class="form-row"> 
           <form action="insereadocao.php" name="form" id="form" enctype='multipart/form-data' method="post"  >
        </div>
        <!-- Diferenciação de macho ou fêmea -->
        <div class="form-group"> 
            <input class="radio" id="macho" type="radio" name="sexo" value="0" required= "selecione uma opção!!" ><span> Macho </span>
            <input class="radio" id="femea" type="radio" name="sexo" value="1"><span>Fêmea</span> 
        </div> 
       
      <!-- inputs que armazenam as informações dadas a publicação -->
        <div class="form-group col-md-6"> 
            <input class="name" type="text" name="porte" id="porte" aria-label="Porte" pattern="[^'\x22]+" placeholder="Porte" required>
        </div> 
    
        <div class="form-group col-md-6"> 
            <input type="text" class="name" name="raca" id="raca" aria-label="Raça" pattern="[^'\x22]+" placeholder="Raça" required> 
        </div>         
    
        <div class="form-group"> 
            <input class="name" id="idade" type="text" name="idade" placeholder="Idade"  required> 
        </div> 
    
        <div class="form-group col-md-6"> 
            <input type="text" class="name" name="descricao" id="descricao" aria-label="Descrição" placeholder="Descrição" required> 
        </div> 
        
       
            <p><input type="file" class="foto" name="foto" size="65" accept="image/*" required="Selecione uma imagem" ></p> 
            <!-- ------- UPLOAD DE IMAGEM ------ -->                        
      

        <button type="submit" class="button"  onclick="validar()" >Publicar</button>
        
    </form>
   
    </div>





</body>
</html>
