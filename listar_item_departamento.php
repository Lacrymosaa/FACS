<?php
require_once('./CLASSpatrimonio.php');


if (isset($_GET['id_departamento'])) {
    $id_departamento = $_GET['id_departamento'];

    $conn= new Connect("localhost", "db_facs", "root", "");

    $patrimonio = new Patrimonio($conn);

    $patrimonios = $patrimonio->listarPatrimonioPorDepartamento($id_departamento);

    if ($patrimonios) {
        foreach ($patrimonios as $patrimonio) {
            echo "ID: {$patrimonio['id_patrimonio']}, Número: {$patrimonio['numero_patrimonio']}, Tipo: {$patrimonio['tipo']}<br>";
            echo "<br>";
        }
    } else {
        echo "Nenhum patrimônio encontrado para este departamento.";
    }
} else {
    echo "ID do departamento não fornecido.";
}
?>