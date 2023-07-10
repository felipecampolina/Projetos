<?php
function test_input($data) {
    $data = trim($data); // remove espaços em branco no início e no final
    $data = stripslashes($data); // remove barras invertidas
    $data = htmlspecialchars($data); // converte caracteres especiais em entidades HTML
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $number = test_input($_POST["number"]);
    $comment = test_input($_POST["comment"]);
    $gender = test_input($_POST["gender"]);
    $age = test_input($_POST["age"]);
}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){ // confere se o metodo é post e foi submitado
    $conn = mysqli_connect('localhost','root','','teste1') or die("Erro na conexão do BD");  // (NOME SERVIDOR , LOCALIZACAO , SENHA , NOMETABELA)
    if(isset($_POST['nome'])&&isset($_POST['email'])&&isset($_POST['telefone'])&&isset($_POST['bgroup'])); // confere se vazio

    // Declarando variaveis e pegando o conteudo POST
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $bgroup = $_POST['bgroup'];

    $sql = "INSERT INTO `usuários`(`nome`, `email`, `telefone`, `tipoSangue`) VALUES ('$nome','$email',' $telefone','$bgroup')"; // adionando variaveis a banco de dados
    $query = mysqli_query($conn,$sql); // query sql
    if($query){
        echo "Dados gravados com sucesso";
    }else{
        echo "Deu bosta!";
    }

}