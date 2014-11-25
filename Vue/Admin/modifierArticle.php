<?php $this->titre = "Mon Blog - " . $this->nettoyer($billet['titre']); ?>

<article class="drop-shadow curved curved-hz-2"> 
    <header>
        <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
        <time><?= $this->nettoyer($billet['date']) ?></time>
    </header>
    <p><?= $this->nettoyer($billet['contenu']) ?></p>
    
     <form method="post" action="billet/modifier">
        
            <textarea id="txtContenu" name="contenu" rows="10" required>
                    <?= $this->nettoyer($billet['contenu']) ?>
            </textarea>

            <br />

            <input type="hidden" name="id" value="<?= $billet['id'] ?>" />

            <input onclick="recup_tinyMCE_contenu()" type="submit" value="modifier" />

        </form>

    
</article>

