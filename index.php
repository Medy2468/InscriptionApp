<?php
    require_once 'DB/connexion.php';
    require_once 'functions/inscription.func.php';
    $classes = getClasses();
    $annees = getAnnees();
    $errors = [];
   
    if(isset($_POST['inscrire'])){
        extract($_POST);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $matricule = $_POST['matricule'];
        $dateNaissance = $_POST['dateNaissance'];
        $telephone = $_POST['telephone'];
        $lieuNaissance = $_POST['lieuNaissance'];
        $adresse = $_POST['adresse'];
        $classe = $_POST['classe'];
        $annee = $_POST['annee'];
        if(empty(trim($nom)) OR empty(trim($prenom)) OR empty(trim($dateNaissance)) OR empty(trim($telephone))){
            $errors['champsVide'] ='S\'il vous plait les champs de saisies sont obligatoires !!';
        }
        if(strlen($telephone) != 9){
            $errors['numTelephone'] = ' Votre numéro doit etre correct avec 9 chiffres !! ';
        }
        if(count($errors) == 0){
            $okk=1;
            $ok = addEtudiant($_POST);
            //var_dump($ok);
        }
    } 
    if(isset($_POST['reinscrire'])){
        // echo 'reinscrire';
    }
?> 
<!doctype html>
<html lang="en">
<head>
     <title>Inscription App.</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container jumbotron">
        <form class="col-sm-8 offset-sm-2" method="post" >
        

        <?php
        if(isset($_POST['inscrire'])){
           if($okk == 1){?>
                <h5 class="alert alert-success text-center"> Chèr(e) Etudiant(e) vous avez été bien inscrit(e) avec succès !! </h5>
                <?php }else{ ?>
                    <h5 class="alert alert-danger text-center">Navré, veuillez joindre notre administrateur au +221-78-151-38-51  </h5>
                <?php }
           }
        
        ?> 

            <h3 id="titre" class="display-4 mb-5 text-center" style="font-family: 'Times New Roman'">INSCRIPTION</h3>
            <hr>

        <?php foreach ($errors as $er) { ?> 
            <h5 class="alert alert-danger text-center"><?= $er ?></h5>

        <?php } ?> 

            <div class="form-group mt-5">
                <label for="">Matricule </label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                    </div>
      <?php              
		$dodo="SELECT id FROM etudiant order by id DESC Limit 1 ";
		$dodo1=$bdd->query($dodo);
		$dodo2=$dodo1->rowCount();

		if ($dodo2==0) {
			//echo "il n'y a pas d'enregistrement";
			$prochain_id=1;
		}

		elseif ($dodo2!=0) {
			//echo "il y a des enregistrements";
			$line=$dodo1->fetch(PDO::FETCH_ASSOC);
			extract($line);
			$user_id=$line["id"];
			$prochain_id=$user_id+1;
        }
        ?>

        <input type="hidden" class="form-control" id="idEtudiant" name="idEtudiant" value="<?= $prochain_id ?>" readonly>
        <input type="hidden" class="form-control" id="dateInscription" name="dateInscription" value="<?= date("Ymd") ?>" readonly>


                    <input type="text" class="form-control" id="matricule" name="matricule" value="<?= 'ET-'.date("Ymd").'-#'.$prochain_id ?>" readonly>
                    <button type="button" class="btn btn-outline-primary ml-3" id="changer">Switch</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label for="">Nom (*)</label>
                        <input type="text" class="form-control" id="nom" name="nom" onkeyup="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="form-group">
                        <label for="">Prénom (*)</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" onkeyup="premiere(this)" >
                    </div>
                    <div class="form-group">
                        <label for="">Date de Naissance (*)</label>
                        <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" >
                    </div>
                    <div class="form-group">
                        <label for="">Adresse </label>
                        <input type="text" class="form-control" id="adresse" name="adresse">
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Lieu de Naissance </label>
                        <input type="text" class="form-control" id="lieuNaissance" name="lieuNaissance">
                    </div>
                    <div class="form-group">
                        <label for="">Téléphone (*)</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" >
                    </div>

                    <div class="form-group">
                        <label for="">Classe </label>
                        <select name="classe" id="classe" class="form-control">
                            <option value="0">-- Sélectionner une classe --</option>
                            <?php 
                                    
                                    foreach ($classes as $cl) { 
                                        
                            ?>
                                <option value="<?= $cl['id'] ?>"><?= $cl['libelle'] ?></option>
                         <?php 
                            
                            } 
                            
                        ?>
                        </select>
                        <p class="small text-danger" id="montantInscription"></p>
                    </div>
                    <div class="form-group">
                        <label for="">Année Académique </label>
                        <select name="annee" id="annee" class="form-control">
                            <option value="0">-- Sélectionner une année académique --</option>
                            <?php foreach ($annees as $an) { ?>
                                <option value="<?= $an['id'] ?>"><?= $an['libelle'] ?></option>
                         <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-outline-primary btn-block mt-3" name="inscrire" id="inscrire" onclick="Supprimer()" value="Inscription"/>
            <a href="etudiants.php" class="btn btn-outline-success btn-block mt-3">Liste des etudiants</a>
    </div>
    <script src="assets/js/myScript.js"></script>
</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          