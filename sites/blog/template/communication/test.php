<?php

// ...
// on se connecte à notre base de données

if(!empty($_GET['id'])){ // on vérifie que l'id est bien présent et pas vide

    $id = (int) $_GET['id']; // on s'assure que c'est un nombre entier

    // on récupère les messages ayant un id plus grand que celui donné
    $requete = $bdd->prepare('SELECT * FROM messages WHERE id > :id ORDER BY id DESC');
    $requete->execute(array("id" => $id));

    $messages = null;

    // on inscrit tous les nouveaux messages dans une variable
    while($donnees = $requete->fetch()){
        $messages .= "<p id=\"" . $donnees['id'] . "\">" . $donnees['pseudo'] . " dit : " . $donnees['message'] . "</p>";
    }

    echo $messages; // enfin, on retourne les messages à notre script JS

}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    function charger(){

    setTimeout( function(){

        var premierID = $('#messages p:first').attr('id'); // on récupère l'id le plus récent

        $.ajax({
            url : "charger.php?id=" + premierID, // on passe l'id le plus récent au fichier de chargement
            type : GET,
            success : function(html){
                $('#messages').prepend(html);
            }
        });

        charger();

    }, 5000);

    }

    charger();

</script>
