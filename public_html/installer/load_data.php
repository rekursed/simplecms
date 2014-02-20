<?php
 
use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Dumper;



$loader = require_once __DIR__.'/../../app/bootstrap.php.cache';
 
    $file = __DIR__.'/../../app/config/parameters.yml';
 $yaml = Yaml::parse(file_get_contents($file));

 
require_once __DIR__.'/../../app/AppKernel.php';


$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();


$db = $yaml['parameters']['database_name'];
$user = $yaml['parameters']['database_user'];
$pass = $yaml['parameters']['database_password'];
$path = 'sample.sql';




        $command = "mysql $db --password='".$pass."' --user=$user < $path";
        $result = exec($command, $val);

?>


<html>
    <head>
        <title>Installer</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
          <link href="../installer/bootstrap.css" type="text/css" rel="stylesheet" />
    </head>
    <body>




        <div class='container'>
  <div class="page-header"><h1>Installer</h1></div>
        <div class="well"> Sample data loaded</div>
        </div>
    </body>
</html>
