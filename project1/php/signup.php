<?php
    session_start();
    require_once 'dbconf.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            color: #007BFF;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            max-width: 100%;
        }

        input {
            margin-bottom: 15px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .login-link {
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .login-link:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Register</h2>
    <?php
        if (isset($_POST['register'])) {
        
            $username = $_POST["username"];
            $password = $_POST["password"];
  
        
            $sql = "INSERT INTO users (username,password) 
                    VALUES ('$username', '$password')";
            
            $result = $connect->query($sql);

            if ($result) {
                header("Location: ../AboutHome.html");
            }
            else {
                echo "Error: Register Fails.! " . $sql . "<br>" . $connect->error;
            }

            $connect->close();
        } 
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Register" name="register" >
    </form>
    <a href="login.php" class="login-link">Already have an account? Login</a>
</body>
</html>
