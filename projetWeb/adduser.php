<?php
include 'db_config.php';
include("auth/EtreInvite.php");

if (empty($_POST['login'])) {
    include('adduser_form.php');
    exit();
}

$error = "";

foreach (['nom', 'prenom', 'login', 'mdp', 'mdp2','role'] as $name) {
    if (empty($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas être vide";
    } else {
        $data[$name] = $_POST[$name];
    }
}


// Vérification si l'utilisateur existe
$SQL = "SELECT uid FROM users WHERE login=?";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['login']]);

if ($res && $stmt->fetch()) {
    $error .= "Login déjà utilisé";
}

if ($data['mdp'] != $data['mdp2']) {
    $error .="MDP ne correspondent pas";
}

if (!empty($error)) {
    include('adduser_form.php');
    exit();
}


foreach (['nom', 'prenom', 'login', 'mdp','role'] as $name) {
    $clearData[$name] = $data[$name];
}

$passwordFunction =
    function ($s) {
        return password_hash($s, PASSWORD_DEFAULT);
    };

$clearData['mdp'] = $passwordFunction($data['mdp']);

try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $pdo=new PDO($dsn,$username,$password,$pdo_options);
    $SQL = "INSERT INTO users(nom,prenom,login,mdp,role) VALUES (:nom,:prenom,:login,:mdp,:role)";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute($clearData);
    $id = $db->lastInsertId();
    $auth->authenticate($clearData['login'], $data['mdp']);

    redirect($pathFor['acc']);
} catch (\PDOException $e) {
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
}
?>



