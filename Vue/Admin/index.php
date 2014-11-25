<?php $this->titre = "Mon Blog - Administration" ?>


<div class="row">
    <div class="col-sm-4 col-md-4">
       <div class="jaune drop-shadow curved curved-hz-2">
            <h2>Administration</h2>
            <h3>Salut toi <?= $this->nettoyer($login) ?> !</h3>
             <div class="deco btn-admin drop-shadow curved curved-hz-2">
                <a id="lienDeco" href="connexion/deconnecter">Déco</a>
            </div>
             <h3>
                Sous le capot, il y a 
                <?= $this->nettoyer($nbBillets) ?> articles 
                et <?= $this->nettoyer($nbCommentaires) ?> 
                commentaires.
            </h3>
        </div>
    </div>
</div>



<?php /*---------------------------------------*/
    $numeroArticle = 1;
    foreach ($billets as $billet): 
 ?>


<div class="row">
    <a href="<?= "Admin/modifierArticle/" . $this->nettoyer($billet['id']) ?>">
        <div class="col-sm-6 col-md-6">
            <div class="listeTitreArticle drop-shadow curved curved-hz-2">
                <h2 class="titreBillet">
                    <?= $numeroArticle++ ?> 
                    <?= $this->nettoyer($billet['titre']) ?>
                </h2>
            </div>
        </div>
    </a>
</div>


<?php endforeach;
/*---------------------------------------*/?>

<div class="row">
    <div class="col-sm-6 col-md-6">
        <form class="row" method="post" action="billet/commenter">
            <div class="jaune drop-shadow curved curved-hz-2">
                <span class="txtAjoutArticle">Ajouter un Article :</span>
                <input id="auteur" name="auteur" type="text" placeholder="Nom" required />
            </div>


            <br />

            <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire" required>

            </textarea>

            <br />

            <input type="hidden" name="id" value="<?//= $billet['id'] ?>" />

            <input onclick="recup_tinyMCE_contenu()" type="submit" value="Valider" />

        </form>
    </div>
</div>


