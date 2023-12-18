<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Doação de Sangue</h1>

<body bgcolor="FBB917">
    <div>
        <h2>Formulario de Registro</h2>
        <form action='view.php' method='POST'>

        <label for="user">Nome: </label><br>
        <input type="text" name='name' required><br><br>

        <label for="email">Email: </label><br>
        <input type="email" name='email' required><br><br>

        <label for="user">Telefone: </label><br>
        <input type="text" name = 'phone' required><br><br>

        <label for="user">Tipo sanguineo: </label><br>
        <input type="text" name = 'bgroup' required><br><br>

        <input type="submit" name="submit" id="submit">
        </form>

    </div>

</body>

</html>