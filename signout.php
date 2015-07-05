<?php
session_start();
session_destroy();

header("Location: index.php?signed_out=1");
exit(0);
?>
