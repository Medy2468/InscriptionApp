-<?php


    /*
        Ici, vous mettez la connexion de
        InscriptionApp à la base de données.
        Vous créez une base de données nommée : inscription_app
        avec les tables suivantes :
        annee(id(auto_increment), libelle(UNIQUE))
        classe(id(auto_increment),code(UNIQUE),libelle(UNIQUE),montantInscription)
        etudiant(id(auto_increment),matricule(UNIQUE),nom,prenom,dateNaissance,lieuNaissance,telephone,adresse)
        inscription(id(auto_increment),dateInscription,idEtudiant,idClasse,idAnnee)
    */
    require_once 'config.php';
    
    try{

        $bdd = new PDO($con, $user, $password);

    }catch(Exception $ex){
	    die("Erreur de connexion à la BD".$ex->getMessage());
	}
?>