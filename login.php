<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login.css"> 
    <title>Login</title>
</head>

<body>

    <?php
    require_once 'database.php';
    require_once 'class/loginClass.php';
    require_once 'manager/loginManager.php';
    ?>

    <div class="wrapper">
        <div class="container">
            <h1>Se connecter</h1>
    
                <form method="POST" class="form">
                    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <button type="submit" name="connect" id="login-button">Connexion</button>
                </form>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <script src="login.js"></script>
</body>
</html>

<?php
if (isset($_POST['connect'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass_crypt = crypt($password, '$6$rounds=5000$ptroyiuhjklqsdfc$');
    $erreur = '';
    $login = new Admin(array('nameAdmin' => $username, 'password' => $password));
    // echo $pass_crypt;
    $objet = new LoginManager($log);
    $connect = $objet->login($login);
    if(empty($connect)) {
        echo 'Nom d\'utilisateur incorrect <br>';
    } else {
        if($pass_crypt == $connect[0]->getPassword()) {
            session_start();
            $_SESSION['login'] = $connect[0]->getPassword();
            header('Location: admin.php');
        } else {
            echo 'Mot de passe incorrect <br>';
        }
    }
}

?>