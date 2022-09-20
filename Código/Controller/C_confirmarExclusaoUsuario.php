<?php

$cod = $_GET['cod'];
echo "<script>if(confirm('Tem certeza que deseja excluir?') == true){
                  location.href='C_excluirLivro.php?cod=$cod'}
              else{location.href='C_listarLivrosFuncionario.php'}</script>";

?>