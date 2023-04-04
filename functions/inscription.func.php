<?php
    /*
        Ici, mettez les fonctions suivantes:
        1. getClasses():c'est une fonction qui
        retourne toutes les classes dans l'ordre
        croissant sur le libelle
        2. getAnnees():c'est une fonction qui
        retourne toutes les années académiques
        contenant l'année en cours.
        3. getEtudiants():c'est une fonction qui
        retourne tous les étudiants dans l'ordre
        croissant sur le nom.accordion
        4. addEtudiant():c'est une fonction qui
        insére les informations de l'étudiant dans 
        une table nommée etudiant et les informations
        de l'inscription dans une table nommée inscription
    */


    function getClasses(){
        $base = new PDO('mysql:host=localhost;dbname=inscription_app;charset=utf8', 'root', '');
        $ins = $base -> query('SELECT * FROM classe ORDER BY libelle ASC');
        
        return $ins;
    }

    function getClassesEt($cl){
        $classe = $cl;
        $base = new PDO('mysql:host=localhost;dbname=inscription_app;charset=utf8', 'root', '');
        $ins = $base -> query('SELECT * FROM classe WHERE id="'.$classe.'" ');
        foreach ($ins as $cl) {
            $cl['libelle'];
        }
        
        return $cl['libelle'];
    }

    function getAnnees(){
        $base = new PDO('mysql:host=localhost;dbname=inscription_app;charset=utf8', 'root', '');
        $ins = $base -> query('SELECT * FROM annee');
        
        return $ins;
    }

    function getEtudiants(){
        $base = new PDO('mysql:host=localhost;dbname=inscription_app;charset=utf8', 'root', '');
        $ins = $base -> query('SELECT * FROM etudiant ORDER BY nom ASC');
        
        return $ins;
    }
    
    function addEtudiant($ok){
        $matricule=$ok['matricule'];
        $nom=$ok['nom'];
        $prenom=$ok['prenom'];
        $dateNaissance=$ok['dateNaissance'];
        $adresse=$ok['adresse'];
        $lieuNaissance=$ok['lieuNaissance'];
        $telephone=$ok['telephone'];
        $classe=$ok['classe'];
        $annee=$ok['annee'];
        $idEtudiant=$ok['idEtudiant'];
        $dateInscription=$ok['dateInscription'];
        //echo"le matricule: ".$matricule."le nom: ".$nom;
        $base = new PDO('mysql:host=localhost;dbname=inscription_app;charset=utf8', 'root', '');
        $ins1 = $base -> query("INSERT INTO etudiant(matricule,nom,prenom,dateNaissance,lieuNaissance,telephone,adresse,classe) VALUES('$matricule','$nom','$prenom','$dateNaissance','$lieuNaissance','$telephone','$adresse','$classe')");
        $ins2 = $base -> query("INSERT INTO inscription(dateInscription,idEtudiant,idClasse,idAnnee) VALUES('$dateInscription','$idEtudiant','$classe','$annee') ");
    //$ins = $base -> query("INSERT INTO inscription VALUES ");
    //var_dump($ok);
    //var_dump($ins);
        
        //return $ins1;
    }


   
?>