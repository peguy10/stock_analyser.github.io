<?php
// Connexion à la base de données
include('../inc/connect.php');

// Fonction pour récupérer toutes les fournisseurs
function getFournisseurs()
{
    global $pdo;
    $query = $pdo->query('SELECT * FROM fournisseurs');
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}

// Fonction pour ajouter une nouvelle fournisseur
function addFournisseur($name, $email, $phone, $logo, $ville,$pays, $code)
{
    global $pdo;
    $query = $pdo->prepare('INSERT INTO fournisseurs (nom_f,email_f,phone_f,logo_f,ville_f,pays_f,code_f) VALUES (:name,:email,:phone,:logo,:ville,:pays,:code)');
    $query->execute(array('name' => $name, 'email' => $email, 'phone' => $phone, 'logo' => $logo, 'ville' => $ville, 'pays' => $pays, 'code' => $code));
}

// Fonction pour mettre à jour une fournisseur existante
function updateFournisseur($id, $name, $email, $phone, $logo, $ville,$pays, $code)
{
    global $pdo;
    $query = $pdo->prepare('UPDATE fournisseurs SET nom_f = :name,  email_f = :email, phone_f = :phone, logo_f = :logo, ville_f = :ville, pays_f = :pays, code_f = :code  WHERE id_f) = :id');
    $query->execute(array('id' => $id,'name' => $name, 'email' => $email, 'phone' => $phone, 'logo' => $logo, 'ville' => $ville, 'pays' => $pays, 'code' => $code));
}

// Fonction pour supprimer une fournisseur
function deleteFournisseur($id)
{
    global $pdo;
    $query = $pdo->prepare('DELETE FROM fournisseurs WHERE id_f = :id');
    $query->execute(array('id' => $id));
}