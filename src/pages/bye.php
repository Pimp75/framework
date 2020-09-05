<?php
require_once __DIR__.'/../../public/init.php';

$response->setContent('Goodbye');
$response->send();
