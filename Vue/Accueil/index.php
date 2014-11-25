<?php $this->titre = "Mon Blog"; ?>

<?php foreach ($billets as $billet):
    ?>
<a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>">
    <article  class="drop-shadow curved curved-hz-2">
        <header>
            
                <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
            <time><?= $this->nettoyer($billet['date']) ?></time>
        </header>
        <p><?= $this->nettoyer($billet['contenu']) ?></p>
    </article>
</a>

    
<?php endforeach; ?>
