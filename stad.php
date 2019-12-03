<?php
require_once "lib/autoload.php";

BasicHead();
?>
<body>

<div class="jumbotron text-center">
    <h1>Detailpagina Afbeelding</h1>
</div>

<div class="container">
    <div class="row">

        <?php
        $data = GetData("select * from images where img_id=" . $_GET['id'] );
        $template = LoadTemplate("stad");
        print ReplaceContent( $data, $template);
        ?>

    </div>
</div>

</body>
</html>