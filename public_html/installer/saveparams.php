<?php
 
use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Dumper;


$db = $_POST['dbname'];
$user = $_POST['dbuser'];
$pass = $_POST['dbpass'];

$loader = require_once __DIR__.'/../../app/bootstrap.php.cache';
 
    $file = __DIR__.'/../../app/config/parameters.yml';
 $yaml = Yaml::parse(file_get_contents($file));

 
require_once __DIR__.'/../../app/AppKernel.php';


$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();



$dumper = new Dumper();


$yaml['parameters']['database_name'] = $db;
$yaml['parameters']['database_user'] = $user;
$yaml['parameters']['database_password'] = $pass;
$yaml2 = $dumper->dump($yaml,33);

file_put_contents($file, $yaml2);

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

        <div class="well"> Settings saved to /app/config/parameters.yml</div>
        </div>
    </body>
</html>
