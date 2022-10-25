<?php
spl_autoload_register(function($class){ @ require __DIR__ . "/../app/" . $class . ".php"; });

$bootstrap = new Bootstrap();

$bootstrap->init();