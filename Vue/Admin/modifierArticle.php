<?php $this->titre = "Mon Blog - " . $this->nettoyer($billet['titre']); ?>

<article class="drop-shadow curved curved-hz-2"> 
    <header>
        <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
        <time><?= $this->nettoyer($billet['date']) ?></time>
    </header>
    <p><?= $this->nettoyer($billet['contenu']) ?></p>
    </br>
    
     <form method="post" action="admin/majArticle">
         
            <div>
                Titre
                <input id="titre" name="titre" value="<?= $billet['titre'] ?>" />
                </br>
            </div>
         
            <div>
                <textarea id="txtContenu" class="mce" name="contenu" rows="10" required>
                        <?= $this->nettoyer($billet['contenu']) ?>
                </textarea>
                
            </div>

            <div>
                <input type="hidden" name="id" value="<?= $billet['id'] ?>" />

                <input class="okbtn" onclick="recup_tinyMCE_contenu()" type="submit" value="Ok" />
           </div>

        </form>

    
</article>

