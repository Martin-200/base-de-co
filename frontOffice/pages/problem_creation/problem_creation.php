<html>
    <head>
       
    </head>
    <body>
        <title>Formulaire de Proposition de Fiche de problemes</title>
        <form action="action_problem_creation.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="Nameproposal">Nom fiche proposer</label>
                <input type="text" name="proposal_name" id="Nameproposal"/>
            </div>
            <div>
                <label for="Error_Code">Code ereur</label>
                <input type="text" name="error_code" id="Error_Code"/>
            </div>
            <div>

                <?php
                include 'test.php';
                $i=0;
                $id=1;
                $c=0;
               

                while($i<$sot)
                {
                    $i=$i+1;
                    $id=$id+1;
                    ?>
                    <div>
                        <label for="<?php $id ?>"><?php echo $TableauC[$c] ?><label>
                        <input type ="checkbox" id="<?php $id ?>" name="<?= $TableauC[$c] ?>"></input>
                    </div>
                    <?php
                    $c=$c+1;
                    
                    
                }

                ?>


                <!--<div>
                    <label for="PHP">PHP</label>
                    <input type="checkbox" id="PHP" name="php"/>
                </div>
                <div>
                    <label for="HTML">html</label>
                    <input type="checkbox" id="HTML" name="html"/>
                </div>
                <div>
                    <label for="JS">javascript</label>
                    <input type="checkbox" id="JS" name="javascript"/>
                </div>-->
            </div>
            <div>
                <label for="Description">description</label>
                <textarea name="description"  rows="8" cols="45" id="Description"></textarea>
            </div>
            <div>
                <label for="pictureE">Nom fiche proposer</label>
                <input type="file" name="picture_example" id="pictureE" >
            </div>
            <div>
                <input type="submit" value="Submit"/>
            </div>
        </form>
    </body>
</html>