<?php

//Después importamos la clase Capsule escribiendo su ruta completa incluyendo el namespace
use Illuminate\Database\Capsule\Manager as Capsule;

//Creamos un nuevo objeto de tipo Capsule
$capsule = new Capsule;

//Indicamos en el siguiente array los datos de configuración de la BD

  $cnx_local = [
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'db_culqi',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
  ] ;

  $cnx_prod = [
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'armandotuweb_templates_admin',
    'username'  => 'armandotuweb_usertemplate',
    'password'  => 'aepp+-*template',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
  ] ;

$capsule->addConnection($cnx_prod);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// //Y finalmente, iniciamos Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();