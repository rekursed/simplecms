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




$yaml['parameters']['secret']


?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
            <div class="row"><div class="col-md-6">
                    <h3>Parameters</h3>
        <form role='form' method='post' action='../installer/saveparams.php'>
            <div class='form-group'>
                <label>Database name</label>
            <input class='form-control' type='text' name='dbname'  value="<?php echo $yaml['parameters']['database_name']?>"/>
            
            </div>
            
                        <div class='form-group'>
                <label>Database user </label>
            <input class='form-control'  type='text' name='dbuser'  value="<?php echo $yaml['parameters']['database_user']?>"/>
            
            </div>
            
                        <div class='form-group'>
                <label>password</label>
                <input class='form-control'  type='password' name='dbpass' value="<?php echo $yaml['parameters']['database_password']?>"/>
            
            </div>
            

            
            
            <div class='form-group'>
                <button class="btn btn-primary" type='submit'>Save settings</button>
            </div>
        </form>
            </div></div>
            
            <h3>Database</h3>
            <div class="well">
            <a class="btn btn-primary" href='../installer/createdb.php'>Create database</a>
            <a class="btn btn-primary"  href='../installer/load_data.php'>Load sample data</a>
            </div>
        
        </div>
    </body>
</html>
