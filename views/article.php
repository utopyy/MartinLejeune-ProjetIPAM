<?php ob_start()?>
<?php $title = REQ_TYPE_ID; 
echo $title;?>
<body>

coucou
</body>
<?php
$title="Welcome";
$content=ob_get_clean();
include 'includes/template.php';
?>
