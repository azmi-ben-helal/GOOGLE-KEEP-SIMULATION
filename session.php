<?php

$login_valide = "azmira";
$pwd_valide = "azmira";


if (isset($_POST['login']) && isset($_POST['pwd'])) {


    if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) {

        session_start ();

        $_SESSION['login'] = $_POST['login'];
        $_SESSION['pwd'] = $_POST['pwd'];


        header ('location: membre.php');
    }
    else {
        // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
        echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        // puis on le redirige vers la page d'accueil
        echo '<meta http-equiv="refresh" content="0;URL=sessions.html">';
    }
}
else {
    echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>