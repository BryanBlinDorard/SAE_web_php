<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Quyz</title>
    </head>
    
    <body>
        <style><?php include '../styles/home.css'; ?></style>
        <style><?php include '../styles/scoreboard.css'; ?></style>
        <input type="button" value="Accueil" onclick="window.location.href='/home.php'">
        <h1>Voici les Scores</h1>
        <div class="scoreboard">
            <?php
                require_once("../connexion.php");
                require_once("../classes/Classement.php");
                $requete = $connexion->prepare("select * from QUESTIONNAIRE natural join CLASSEMENT");
                $requete->execute();
                $classements = $requete->fetchAll();

                foreach($classements as $classement) {
                    $listeClassements[] = new Classement($classement["idClassement"], $classement["idQuestionnaire"], $classement["nom"]);
                }

                foreach($listeClassements as $classement) {
                    echo "<div id=\"Q".$classement->id."\" class=\"questionnaireScoreboard\">";
                    echo "<h3>".$classement->nomQuestionnaire."</h3>";
                    echo "<table class=\"tableau\"";
                    echo "<tr>";
                    echo "<th>Score</th>";
                    echo "<th>Nom</th>";
                    echo "</tr>";
                    $requeteScore = $connexion->prepare("select * from SCORE natural join CLASSEMENT where idClassement=".$classement->id);
                    $requeteScore->execute();
                    $scores = $requeteScore->fetchAll();
                    echo "</table>";
                    echo "</div>";
                }

            ?>
            <div id="Q1" class="questionnaireScoreboard">
                <h3>Questionnaire 1</h3>
                <table class="tableau">
                    <tr>
                        <th>Score</th>
                        <th>Nom</th>
                    </tr>
                    <tr>
                        <td>100</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>90</td>
                        <td>Paul</td>
                    </tr>
                    <tr>
                        <td>80</td>
                        <td>George</td>
                    </tr>
                    <tr>
                        <td>70</td>
                        <td>Ringo</td>
                    </tr>
                </table>
            </div>
            <div id="Q2" class="questionnaireScoreboard">
                <h3>Questionnaire 2</h3>
                <table class="tableau">
                    <tr>
                        <th>Score</th>
                        <th>Nom</th>
                    </tr>
                    <tr>
                        <td>100</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>90</td>
                        <td>Paul</td>
                    </tr>
                    <tr>
                        <td>80</td>
                        <td>George</td>
                    </tr>
                    <tr>
                        <td>70</td>
                        <td>Ringo</td>
                    </tr>
                </table>
            </div>
            <div id="Q3" class="questionnaireScoreboard">
                <h3>Questionnaire 3</h3>
                <table class="tableau">
                    <tr>
                        <th>Score</th>
                        <th>Nom</th>
                    </tr>
                    <tr>
                        <td>100</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>90</td>
                        <td>Paul</td>
                    </tr>
                    <tr>
                        <td>80</td>
                        <td>George</td>
                    </tr>
                    <tr>
                        <td>70</td>
                        <td>Ringo</td>
                    </tr>
                </table>
            </div>
            <div id="Q4" class="questionnaireScoreboard">
                <h3>Questionnaire 4</h3>
                <table class="tableau">
                    <tr>
                        <th>Score</th>
                        <th>Nom</th>
                    </tr>
                    <tr>
                        <td>100</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>90</td>
                        <td>Paul</td>
                    </tr>
                    <tr>
                        <td>80</td>
                        <td>George</td>
                    </tr>
                    <tr>
                        <td>70</td>
                        <td>Ringo</td>
                    </tr>
                </table>
        </div>
        
    </body>
</html>