<?php
	session_start();
	if(!isset($_SESSION['id_usuario']))
	{
		header("location: index.php");
		exit;
	}

$con = new PDO('mysql:host=localhost;dbname=espacovets', 'root', '');
?>

<!doctype html>
<html lang="pt-br">
  <head >  
  
    <title>EspaçoVet</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/8470jr.ico">

    <link rel="stylesheet" href="css/estilo.css">

        <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="css/estilo.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"
   integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 
   crossorigin="anonymous">
  </script>
  </head>

  <div class="topnav">
  
  <a button onclick="document.getElementById('id01').style.display='block'" class="w3-button #f9f9f9">Cadastro veterinários volantes</button></a>

  <div id="id01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-blue"> 
        <span onclick="document.getElementById('id01').style.display='none'"class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>Bem vindos!</h2>
      </header>
      <div class="w3-container">

<style type="text/css">
        .w60{
          width: 50%;
          padding: 0 5px;
          float: left;
        }
        .w65{
            width: 423px;
            height:40px;
            padding-left: 10px;
            border: 1px solid #a5dcff;
            border-radius: 8px;
            margin: 6px;
            margin-top: 12px;
        }
        .w150{
          width: 100%;
          padding: 0 5px;
          float: left;
        }
        .container 
        {
            max-width: 900px;
            margin: 0px auto;
            margin-top: 25px;
        }

        .comment {
            float: left;
            width: 100%;
            height: auto;
        }

        .commenter {
            float: left;
        }

        .commenter img {
            width: 35px;
            height: 35px;
        }

        .comment-text-area {
            float: left;
            width: 100%;
            height: auto;
        }

        .textinput {
            float: left;
            width: 100%;
            min-height: 80px;
            outline: none;
            resize: none;
            border: 1px solid #a5dcff;
            border-radius: 8px;
        }

</style>

<form method="post" class="criar-conta" enctype="multipart/form-data">
              <div class="w150">
                
                <input type="file" name="imagem" id="imagem" onchange="previewImagem()">

                <img style="width: 150px; height: 150px;">

              </div>
              <div>
                
                 <select class="w65" placeholder="Ramo de atividade" type="text" name="ramo-atividade"  required>
                                  <option value="">Ramo de especialidades:</option>
                                <?php  

                                $data = $con->query('SELECT * FROM especialidades');
                                foreach ($data as $row) {
                                  echo ("<option value='".$row['id']."'>".$row['nome']."</option>");
                                }


                                ?>
                                     
                  </select>


              </div><!-- w60 -->
               
              <?php
              
              ?>
              <div class="w60">
                <input placeholder="CRMV" type="text" name="nome" maxlength="8" required>
              </div><!-- w60 -->
              <br>
              <div>
              
                <select class="w65"  id="Estado" placeholder="Estado" >                               
                                <option value="0" selected >Selecione um Estado:</option>
                               
                                
                                                                          
                </select> 
                
                 </div><!-- w65 -->
            
              <div>
                <select class="w65" type="text" name="cidade" id="Cidade" placeholder="Cidade">
                                <option value="">Selecione um Cidade:</option>
                       

        </select>                       
              </div><!-- w65 -->
              <script>
                $(document).ready(function(){
                  carregar_json('Estado');
                  function carregar_json(id, cidade_id){
                    var html = '';

                    $.getJSON('https://gist.githubusercontent.com/letanure/3012978/raw/36fc21d9e2fc45c078e0e0e07cce3c81965db8f9/estados-cidades.json', function(data){
                      html += '<option>Selecionar '+ id +':</option>';
                      console.log(data);
                      if(id == 'Estado' && cidade_id == null){
                        for(var i = 0; i < data.estados.length; i++){
                          html += '<option value='+ data.estados[i].sigla +'>'+ data.estados[i].nome+'</option>';
                        }
                      }else{
                        for(var i = 0; i < data.estados.length; i++){
                          if(data.estados[i].sigla == cidade_id){
                            for(var j = 0; j < data.estados[i].cidades.length; j++){
                              html += '<option value='+ data.estados[i].sigla +'>'+data.estados[i].cidades[j]+ '</option>';
                            }
                          }
                        }
                      }

                      $('#'+id).html(html);
                    });
                    
                  }
                  $.noConflict();
                  $(document).on('change', '#Estado', function(){
                    var cidade_id = $(this).val();
                    console.log(cidade_id);
                    if(cidade_id != null){
                      carregar_json('Cidade', cidade_id);
                    }
                  });

                });
          </script>

            <div class="w150">      
              <div class="container">
                <div class="comment">
                  <label for="w3review">Informações pessoais:</label>
                    <textarea class="textinput" placeholder="Comment"></textarea>
                </div>
              </div>
            </div>  
              <div class="clear"></div>

              <div class="w150">
                <input type="submit"  value="Cadastrar!" onclick="return validar()">
                
              </div><!-- w100 -->
            </form>

           




