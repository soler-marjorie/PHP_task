<?php
class CategoryModel extends AbstractModel{
    //ATTRIBUTS
    private ?int $id;
    private ?string $name;

    //GETTER ET SETTER
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): CategoryModel { $this->id = $id; return $this; }

    public function getName(): ?string { return $this->name; }
    public function setName(?string $name): CategoryModel { $this->name = $name; return $this; }

    //MEHOD
    public function add(): void
    {
        //Requête
        $requete = "INSERT INTO category(name) VALUE(?)";
        try {
            $bdd = $this->getBdd()->connexion();
            $name = $this->getName();

            //Préparation de la requête
            $req = $bdd->prepare($requete);
            //Associer les paramètres (?)
            $req->bindParam(1, $name, PDO::PARAM_STR);
            //Exécuter la requête
            $req->execute();
        } catch (Exception $e) {
            echo "Erreur" . $e->getMessage();
        }
    }

    /**
     * @return void
     */
    public function update(): void
    {
        //Requête
        $requete = "UPDATE category SET name=? WHERE id_category=?";
        try {
            $bdd = $this->getBdd()->connexion();
            $name = $this->getName();
            $id = $this->getId();
            //Préparation de la requête
            $req = $bdd->prepare($requete);
            //Associer les paramètres (?)
            $req->bindParam(1, $name, PDO::PARAM_STR);
            $req->bindParam(2, $id, PDO::PARAM_STR);
            //Exécuter la requête
            $req->execute();
        } catch (Exception $e) {
            echo "Erreur" . $e->getMessage();
        }
    }


    /**
     * @return void
     */
    public function delete(): void
    {
        //Requête
        $requete = "DELETE FROM category WHERE name = ?";
        try {
            $bdd = $this->getBdd()->connexion();
            $name = $this->getName();

            //Préparation de la requête
            $req = $bdd->prepare($requete);
            //Associer les paramètres (?)
            $req->bindParam(1, $name, PDO::PARAM_STR);
            //Exécuter la requête
            $req->execute();
        } catch (Exception $e) {
            echo "Erreur" . $e->getMessage();
        }
    }

    /**
     * @param PDO $bdd 
     * @param string $name
     * @return array|null
     */
    public function getByName(): array|null|string
    {
        //Requête
        $requete = "SELECT id_category, name FROM category WHERE name=?";
        try {
            $bdd = $this->getBdd()->connexion();
            $name = $this->getName();

            //Préparation de la requête
            $req = $bdd->prepare($requete);
            //Associer les paramètres (?)
            $req->bindParam(1, $name, PDO::PARAM_STR);
            //Exécuter la requête
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur" . $e->getMessage();
        }
    }

    /**
     * @param PDO $bdd 
     * @return array|null
     */
    public function getAll(): array|null
    {
        //Requête
        $requete = "SELECT id_category, name FROM category";
        try {
            $bdd = $this->getBdd()->connexion();

            //Préparation de la requête
            $req = $bdd->prepare($requete);
            //Exécuter la requête
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur" . $e->getMessage();
        }
    }

    public function getById(): array|null
    {
       //Requête
       $requete = "SELECT id_category, name FROM category WHERE id_category=?";
       try {
           $bdd = $this->getBdd()->connexion();
           $id = $this->getId();

           //Préparation de la requête
           $req = $bdd->prepare($requete);
           //Associer les paramètres (?)
           $req->bindParam(1, $id, PDO::PARAM_STR);
           //Exécuter la requête
           $req->execute();
           $data = $req->fetch(PDO::FETCH_ASSOC);
           return $data;
       } catch (Exception $e) {
           echo "Erreur" . $e->getMessage();
       }
    }
}