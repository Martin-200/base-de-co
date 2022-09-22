
<?php


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

if (isset($_POST['php'])) 
{
     echo " php ";
}
if (isset($_POST['html'])) 
{
    echo " html ";
}
if (isset($_POST['javascript']))
{
       echo " javascript ";
}
if (!isset($_POST['php'])&!isset($_POST['html'])&!isset($_POST['javascript']))
{
      echo " y'as rien ";
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


?>