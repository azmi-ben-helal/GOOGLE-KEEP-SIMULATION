<?php

session_start();


// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {

    // On teste pour voir si nos variables ont bien été enregistrées
    echo '<html>';
    echo '<head>';
    echo '<title>Page de notre section membre</title>';
    echo '</head>';

    echo '<body>';
    echo 'Votre login est ' . $_SESSION['login'] . ' et votre mot de passe est ' . $_SESSION['pwd'] . '.';
    echo '<br />';

    // On affiche un lien pour fermer notre session
    echo '<a href="./logout.php">Déconnection</a>';
} else {
    echo 'Les variables ne sont pas déclarées.';
}
?>

<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/formulaire.css">
</head>
<body>
<form method="POST" action="">

    <label for="nom">TITRE</label><input name="nom" class="form-control" id="nom" type="text">
    <label for="note">Note</label><input name="note" class="form-control" id="note" type="text">
    <input type="submit" value="Envoyer" class="btn btn-primary">

</form>


</body>
</html>
<?php
if (isset($_POST['nom'])) {
    if (isset($_SESSION['mesNotes'][$_POST['nom']])) {
        $_SESSION['error'] = "Note existante impossible de l'ajouter";
    } else {
        $_SESSION['mesNotes'][$_POST['nom']] = $_POST['note'];
        $_SESSION['succes'] = "Note " . $_SESSION['mesNotes'][$_POST['nom']] . " ajoutée avec succés";
    }
}
?>

<?php
if (!isset($_SESSION['mesNotes'])){
    ?>
    <div class="alert alert-danger">Liste Vide</div>
    <?php
} else {
    ?>
    <?php if (isset($_SESSION['error'])){
        ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php
        unset($_SESSION['error']);
    }
    ?>

    <?php if (isset($_SESSION['succes'])){
        ?>
        <div class="alert alert-success"><?= $_SESSION['succes'] ?></div>
        <?php
        unset($_SESSION['succes']);
    }
    ?>
    <h1>Liste des notes</h1>
    <ol class="list-group">
        <?php foreach ($_SESSION['mesNotes'] as $titre=>$contenu)  { ?>
            <li class="list-group-item">
                <?php echo $titre. ' : '. $contenu ; ?>
            </li>
        <?php } ?>
    </ol>
    </body>
<?php }
?>
