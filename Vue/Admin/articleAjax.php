<?php 
    if (isset($_POST['id'])) { 
        $id = $_POST['id'];
    } else {$id = 1;}
    
    //echo "<div id='id'>".$id."</div>";
?>

<?php 
$db = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8', 'root', '');

$sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' where BIL_ID='.$id;


foreach($db->query($sql) as $row) { ?>
    
    <article class="drop-shadow curved curved-hz-2">
        <header>
            <center><i class="fa fa-pencil-square-o fa-2x txtGris2"></i>  </center>
            <h1 class="titreArticleAjax"><?=$row['titre'] ?></h1>
            <time><?= $row['date'] ?></time>
        </header>
        
        <div class="contenuArticleAjax">
            <p class=""><?= $row['contenu'] ?></p>
            </br>
        </div>
        
        

    
    </article>
    <?php
}
?>
