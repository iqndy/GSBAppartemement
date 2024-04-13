<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./css/style.css">
        <title>Connexion</title>
    </head>
    <body>
        <h1>Connexion</h1>
        <a href="./?action=Accueil" class="btn">Accueil</a>
        <br>
        Veuillez vous connecter.

        <form method="post" action="./?action=Connexion">
            <ul>
                <li>
                        <label for="login">Login :</label>
                    <input type="text" id="login" name="login" required />
                </li>
                <li>
                    <label for="MotDePasse">Mot de passe :</label>
                    <input type="password" id="MotDePasse" name="MotDePasse" required />
                </li>
            </ul>
        
       <input type="submit" value="Connexion" class="btn">
            
          
        </form>
    </body>
</html>
