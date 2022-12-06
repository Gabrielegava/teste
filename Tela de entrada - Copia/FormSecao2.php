<!-- <?php

     session_start();

?>

<html lang="en">
<head>
    <title>Form Secão 2</title>
</head>
<body>
    <?php
          if(session_is_registered("user")){
            print "Sessão criada com sucesso.";
          } else{
            print "A sessão não foi criada, login e senha incorretos";
          }

          session_destroy();
    ?>

    <br><br>
    <a href= "login.html">Voltar para tela de Autenticação</a>
</body>
</html> -->