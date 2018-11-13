<?php
/**
 * Created by PhpStorm.
 * User: MIRA
 * Date: 13/11/2018
 * Time: 16:39
 */


session_start();
/*
 * Si on a une session on ajoute la note
 * Sinon je créer une variable de session je la remplis de fake note et je l'affiche
 */
/*
 *
 if (!isset($_SESSION['mesNotes'])) {
    $_SESSION['mesNotes']=array(
        'Dimanche'=>'Dormir',
        'Samedi' => 'Sortir'
    );
}
*/

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Liste des notes</title>
    </head>
<body>
    <form action="googlkeep.php" method="post">
        <label for="nom">Nom</label><input name="nom" class="form-control" id="nom" type="text">
        <label for="note">Note</label><input name="note" class="form-control" id="note" type="text">
        <input type="submit" value="Envoyer" class="btn btn-primary">
    </form>
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