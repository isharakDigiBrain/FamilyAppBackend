<?php
// define Role
//include_once SITE_ROOT_ROLE . $Role . WS . 'dashboard.php';
include_once SITE_ROOT_ROLE . 'Common' . WS . 'dashboard.php';  //all same file added to common section
?>

<script>
    console.log(' I am in <?= $Role ?> Role. ');
    console.log('test');
</script>