<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" /> 
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.5.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script> 

            <script type="text/javascript">
                function previewImagem(){
                  var imagem = document.querySelector('input[name=imagem]').files[0];
                  var preview = document.querySelector('img');
                  var reader = new FileReader();
                  reader.onloadend = function(){
                      preview.src = reader.result;
                  }

                  if(imagem){
                      reader.readAsDataURL(imagem);
                  }else{
                      preview.src = "";
                  }
                }

            </script>

      </div>
      <footer class="w3-container w3-blue" >

        <small>©2020 EspaçoVets - Todos os direitos reservados.</small>
      </footer>
    </div>
  </div>

  <a class="height" href="javascript: if(confirm('Tem certeza que deseja sair?')) location.href='index.php'"> Sair </a>

</div>
  <body>
   <div class="principal">
   
    
     
<nav id="menu">
    <div class="search-container">
        <form class="react-autosuggest__input" action="/action_page.php">
          <input class="react-autosuggest__input" stype="text" placeholder="Search.." name="search">
          <button class="searchSubmitBtn">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path fill="currentColor" d="M16.84 15.78l4.69 4.69a.75.75 0 0 1-1.06 1.06l-4.69-4.69a8.25 8.25 0 1 1 1.06-1.06zm-1.51-.564a6.75 6.75 0 1 0-.113.113.759.759 0 0 1 .112-.113z" fill-rule="evenodd">
          </path>
        </svg>
        </button>
        </form>

    </div>
    <ul>
        <li><button class="btn"><img class="img1" style="width: 32px; height: 32px;" src="img/vet2.png">
          <select class="w55" type="text" name="estado" id="Estados"   required>
                                <option value="">Selecione um Estado:</option>
                                   

                        </select>
        </button></li>
        <li><button class="btn"><img class="img1" style="width: 32px; height: 32px;" src="img/vet2.png">
          <select class="w55" type="text" name="estado" id="Cidades" required>
                                <option value="">Selecione uma Cidade:</option>
                          
                </select>  
        </button></li>

        
        <li><button class="btn"><img class="img1" style="width: 32px; height: 32px;" src="img/vet1.png">
          <select class="w55" placeholder="Ramo de atividade" type="text" name="ramo-atividade"  required>
                                  <option value="">Ramo de especialidades:</option>
                
                                     
                  </select>
                                                            </button></li>
        <li><button class="btn"><img class="img1" style="width: 32px; height: 32px;" src="img/vet3.png">
                            <select class="w55" type="text" name="estado" id="" placeholder="Estado"  required>
                                <option value="">Veterinário:</option>
                                <?php  

                                  $data = $con->query('SELECT * FROM estados');
                                  foreach ($data as $row) {
                                    echo ("<option value='".$row['id']."'>".$row['nome']."</option>");
                                  }


                                ?>      

                        </select>

                      </button></li>
    </ul>
