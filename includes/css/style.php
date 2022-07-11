<?php
header("Content-type: text/css"); 

$primary = 'black';
$accent = 'yellow';
?>

<style media="screen">
.color-primary {
  color: <?=$primary?>;
}

.color-accent {
  color: <?=$accent?>;
}

:root, [data-theme="default"] {
  --color-primary: <?=$primary?>;
  --color-accent: <?=$accent?>;
}
</style>
