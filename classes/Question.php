<?php
class Question {
    public $id;
    public $numero;
    public $question;
    public $typeQuestion;
    public $valeurQuestion;
    public $idQuestionnaire;
    public $reponse;

    public function __construct($id, $numero, $question, $typeQuestion, $valeurQuestion, $idQuestionnaire){
        $this->id = $id;
        $this->numero = $numero;
        $this->question = $question;
        $this->typeQuestion = $typeQuestion;
        $this->valeurQuestion = $valeurQuestion;
        $this->idQuestionnaire = $idQuestionnaire;
        $this->reponse =array();
    }

    public function getId(){
        return $this->id;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getQuestion(){
        return $this->question;
    }

    public function getTypeQuestion(){
        return $this->typeQuestion;
    }

    public function getValeurQuestion(){
        return $this->valeurQuestion;
    }

    public function getIdQuestionnaire(){
        return $this->idQuestionnaire;
    }

    public function getReponse(){
        return $this->reponse;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setQuestion($question){
        $this->question = $question;
    }

    public function setTypeQuestion($typeQuestion){
        $this->typeQuestion = $typeQuestion;
    }

    public function setValeurQuestion($valeurQuestion){
        $this->valeurQuestion = $valeurQuestion;
    }

    public function setIdQuestionnaire($idQuestionnaire){
        $this->idQuestionnaire = $idQuestionnaire;
    }

    public function addReponse($reponse){
        array_push($this->reponse, $reponse);
    }

    public function __toString(){
        return "Question [id=".$this->id.", numero=".$this->numero.", question=".$this->question.", typeQuestion=".$this->typeQuestion.", valeurQuestion=".$this->valeurQuestion.", idQuestionnaire=".$this->idQuestionnaire."]";
    }

    public function affichage($connexion) {
        echo "<div id='q".$this->id."' class='question'>";
        echo "<h3>".$this->question."</h3>";
        if ($this->typeQuestion == "text"){
            echo "<div class='textAnswer'>";
            echo "<input type='text' name=".$this->numero." placeholder='Votre réponse' required>";
            echo "</div>";
        } else if ($this->typeQuestion == "date"){
            echo "<div class='dateAnswer'>";
            echo "<input type='date' name=".$this->numero." required>";
            echo "</div>";
        } else if ($this->typeQuestion == "number"){
            echo "<div class='numberAnswer'>";
            echo "<input type='number' name=".$this->numero." required>";
            echo "</div>";
        } else if ($this->typeQuestion == "radio") {
            echo "<div class='radioAnswer'>";
            // récupère les réponses de la question du questionnaire
            $requete = $connexion->prepare("SELECT * FROM REPONSE natural join QUESTION WHERE idQuestion = $this->id and idQuestionnaire = $this->idQuestionnaire");
            $requete->execute();
            $resultat = $requete->fetchAll();
            foreach ($resultat as $reponse) {
                echo "<input type='radio' name=".$this->numero." value=".$reponse['idReponse'].">".$reponse['reponse']."<br>";
            }
            echo "</div>";
        } else if ($this->typeQuestion == "checkbox") {
            echo "<div class='checkboxAnswer' required>";
            // récupère les réponses de la question du questionnaire
            $requete = $connexion->prepare("SELECT * FROM REPONSE natural join QUESTION WHERE idQuestion = $this->id and idQuestionnaire = $this->idQuestionnaire");
            $requete->execute();
            $resultat = $requete->fetchAll();
            foreach ($resultat as $reponse) {
                echo "<input type='checkbox' name=".$this->numero."[] value=".$reponse['idReponse'].">".$reponse['reponse']."<br>";
            }
            echo "</div>";
        }
        echo "</div>";
    }
}
?>