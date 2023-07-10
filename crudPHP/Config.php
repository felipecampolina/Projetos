$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
die("Deu ruim!",$conn->connect_error);
}

// Tenta conectar com o banco de dados, se der erro chama die()