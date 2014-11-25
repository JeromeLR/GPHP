<?php $this->titre = "Mon Blog"; ?>

<?php foreach ($billets as $billet): ?>

    
    <article  class="drop-shadow curved curved-hz-2">
        <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>">
            <header>
            
                <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>

                <time><?= $this->nettoyer($billet['date']) ?></time>
            
            </header>
        </a>

        
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
    

    
<?php endforeach; ?>