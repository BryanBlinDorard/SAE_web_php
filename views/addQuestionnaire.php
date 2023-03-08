<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Quyz</title>
    </head>
    <body>
        <?php
        require_once("../functions/fonctions.php");
        if (!verifierSiIlEstConnecte()) {
            header('Location: ./home.php');
        } 
        ?>
        <style><?php include '../styles/home.css'; ?></style>
        <style><?php include '../styles/menu.css'; ?></style>
        <style><?php include '../styles/edit.css'; ?></style>
        <style><?php include '../styles/IE.css'; ?></style>
        <header><a href="menu.php"><button>Retour</button></a></header>
        <?php
            echo "<h2>Création du questionnaire</h2>";
            echo "<form action='saveNewQuestionnaire.php' method='post'>";
            
            echo "<div class='nomQuestionnaire'>";
            echo "<label for='name'>Nom du questionnaire</label>";
            echo "<input type='text' name='name' id='name' required>";
            echo "<input type='submit' value='Valider'>";
            echo "</div>";

            echo "</form>";
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo "<p class='error'>Le nom du questionnaire existe déjà</p>";
            }
            
        ?>
    </body>
</html>