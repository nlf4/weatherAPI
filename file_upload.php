<?php
require_once "lib/autoload.php";

BasicHead();
?>
<body>

<div class="jumbotron text-center">
    <h1>Formulier File Upload</h1>
</div>

<div class="container">
    <div class="row">

        <?php
        print LoadTemplate("form_file_upload");;
        ?>

    </div>
</div>

</body>
</html>