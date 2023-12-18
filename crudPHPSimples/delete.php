<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'teste1') or die("Erro na conexão do BD");

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql_delete = "DELETE FROM `usuários` WHERE `id`='$id'";
    $query_delete = mysqli_query($conn, $sql_delete);

    if ($query_delete) {
        echo "<div style='background-color: #4CAF50; color: white; padding: 10px; text-align: center;'>Registro excluído com sucesso. <i class='fas fa-check'></i></div>";
    } else {
        echo "<div style='background-color: #f44336; color: white; padding: 10px; text-align: center;'>Erro ao excluir registro: " . mysqli_error($conn) . " <i class='fas fa-times'></i></div>";
    }
} else {
    echo "<div style='background-color: #f44336; color: white; padding: 10px; text-align: center;'>ID do registro não fornecido. <i class='fas fa-times'></i></div>";
}
?>
