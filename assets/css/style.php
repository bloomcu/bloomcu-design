<?php
header("Content-type: text/css"); 
$primary = 'green';
$accent = 'yellow';
?>

<!-- <style media="screen"> -->
.color-primary {
  color: <?=$primary?>;
}

.color-accent {
  color: <?=$accent?>;
}

.btn--tertiary {
  background: <?=$accent?>;
}

:root, [data-theme="default"] {
  --color-primary: <?=$primary?>;
  --color-accent: <?=$accent?>;
}
<!-- </style> -->
