<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/head.php' ?>
    <title>Ajouter categorie</title>
</head>
<body>
    <?php include 'include/nav.php' ?>
 <div class="container py-2">
     <h4>Ajouter categorie</h4>
    <?php
        if(isset($_POST['ajouter'])){
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $icone = $_POST['icone'];


            if(!empty($libelle) && !empty($description)){
                require_once 'include/database.php';
                $sqlState = $pdo->prepare('INSERT INTO categorie(libelle,description,icone) VALUE(?,?,?)');
                $sqlState->execute([$libelle,$description,$icone]);
                header('location: categories.php');
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                  Libelle , description sont obligatoires
                </div>
                <?php
            }

        }
            
    ?>
    <form method="post">
    <label  class="form-label">Libelle</label>
    <input type="text" class="form-control" name="libelle" >

    <label  class="form-label">Description</label>
    <textarea class="form-control" name="description" > </textarea>

    <label  class="form-label">Icone</label>
    <input type="text" class="form-control" name="icone" >
    
    <input type="submit" value="ajouter_categorie" class="btn btn-primary my-2" name="ajouter">
   </form>
    </div>
 
</body>
</html>