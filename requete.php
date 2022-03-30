<?php
// fonction qui récupère les infos d'un seul utilisateur en BdD
function requete_findUser($pseudo) {
    $db = connexion_BD();
    $sql = "SELECT * FROM user WHERE pseudo = :pseudo";
    $req = $db->prepare($sql);
    $req->execute([
        ":pseudo"=>$pseudo
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
}

// fonction qui récupère tout les utilisateurs en BdD
function requete_lire_all_user()
{
    $db = connexion_BD();
    $sql = "SELECT * FROM user";
    $req = $db->prepare($sql);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

// fonction qui ajoute un utilisateur en BdD
function requete_inscription($pseudo,$password,$role) {
    $db = connexion_BD();
    $sql = "INSERT INTO user (pseudo, password,id_role) VALUES (:pseudo, :password, :role)";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":pseudo" => $pseudo,
        "password" => $password,
        ":role" => $role
    ]);
    return $result;
}