<?php session_start(); 
    $_SESSION['ici']=$_SERVER['REQUEST_URI'];
?>
<style>

        body {
            margin: 0;
            font-family: 'Timeless';
            position: relative;
            height: 100vh;
            background: url("../../image/DSC07063.jpg") no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            overflow: hidden;
        }

        #scroll::-webkit-scrollbar-track
        {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: transparent;
        border-radius: 10px;
        overflow: scroll; 
        }

        #scroll::-webkit-scrollbar
        {
        width: 10px;
        background-color: transparent;
        }

        #scroll::-webkit-scrollbar-thumb
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

        div {
            display: flex;
            flex-direction: row;
        }
        form
        {
            text-align:center;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        form {
            height: 10%;
        }

        section {
            background-color: transparent;
            border: solid black 3px;
            padding: 20px;
        }
        section {
            height: 80%;
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
            background-color: rgba(231, 25, 23, 0.7);
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
        
        .droite {
            float: right;
            border-bottom-left-radius: 10px;
            border-top-left-radius: 10px;
        }

        .gauche {
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
        }

        #message {
            width: 90%;
            height: 50px;
            border-radius: 10px;
            background-color: rgba(200,200,200,0.8);
        }
        
        .block {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form {
            padding-top: 10px;
        }

        .envoi {
            padding: 5px;
            margin-left: 10px;
        }

        
        .button {
          display: inline-block;
          background-color: rgba(196,255,140,0.5);
          border: none;
          text-align: center;
          font-size: 20px;
          width: 300px;
          transition: all 0.5s;
          cursor: pointer;
          margin: 0;
          color: black;
        }

        .bas {
          margin-top: 10px;
        }

        .button:hover {
          background-color: rgba(196,255,140,1); 
        }

        .modifA {
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
        }

        input, textarea, select, option, button {
         background-color:#FFF3F3;
         }
         button {
            padding:3px;
            border:1px solid #F5C5C5;
            border-radius:5px;
            box-shadow:1px 1px 2px #C0C0C0 inset;
         }
        input, textarea, select {
         padding:3px;
         border:1px solid #F5C5C5;
         border-radius:5px;
         width:200px;
         box-shadow:1px 1px 2px #C0C0C0 inset;
         }
        select {
         margin-top:10px;
         }
        input[type=radio] {
         background-color:transparent;
         border:none;
         width:10px;
         }
        input[type=submit], input[type=reset] {
         width:100px;
         margin-left:5px;
         box-shadow:1px 1px 1px #D83F3D;
         cursor:pointer;
         }

        .msg, .date {
            box-shadow: 6px 5px 5px rgba(10,10,10,0.8);
        }

        .moi .msg, .moi .date{
            background-color: rgba(100,200,200,0.7);
            border-radius: 20px;
            padding: 5px;
            padding-right: 20px;
            padding-left: 20px;
        }

        .moi {
            display: flex;
            justify-content: flex-end;
        }
    </style>
<section id="scroll">
    <?php
        // Connexion à la base de données
        include '../../ouvrirBdd.php';


        // Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT ID, pseudo, message, la_date FROM minichat ORDER BY ID ASC');

        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        while ($donnees = $reponse->fetch())
        {
            if ($donnees['pseudo'] == $_SESSION['login']) {
                ?><div class="moi"><p class="date"><?php 
                if ($_SESSION['login'] == $donnees['pseudo'] || $_SESSION['login'] == "root") {
                    ?>
                        <a href="suppMSG.php?msg=<?php echo $donnees['ID']; ?> "><button class="del fa fa-trash"></button></a>
                    <?php 
                }
                echo ' '.htmlspecialchars($donnees['la_date']).' </p><p class="msg">' . htmlspecialchars($donnees['message']) . '</p></div>';
            }else {
                ?><div><p class="date"><?php 
                if ($_SESSION['login'] == $donnees['pseudo'] || $_SESSION['login'] == "root") {
                    ?>
                        <a href="suppMSG.php?msg=<?php echo $donnees['ID']; ?> "><button class="del fa fa-trash"></button></a>
                    <?php 
                }
                echo ' '.htmlspecialchars($donnees['la_date']).' <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : </p><p class="msg">' . htmlspecialchars($donnees['message']) . '</p></div>';
            }
        }

        $reponse->closeCursor();
    ?>
</section>
<script type="text/javascript">
    element = document.getElementById('scroll');
    element.scrollTop = element.scrollHeight;
</script>