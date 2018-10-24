<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
            <?php
            try
            {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '', $pdo_options);
                $nb_patient_par_page = 2; // variable contenant le total des articles voulus par page.
                // On récupère le nombre total de messages :
                $reponse = $bdd->query('SELECT COUNT(*) AS `nb_patients` FROM `patients` ');
                $total_patients = $reponse->fetch();
                $nb_billets = $total_patients['nb_patients'];
                // On détermine le nombre de pages :
                $nb_pages = ceil($nb_patients / $nb_patient_par_page);
                // On fait une boucle pour écrire les liens vers chacunes des pages :
                    ?><div style="text-align: center;">
                    <?php
                    echo 'Page : ';
                    for ($i = 1; $i <= $nb_pages; $i++)
                    {
                        echo '<a href="index.php?page=' . $i . '">' . $i . '</a> ';
                    }?>
                    </div>
                    <?php
                    // Maintenant on va afficher les messages :
                    if(isset($_GET['page'])){
                        if($_GET['page'] < 100){
                        $page = (int) $_GET['page']; // on récupère le numéro de la page indiqué dans l'adresse.
                        }else{
                            header('Location:liste-patients.php');
                        }
                    }else{
                        $page = 1; // page par défaut si la variable n'existe pas.
                    }
                    // On calcule le numéro du premier article qu'on prend pour le LIMIT :
                    $premierPatientsAafficher = ($page-1) * $nb_patient_par_page;
                    // On ferme la requête avant d'en faire une autre :
                    $reponse->closeCursor();
                    $reponse = null;
                    $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creationFR FROM billets ORDER BY id ASC LIMIT ' . $premierArticleAafficher . ', ' . $nb_article_par_page)';
                                    while($donnees = $req->fetch()){
                                        $id = (int) $donnees['id']; ?>
                                        <div class="news">
                                            <h3><?=htmlspecialchars($donnees['titre'])?></br>
                                                le <?=htmlspecialchars($donnees['date_creationFR'])?>
                                            </h3>
                                            <p>  <?=nl2br(htmlspecialchars($donnees['contenu']))?></p>
                                        </div>
                                        <a href="commentaires.php?billet=<?=$id?>">Commentaires</a>
                                        <?php
                                    }
                                    $req->closeCursor();
                                    $req = null;
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
            ?>
    </body>
</html>
