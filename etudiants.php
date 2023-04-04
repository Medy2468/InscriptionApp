 <?php
    require_once 'DB/connexion.php';
    require_once 'functions/inscription.func.php';
    $etudiants = getEtudiants();

    
    
?> 
<!doctype html>
<html lang="en">
<head>
    <title>Liste Etudiants(es)</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container jumbotron">
    <form class="col-sn-8 offset-sn-2" method="post">
        <p class="display-4 text-center mb-5" style="font-family: 'Times New Roman'">Liste des étudiants(es)</p>
        <table class="table table-bordered table-striped table-light">
            <thead>
            <tr class="table-primary text-center">
                <th scope="col">#</th>
                <th scope="col">Matricule</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Classe</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            <?php 
                
                foreach ($etudiants as $et) { 
                
            ?>

            <tr class="text-center">
                <th scope="row"><?= $et['id'] ?></th>
                <td><?= $et['matricule'] ?></td>
                <td><?= $et['nom'] ?></td>
                <td><?= $et['prenom'] ?></td>  
                <td><?= $classes = getClassesEt($et['classe']); ?></td>             
                <td><a href='#' class="btn btn-block btn-outline-warning">Modifier</a></td>
                <td><a href='#' class="btn btn-block btn-outline-danger">Supprimer</a></td>
            </tr>


            <?php
                 
                } 
                 
            ?>

            </tbody>
        </table>
        <a href="index.php" class="btn btn-outline-dark btn-block mt-5">Retour à l'inscription</a>
    </div>

    

    <script src="assets/js/myScript.js"></script>

</body>
</html>