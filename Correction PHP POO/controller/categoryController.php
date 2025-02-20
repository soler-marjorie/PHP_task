<?php
class CategoryController extends AbstractController {
    //METHOD
    public function addCategory():?string{
        //Vérifier si je reçois le formulaire d'ajout
        if(isset($_POST["submit"])) {
            if(!empty($_POST["name"])) {
                //Nettoyage des données
                $name = sanitize($_POST["name"]);

                //Vérifier si le nom est disponible
                $categorie = $this->getListModels()['categoryModel']->setName($name)->getByName();
                
                //Vérifie si le tableau est vide ou pas
                if(empty($categorie)) {
                    $this->getListModels()['categoryModel']->add();
                    return "la catégorie a été ajouté";
                }
                else {
                    return "La catégorie existe déja en BDD";
                } 
            }else{
                return "Le nom de la catégorie est vide !";
            }
        }
        return '';
    }

    public function render():void{
        //Vérifie si on est connecté
        if(!isset($_SESSION['id'])){
            //Non connecté : je redirige vers l'accueil
            header('location:/');
            exit;
        }

        //Traitement des données
        $ajout = $this->addCategory();

        //Si on est connecté, on fait le rendu des vues
        echo $this->renderHeader();
        echo $this->getListViews()['category']->setMessage($ajout)->displayView();
        echo $this->renderFooter();
    }
}