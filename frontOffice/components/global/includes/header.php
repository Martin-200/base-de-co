<!DOCTYPE html>
<html>
    <head>
        <menu id="menuH">
            <li>
                <title>Base connaisance</title>
            </li>
            <li>
                <p><?php $text_message ?></p>
            </li>
            <li>
                <div id="zone_utilisateur">
                    <ul id="menuP">
                        <?php
                        if (is_null($idMenuP))
                        {
                          ?>
                          <li><a>log in</a></li>
                          <?php
                        }
                        else
                        {
                            ?>
                            <li><a>profil</a></li>
                            <li><a>deconection</a></li>
                            <?php
                        }
                        ?>
                        
                    </ul>
                    <img alt="image de profil">
                </div>
            </li>
        </menu>
    </head>
</html>