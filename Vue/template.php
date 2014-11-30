<!doctype html>
<html lang="fr">
    <head>
        
        <!-- google font -------------------------------------------------------------------------------------------------------->
        <!-- titre -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <!-- text -->
        <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
        <!----------------------------------------------------------------------------------------------------------------------->

        
        <!---- JQuery + UI ------------------------------------------------------------------------------------------------------->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        
        <script>
            $(function() {
              $( document ).tooltip();
            });
        </script>
        
        <!---------------------------------------------------------------------------------------------------------------------->
        
        <!-- Bootstrap ---------------------------------------------------------------------------------------------------------->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <!---------------------------------------------------------------------------------------------------------------------->
        
        
        
        <!-- Font Awesome ---------------------------------------------------------------------------------------------------------->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- Base -------------------------------------------------------------------------------------------------------------->
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="css/style.css" />
        <!---------------------------------------------------------------------------------------------------------------------->

        
        <!-- tinyMCE -->
        <script type="text/javascript" src="lib/tinymce-4.1.6/tinymce.min.js"></script>
        
        <script type="text/javascript">
            tinymce.init({
                    selector: "textarea.mce",
                    plugins: [
                            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
                    ],

                    toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
                    toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
                    toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

                    menubar: false,
                    toolbar_items_size: 'small',

                    style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ],

                    templates: [
                            {title: 'Test template 1', content: 'Test 1'},
                            {title: 'Test template 2', content: 'Test 2'}
                    ]
            });
        </script>
        
        <script type="text/javascript">
            // copier le contenu du TinyMCE dans le textarea
            function recup_tinyMCE_contenu() { console.debug(tinyMCE.activeEditor.getContent()); }
        </script>
        <!--------------------------------------------------------------------------------------------->
        
        <title><?= $titre ?></title>
    </head>
    
    <body class="<?php echo substr($this->fichier, 4, 5);?>">
        <div id="wrap">
            <div id="global"  class="drop-shadow curved curved-hz-2">
                
                <div id="englobTitre">
                    
                    <header id="gphp" class="col-md-3 drop-shadow curved curved-hz-2">
                        
                        <a href="">
                            <h1 id="titreBlog">GPHP</h1>
                        </a>
                        <center><p>Au tout début, il y eu le big bang...</p></center>
                            
                    </header>
                    
                </div>
                <div class="row">
                    <div class="droite col-md-1 Admin">
                        <a href="Admin"  title="Administration">
                            <!--<div class="rouge btn-admin drop-shadow curved curved-hz-2 ">-->
                                <i class="txtGris fa fa-gear fa-2x"></i>
                            <!--</div>-->
                        </a>
                    </div>
                </div>
                
                <div id="contenu" class="row">
                    
                        <?= $contenu ?>
                </div> <!-- #contenu -->
                
                <footer class="row" id="englobAdmin">
                    
                    
                    
                </footer>
                
            </div> <!-- #global -->
        </div> <!-- #warp -->
    </body>
</html>