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

?>


<html>
    <head>
        <title>Installer</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
          <link href="/bootstrap-3.0.0/dist/css/bootstrap.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <div class='container'>


  <div class="page-header"><h1>Installer</h1></div>

        <div class="well"> 

<?php 

$con=mysqli_connect("localhost",$user,$pass);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Create database
$sql="CREATE DATABASE $db";
if (mysqli_query($con,$sql))
  {
  echo "Database $db created successfully";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }

?>

 

</div>
        </div>
    </body>
</html>
