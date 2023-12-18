<?php

// Configurações do banco de dados
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'teste1';

// Conexão com o banco de dados
$conn = mysqli_connect($hostname, $username, $password, $database) or die("Erro na conexão do BD");

// Função para escapar dados antes de inserir no banco
function escape_data($data, $conn)
{
    return mysqli_real_escape_string($conn, $data);
}

// CREATE
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    if (
        isset($_POST['name']) && isset($_POST['email']) &&
        isset($_POST['phone']) && isset($_POST['bgroup'])
    ) {
        $nome = escape_data($_POST['name'], $conn);
        $email = escape_data($_POST['email'], $conn);
        $phone = escape_data($_POST['phone'], $conn);
        $bgroup = escape_data($_POST['bgroup'], $conn);

        $sql = "INSERT INTO `usuários` (`name`, `email`, `phone`, `bgroup`) VALUES ('$nome', '$email', '$phone', '$bgroup')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<div style='background-color: #4CAF50; color: white; padding: 10px; text-align: center;'>Dados gravados com sucesso <i class='fas fa-check'></i></div>";
        } else {
            echo "<div style='background-color: #f44336; color: white; padding: 10px; text-align: center;'>Erro ao gravar dados: " . mysqli_error($conn) . " <i class='fas fa-times'></i></div>";
        }
    } else {
        echo "<div style='background-color: #f44336; color: white; padding: 10px; text-align: center;'>Campos incompletos <i class='fas fa-times'></i></div>";
    }
}

// READ
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'name'; // Padrão: ordenar por nome

$sql_select = "SELECT * FROM `usuários` ORDER BY $order_by";
$query_select = mysqli_query($conn, $sql_select);

if ($query_select) {
    echo "<html lang='en'>
          <head>
              <meta charset='UTF-8'>
              <meta http-equiv='X-UA-Compatible' content='IE=edge'>
              <meta name='viewport' content='width=device-width, initial-scale=1.0'>
              <title>Lista de Usuários</title>
              <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
              <style>
                  body {
                      font-family: 'Arial', sans-serif;
                      background-color: #FBB917;
                      margin: 0;
                      padding: 0;
                      display: flex;
                      flex-direction: column;
                      align-items: center;
                      justify-content: center;
                      height: 100vh;
                  }

                  h2 {
                      color: #333;
                  }

                  ul {
                      list-style: none;
                      padding: 0;
                  }

                  li {
                      background-color: #fff;
                      margin: 10px;
                      padding: 10px;
                      border-radius: 5px;
                  }

                  a {
                      color: #333;
                      text-decoration: none;
                      font-weight: bold;
                      margin-left: 10px;
                  }

                  a:hover {
                      text-decoration: underline;
                  }

                  i {
                      margin-left: 5px;
                  }
              </style>
          </head>
          <body>
              <h2>Lista de Usuários</h2>
              <div>
                  <a href='?order_by=name'>Ordenar por Nome</a>
                  <a href='?order_by=bgroup'>Ordenar por Grupo Sanguíneo</a>
              </div>
              <ul>";

    while ($row = mysqli_fetch_assoc($query_select)) {
        echo "<li>{$row['name']} - {$row['email']} - {$row['phone']} - {$row['bgroup']} (<a href='edit.php?id={$row['id']}'><i class='fas fa-edit'></i> Editar</a> | <a href='delete.php?id={$row['id']}'><i class='fas fa-trash-alt'></i> Excluir</a>)</li>";
    }

    echo "</ul>
          </body>
          </html>";
} else {
    echo "<div style='background-color: #f44336; color: white; padding: 10px; text-align: center;'>Erro ao recuperar dados: " . mysqli_error($conn) . " <i class='fas fa-times'></i></div>";
}

mysqli_close($conn);
?>