<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/head.php' ?>
    <title>Connexion</title>
</head>
<body>

    <?php include 'include/nav.php' ?>
    <div class="container py-2">
    <h4>Connexion</h4>
    <?php
        if(isset($_POST['connexion'])){
            $Login = $_POST['Login'];
            $Password   = $_POST['Password'];

            if(!empty($Login) && !empty($Password)){
                require_once 'include/database.php';
                $sqlState = $pdo->prepare('SELECT * FROM utilisateur 
                                                WHERE login=?
                                                AND   password=?');
                $sqlState->execute([$Login,$Password]);
                if($sqlState->rowCount()>=1){
                    $_SESSION['utilisateur'] = $sqlState->fetch();
                    header('location: admin.php');
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Login ou password incorrectes.
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    Login , password sont obligatoires
                </div>
                <?php
            }
        }
    ?>
    
    <form method="post">
        <label class="form-label">Login</label>
        <input type="text" class="form-control" name="Login">

        <label class="form-label">Password</label>
        <input type="Password" class="form-control" name="Password">

        <input type="submit" value="Connexion" class="btn btn-primary my-2" name="connexion">
    </form>
</div>
</body>
</html>