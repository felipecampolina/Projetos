<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'teste1') or die("Erro na conexão do BD");

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql_select = "SELECT * FROM `usuários` WHERE `id`='$id'";
    $query_select = mysqli_query($conn, $sql_select);

    if ($query_select && mysqli_num_rows($query_select) > 0) {
        $row = mysqli_fetch_assoc($query_select);
        $nome = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $bgroup = $row['bgroup'];
    } else {
        echo "<div style='background-color: #f44336; color: white; padding: 10px; text-align: center;'>Registro não encontrado. <i class='fas fa-times'></i></div>";
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'teste1') or die("Erro na conexão do BD");

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nome = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $bgroup = mysqli_real_escape_string($conn, $_POST['bgroup']);

    $sql_update = "UPDATE `usuários` SET `name`='$nome', `email`='$email', `phone`='$phone', `bgroup`='$bgroup' WHERE `id`='$id'";
    $query_update = mysqli_query($conn, $sql_update);

    if ($query_update) {
        echo "<div style='background-color: #4CAF50; color: white; padding: 10px; text-align: center;'>Dados atualizados com sucesso. <i class='fas fa-check'></i></div>";
    } else {
        echo "<div style='background-color: #f44336; color: white; padding: 10px; text-align: center;'>Erro ao atualizar dados: " . mysqli_error($conn) . " <i class='fas fa-times'></i></div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $nome; ?>" required>

        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required>

        <label for="phone">Telefone:</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>" required>

        <label for="bgroup">Grupo Sanguíneo:</label>
        <input type="text" name="bgroup" value="<?php echo $bgroup; ?>" required>

        <input type="submit" name="update" value="Atualizar">
    </form>
</body>
</html>