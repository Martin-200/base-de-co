
<?php


include 'test.php';


$NameP = $_POST["proposal_name"];

$ereurCode = $_POST["error_code"];

$description =$_POST["description"];



//$chequeListe= $_POST[""],

echo "test ";


echo " Info nom : ". $NameP; 

echo " info ereur: ".  $ereurCode;

///Test:
///info nom:  <?php echo $_POST["proposal_name"]; 
///info ereur: <?php echo $_POST["error_code"]; 
///

echo " info type : ";
$categori=array();

$Y=0;

for($I = 0; $I< $sot ; $I++)

{

if (isset($_POST[$TableauC[$Y]])) 
{
     //echo $TableauC[$Y];
     array_push($categori,$TableauC[$Y]);

}
else
{
      //echo " y'as un probléme ";
}

$Y=$Y+1;

}
$ok=0;
for ($ligne = 0; $ligne<$sot;$ligne++)
{
    if (isset($categori[$ok]))
    {
        echo $categori[$ok];
    }
    else
    {
        echo " vide ";
    }
    $ok=$ok+1;   
}


echo " infor description: ". $description ; 


$id=15;

if (isset($_FILES['picture_example']) && $_FILES['picture_example']['error'] == 0){
    if ($_FILES['picture_example']['size'] <= 1000000){ // Testons si le fichier n'est pas trop gros
        $fileInfo = pathinfo($_FILES['picture_example']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'webp'];

        if (in_array($extension, $allowedExtensions)){ // Testons si l'extension est autorisée
            $newName = base_convert($id, 10, 2);
            $photo = $newName.".".$fileInfo['extension'];

            move_uploaded_file($_FILES['picture_example']['tmp_name'], '../test/photo/' . $photo);
            $photo='../test/photo/'.$photo;

            //$update = $bdd->prepare('UPDATE visite SET photo = ? WHERE id = ?');
            //$update->execute([$photo, $id]);
            //$update->closeCursor();
            echo " c'est bon";
        }
        else
        {
            echo "pas bon";
        }
    }
    else
    {
        echo "pas bon";
    }
}
else
{
    echo " rien ";
}




if(isset($_SESSION['userID']))

{

    //$bdd->query("INSERT INTO problem (`userID`, `title`, `description`, `codeError`, `solution`, `view`, `status`, `linkToScreen`, `dateOfPublication`) 
                    //VALUES(1,'".$NameP."','".$description."','".$ereurCode."','aucune',0,0,'../test/photo/".$photo."',../test/photo/)");

    $sql = "INSERT INTO problem (userID, title, description, codeError, solution, view, status, linkToScreen) VALUES (?,?,?,?,?,?,?, ?);";


    try {
    $stmt = $bdd->prepare($sql);
    $stmt->execute([1,$NameP,$description,$ereurCode,'rien',0,0,$photo]);
    } catch (PDOException $e) {
    $message = $e->getMessage();
    echo $message;
    }
}
else
{
    echo "vous devais etre conecter pour pouvoir envoyer une proposition de fiche problem"
}

?>