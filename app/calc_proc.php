<?php
    require_once '../libs/Smarty.class.php';
    require_once '../config.php';

    require_once $conf->root_path.'/app/calc_proc.class.php';

    $ctrl = new calc_proc();
    $ctrl->process();
?>