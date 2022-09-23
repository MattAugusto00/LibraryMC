<?php

$cod = $_GET['cod'];
echo "<script>if(confirm('Tem certeza que deseja excluir?') == true){
                  location.href='C_excluirEmprestimo.php?cod=$cod'}
              else{location.href='C_gerarRelatorioEmprestimo.php'}</script>";

?>