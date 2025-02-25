<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <script type="text/javascript" src="jquery-3.4.1.js"></script>
        <title>Mini-chat</title>
        
        <script type="text/javascript">
			
			function display_messages(){
				let premierID = $('#messages p:first').attr('id'); // on récupère l'id le plus récent
				console.log("premierID=", premierID);

				$.ajax({

						url : "messages.php?id=" + premierID, // on passe l'id le plus récent au fichier de chargement
						type : "GET",
						success : function(html){
							console.log("html=", html, html.length);
							if (html != "") {
								$('#messages').prepend(html);
							}
						}
	
				});

				setTimeout(display_messages, 5000);
			}
	 
			$(document).ready(display_messages);
			
		</script>
        
    </head>
   
    <style>
		form {
			text-align:center;
		}
    </style>
    
    <body>
    
		<form action="minichat_post.php" method="post">
			<p>
				<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" value="" id="pseudo" /><br />
				<label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

				<input type="submit" value="Envoyer" />
			</p>
		</form>
    
		<div id="messages">
			<p id="0" style="visible: hidden"></p>
		</div>
	
    </body>
</html>