</nav>

   <div class="clear"></div>

  </div>

   <section>
    
    <div>
      <span class="border-left">
      <h2 class="anuncio">Anuncios</h2>

         <div class="clear"></div>
        </span> 
    </div>

 </section>
      
<style>

  
      *{
        margin: 0;
        padding: 0;
      }
      body{
      background-color: #f9f9f9;
      }

      #menu{

      }
      #menu ul {
          padding:5px;
          margin: -8px;
          display: flex;
          flex-direction: row;
          justify-content: center;
      }
      #menu ul li { 
          padding: 10px 10px;
          display: inline-block;
          background-color:#00bfff;
          color: #333;
          text-decoration: none;
          display: flex;
          flex-direction: row;
          justify-content: center;
          align-items: flex-end; 
          margin-top: 60px; 
      }
      .w55{
        width: 100%;
        padding: 0 5px;
        float: left;
      }
      .anuncio{

          width: 20%;
          float: right;
          
          

      }
      .img1{
        width: 40px;
        height: 60px;
      }
      .principal{
        border: 5px solid #00bfff;
        padding: 5px;
        margin: 5px;
        background-color: #00bfff;
      }
      .pesquisa{
        width: 600px;
        height: 20px; 
        margin: 40px auto;
      }
      #texto{
        width: 546px;
        height: 40px;
        float: left;
        font-family: "Arial";
        font-size: 20px;
      }
      .btm{
        width: 30px;
        height: 30px;
        background-color: #2f4550;
        padding: 5px 10px;
        cursor: pointer;
      }
      #texto:focus{
        border: solid 2px #2f4550;
      }
      .btn {
        width: 100%;
        background-color: DodgerBlue;
        border: none;
        color: white;
        padding: 12px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 10px 10px 10px 10px;
      }

      .topnav {
        overflow: hidden;
        background-color: #A2CFE1;
      }
      .topnav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
      }
      .topnav a:hover {
        background-color: #ddd;
        color: black;
      }
      .topnav a.active {
        background-color: #2196F3;
        color: white;
      }
.searchSubmitBtn {
    height: 62px;
    padding: 11px 19px;
    margin: 0px;
    

    cursor: pointer;
    outline: none;
    text-align: center;
  
    
}
[type=reset], [type=submit], button, html [type=button] {
    -webkit-appearance: button;
}
    .search-container { 
    width: 100%; 
    margin-top: -25px;
    margin-right: 60px;
    height: 58px;
    padding: 16px 24px;
    border: none;
    border-radius: 4px;
    font-size: 20px;
    font-family: Arial, "Nunito Sans", "Helvetica Neue", HelveticaNeue, Helvetica, sans-serif;
    font-weight: 400;
    outline: none;
    color: rgb(74, 74, 74);
    display: flex;
    flex: 1 1 0%;
}
.react-autosuggest__input {
    margin-top: 2px;
    margin-right: 0px;
    height: 58px;
    padding: 16px 24px;
    border: none;
    border-radius: 4px;
    font-size: 20px;
    font-family: Arial, "Nunito Sans", "Helvetica Neue", HelveticaNeue, Helvetica, sans-serif;
    font-weight: 400;
    outline: none;
    color: rgb(74, 74, 74);
    display: flex;
    flex: 1 1 0%;
}
   
      .topnav input[type=text] {
        padding: 6px;
        margin-top: 8px;
        font-size: 17px;
        border: none;
      }
      .topnav .search-container button {
        float: right;
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
      }
      .topnav .search-container button:hover {
        background: #ccc;
      }

@media screen and (max-width: 600px) {
      .topnav .search-container {
        float: none;
      }
      .topnav a, .topnav input[type=text], .topnav .search-container button {
        float: none;
        display: block;
        text-align: left;
        width: 100%;
        margin: 0;
        padding: 14px;
      }
      .topnav input[type=text] {
        border: 1px solid #ccc;  
      }
      .clear{clear: both;}

</style>

      <footer>
        <small>©2020 EspaçoVets - Todos os direitos reservados.</small>
      </footer>

</body>
</html>

