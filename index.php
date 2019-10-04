<?php


require_once('report.php');

$class = new Report();

// $data = $class->get();
// $data = $class->PR_BORROWERS();
$data = $class->TRANSMASTER();
// $data = $class->getTransmasterCode();
// $data = $class->getUpdate();



// to update all branches
// $data = $class->updateBranch();





// print_r(json_encode($data));



?>