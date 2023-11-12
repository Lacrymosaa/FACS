<?php
require_once('./CLASSpatrimonio.php');


if (isset($_GET['id_nota_fiscal'])) {
    $id_nota_fiscal = $_GET['id_nota_fiscal'];

    $conn= new Connect("localhost", "db_facs", "root", "");

    $patrimonio = new Patrimonio($conn);

    $patrimonios = $patrimonio->listarPatrimonioPorNota($id_nota_fiscal);

    if ($patrimonios) {
        foreach ($patrimonios as $patrimonio) {
            echo "Número: {$patrimonio['numero_patrimonio']}, Tipo: {$patrimonio['tipo']}, <br>";
            echo "<br>";
        }
    } else {
        echo "Nenhum patrimônio encontrado para esta nota fiscal.";
    }
} else {
    echo "ID da nota fiscal não fornecido.";
}
?>
