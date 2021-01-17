<?php

include_once("conexao.php");


class Select{


    public function city(){
       
        $result = mysqli_query($conn,  "SELECT  * FROM cidades where id_estado = 5 and id = 305 ");
        $row = mysqli_fetch_array($result);
        return $row['nome'];

 }
}

?>

