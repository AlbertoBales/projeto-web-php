<?php 
require_once 'CLASSES/usuarios.php';
$u = new Usuario();
?>

<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="shortcut icon" type="image/x-icon" href="img/8470jr.ico">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="css/estilo.css">

    <title>EspaçoVets</title>
  </head>
  <body>

  		<header>
  			<div class="center">
  				<div class="logo">
  					<img class="imagem" src="img/jr1.jpg">
  				</div>

  				<div class="clear"></div>
  			</div>
  		</header>

  		<section class="main">
  			<div class="center">
  				<div class="img-pessoas">
  					<img src="img/logo.png">
  				</div><!-- img-pessoas -->
       
  				<div class="abrir-conta">
         <form method="POST" class="criar-conta">   
            <div class="w50">
            <input type="hidden" name="action" value="submit-login" required>
            <div>
              </div>
              <input placeholder="Digite seu email" type="email" name="email" required>
            </div>
            <div class="w50">
            <div>
              
              <input placeholder="Digite sua senha" type="password" name="senha">
            </div>
          </div>
          <div class="w100">
          <div>
              
              <input type="submit" value="Entrar">
              
            </div>
          </div>
        </form>
         <?php
              if (isset($_POST) && isset($_POST['action']) && $_POST['action']=='submit-login')
              {

                       
                  if(isset($_POST['email']))
                  {
                    $email = addslashes($_POST['email']);
                    $senha = addslashes($_POST['senha']);
                    
                    if(!empty($email) && !empty($senha))
                    {
                      $u->conectar("espacovets","localhost","root","");
                      if($u->msgErro == "")
                      {
                        if($u->logar($email,$senha))
                        {
                          header("location: AreaPrivada.php");
                        }
                        else
                        {
                          ?>
                          <div class="msg-erro">
                            Email e/ou senha estão incorretos!
                          </div>
                          <?php
                        }
                      }
                      else
                      {
                        ?>
                        <div class="msg-erro">
                          <?php echo "Erro: ".$u->msgErro; ?>
                        </div>
                        <?php
                      }
                    }else
                    {
                      ?>
                      <div class="msg-erro">
                        Preencha todos os campos!
                      </div>
                      <?php
                    }
                  }

                }
                  ?>
  					<h2>Abra sua conta...</h2>
  					<h3>É gratuito e sempre será!</h3>

  					<form method="POST" class="criar-conta">
              <input type="hidden" name="action" value="submit-cadastro">
  						<div class="w50">
  							<input placeholder="Nome Completo" type="text" name="nome" maxlength="30" required>
  						</div><!-- w50 -->
  						<div class="w50">
  							<input type="text" name="telefone" class="telefone" placeholder="Telefone" maxlength="30" required>
                <script type="text/javascript">
                jQuery("input.telefone")
                      .mask("(99) 9999-9999?9")
                      .focusout(function (event) {  
                          var target, phone, element;  
                          target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
                          phone = target.value.replace(/\D/g, '');
                          element = $(target);  
                          element.unmask();  
                          if(phone.length > 10) {  
                              element.mask("(99) 99999-999?9");  
                          } else {  
                              element.mask("(99) 9999-9999?9");  
                          }  
        });
                      </script>
  						</div><!-- w50 -->
  						<div class="w100">
  							<input type="email" name="email" placeholder="Usuário" maxlength="40" required>
  						</div><!-- w100 -->
  						<div class="w100">
  							<input type="password" id="pass" name="senha" placeholder="Senha" maxlength="15" required>
                <img src="https://cdn0.iconfinder.com/data/icons/ui-icons-pack/100/ui-icon-pack-14-512.png" id="olho" class="olho">
  						</div><!-- w100 -->
              <div class="w100">
                <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15" required>
                
              </div><!-- w100 -->
              <div class="clear"></div>

  						<div class="w100">
  							<input type="submit"  value="Cadastrar!" onclick="return validar()">
                
  						</div><!-- w100 -->
  						<div class="clear"></div>
             <?php
                // verifica se alguem "submitou" um formulario, e qual foi esse formulario
                if (isset($_POST) && isset($_POST['action']) && $_POST['action']=='submit-cadastro')
              {
              
                        //verificar se clicou no botao
                        if(isset($_POST['nome']))
                        {
                          $nome = addslashes($_POST['nome']);
                          $telefone = addslashes($_POST['telefone']);
                          $email = addslashes($_POST['email']);
                          $senha = addslashes($_POST['senha']);
                          $confirmarSenha = addslashes($_POST['confSenha']);
                          //verificar se esta preenchido
                          if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
                          {
                            $u->conectar("espacovets","localhost","root","");
                            if($u->msgErro == "")//se esta tudo ok
                            {
                              if($senha == $confirmarSenha)
                              {
                                if($u->cadastrar($nome,$telefone,$email,$senha))
                                {
                                  ?>
                                  <div id="msg-sucesso">
                                  Cadastrado com sucesso! Acesse para entrar!
                                  </div>
                                  <?php
                                }
                                else
                                {
                                  ?>
                                  <div class="msg-erro">
                                    Email ja cadastrado!
                                  </div>
                                  <?php
                                }
                              }
                              else
                              {
                                ?>
                                <div class="msg-erro">
                                  Senha e confirmar senha não correspondem
                                </div>
                                <?php
                              }
                            }
                            else
                            {
                              ?>
                              <div class="msg-erro">
                                <?php echo "Erro: ".$u->msgErro;?>
                              </div>
                              <?php
                            }
                          }else
                          {
                            ?>
                            <div class="msg-erro">
                            Preencha todos os campos!
                            </div>
                            <?php
                          }
              }
            }

              ?>
  					</form><!-- criar-conta -->

  				</div><!-- abrir-conta -->


  				<div class="clear"></div>
  			</div><!-- center -->
  		</section><!-- main -->
      <footer>
        <small>©2020 EspaçoVets - Todos os direitos reservados.</small>
      </footer>
<script type="text/javascript">
  document.getElementById('olho').addEventListener('mousedown', function() {
  document.getElementById('pass').type = 'text';
});

document.getElementById('olho').addEventListener('mouseup', function() {
  document.getElementById('pass').type = 'password';
});

// Para que o password não fique exposto apos mover a imagem.
document.getElementById('olho').addEventListener('mousemove', function() {
  document.getElementById('pass').type = 'password';
});

function validar(){

}

$("#telefone").mask("(00) 00000-0000");

</script>


  	
  </body>
  </html>

