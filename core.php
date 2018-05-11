<?php


function auto_loader($class)
{
    $filename = 'src/' . str_replace('\\', '/', $class) . '.php';
    include($filename);

}
spl_autoload_register('auto_loader');

