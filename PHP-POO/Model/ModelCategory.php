<?php

class ModelCategory extends AbstractModel{
    private ?int $id;
    private ?string $name;

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }



    function addCategory(): void{
        //Requête
        $requete = "INSERT INTO category(name) VALUE(?)";
        try {
            $bdd = $this->getBdd()->connexion();
            $account = $this->getCategory();

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


    function updateCategory(): void
    {
        //Requête
        $requete = "UPDATE category SET name=? WHERE name=?";
        try {
            $bdd = $this->getBdd()->connexion();
            $account = $this->getAccount();

            //Préparation de la requête
            $req = $bdd->prepare($requete);
            //Associer les paramètres (?)
            $req->bindParam(1, $name, PDO::PARAM_STR);
            $req->bindParam(2, $name, PDO::PARAM_STR);
            //Exécuter la requête
            $req->execute();
        } catch (Exception $e) {
            echo "Erreur" . $e->getMessage();
        }
    }



    function deleteCategory(): void
    {
        //Requête
        $requete = "DELETE FROM category WHERE name = ?";
        try {
            $bdd = $this->getBdd()->connexion();
            $account = $this->getAccount();

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


    function getCategoryByName(): array|null|string
    {
        //Requête
        $requete = "SELECT id_category, name FROM category WHERE name=?";
        try {
            $bdd = $this->getBdd()->connexion();
            $account = $this->getAccount();

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


    function getAllCategory(): array|null
    {
        //Requête
        $requete = "SELECT id_category, name FROM category";
        try {
            $bdd = $this->getBdd()->connexion();
            $account = $this->getAccount();
            
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
}