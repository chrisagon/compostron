<?php
    $script_name = basename($_SERVER['PHP_SELF']);
    $currDir3=dirname(__FILE__ , 2 );
    $chemin_image = $currDir3.DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."accueil_compostron.png";

    if($script_name == 'index.php' && isset($_GET['signIn'])){
        ?>
        <style>
            body{
                background: url(images/accueil_compostron.png) no-repeat fixed center center / cover;
            }
        </style>

        <div class="alert alert-success" id="benefits">
            Compostron :
            <ul>
                <li> Site de suivi des dépôts de matières sur les sites de compostages
                <li> avec édition de rapport et extraction
                <li> compte demo habitant : habitant1/habitant1
                <li> compte demo animateur : animateur1/animateur1
                <li> compte demo technicien : technicien1/technicien1
                <li> compte demo Gestionnaire DD : gestionnaire1/gestionnaire1
            </ul>
        </div>

        <script>
            $j(function(){
                $j('#benefits').appendTo('#login_splash');
            })
        </script>
        <?php
    }
?>
