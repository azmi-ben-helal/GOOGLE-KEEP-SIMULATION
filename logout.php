<?php
/**
 * Created by PhpStorm.
 * User: MIRA
 * Date: 12/11/2018
 * Time: 22:27
 */

// On démarre la session
session_start ();

// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();

// On redirige le visiteur vers la page d'accueil
header ('location: sessions.html');
