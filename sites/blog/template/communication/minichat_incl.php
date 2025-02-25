<style>
    /*
    *  STYLE 7
    */

    #style-7::-webkit-scrollbar-track
    {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: transparent;
    border-radius: 10px;
    overflow: scroll; 
    }

    #style-7::-webkit-scrollbar
    {
    width: 10px;
    background-color: transparent;
    }

    #style-7::-webkit-scrollbar-thumb
    {
    border-radius: 10px;
    border:0.5px solid grey;
    background-image: -webkit-gradient(linear,
                     left bottom,
                     left top,
                     color-stop(0.44, rgb(63, 52, 12)),
                     color-stop(0.72, rgb(126, 95, 54)),
                     color-stop(0.86, rgb(167, 171, 183)));
    }

    aside {
        min-width: 400px;
        width: 40vw;

        padding-top: 100px;

        height: 500px;
        top: 100px;

        position: relative;
        float: right;
    }



    @media screen and (min-width: 920px) {
      aside {
        padding-top: 0;
      }
    }
    .div-chat {
        display: flex;
        flex-direction: row;
    }
    form
    {
        text-align:center;
    }
    form {
        height: 30%;
    }

    .tchat, form {
        background-color: rgba(200,200,200,0.5);
        padding: 20px;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .tchat, form {
        border: solid rgba(200,200,200,1) 3px;
        border-right: none;
    }

    .tchat {
        height: 70%;
        overflow: auto;
    }
    
    p {
        padding: 5px;
    }
    
    ul {
      list-style: none;
    }
    .connexion {
      border-radius: 10px;
      padding: 10px;
      text-align: center;
      margin-top: 7px;
      margin-right: 7px;
    }

    .connexion a {
      margin: 0;
      transition: 0.3s;
    }

    .connexion a:hover {
      color: white;
      transition: 0.3s;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .connexion {
      color: black;
      text-shadow:
        0 0 5px #fff,
        0 0 10px #fff,
        0 0 20px #fff,
        0 0 40px #0ff,
        0 0 80px #0ff,
        0 0 90px #0ff,
        0 0 100px #0ff,
        0 0 150px #0ff;
    }

    .msg, .date{
        border: 2px solid grey;
        background-color: rgba(200,200,200,0.8);
        border-radius: 20px;
        padding: 5px;
        padding-right: 20px;
        padding-left: 20px;
    }

    .date {
        border-bottom-right-radius: 0px;
        border-top-right-radius: 0px;
        margin-right: 10px;
    }
    .msg {
        border-bottom-left-radius: 0px;
        border-top-left-radius: 0px;
        margin-left: 10px;
    }

    .textmsg {
        position: inherit;
        right: inherit;
        min-width: inherit;
        width: inherit;
    }
    .msg, .date {
        box-shadow: 6px 5px 5px rgba(50,50,50,1);
    }
</style>
<section class="tchat scrollbar" id="style-7">
    <?php
        // Connexion à la base de données
        include 'ouvrirBdd.php';

        // Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT pseudo, message, la_date FROM minichat ORDER BY ID DESC LIMIT 0, 10');

        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        while ($donnees = $reponse->fetch())
        {
            echo '<div class="div-chat"><p class="date">'.htmlspecialchars($donnees['la_date']).' <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : </p><p class="msg">' . htmlspecialchars($donnees['message']) . '</p></div>';
        }

        $reponse->closeCursor();
    ?>
</section>





