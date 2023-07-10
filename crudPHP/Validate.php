<body> // 
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Please enter a valid name";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-¹]+$/", $name)) {
                $nameErr = "Only letters and white spaces allowed";
            }
        }
        if (empty($_POST["email"])) {
            $emailErr = "Valid Email Address";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "The email address is incorrect";
            }
        }
    }
    ?>
</body>