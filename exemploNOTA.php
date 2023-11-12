<?php

require('./NotaFiscal.php');

$notaFiscal = new NotaFiscal($conn);

$notasFiscais = $notaFiscal->listarNotasFiscais();

foreach ($notasFiscais as $nota) {
    echo "ID: {$nota['id_nota_fiscal']}, Número: {$nota['nf_numero']}, Valor: {$nota['valor']}<br>";
}

?>
