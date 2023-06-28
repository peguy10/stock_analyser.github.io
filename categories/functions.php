<?php
// Connexion à la base de données
include('../inc/connect.php');

// Fonction pour récupérer toutes les catégories
function getCategories() {
    global $pdo;
    $query = $pdo->query('SELECT * FROM categories');
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}

// Fonction pour ajouter une nouvelle catégorie
function addCategory($name,$code,$description) {
    global $pdo;
    $query = $pdo->prepare('INSERT INTO categories (nom_cat,code_cat,description_cat) VALUES (:name,:code,:description)');
    $query->execute(array('name' => $name, 'code' => $code, 'description' => $description));
}

// Fonction pour mettre à jour une catégorie existante
function updateCategory($id, $name,$code,$description) {
    global $pdo;
    $query = $pdo->prepare('UPDATE categories SET nom_cat = :name,  code_cat = :code,description_cat = :description WHERE id_cat) = :id');
    $query->execute(array('id' => $id, 'name' =>$name, 'code' =>$code, 'description' => $description));
}

// Fonction pour supprimer une catégorie
function deleteCategory($id) {
    global $pdo;
    $query = $pdo->prepare('DELETE FROM categories WHERE id_cat = :id');
    $query->execute(array('id' => $id));
}