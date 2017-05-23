<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitceac49b83e66207e5b2ff31dd4059e77
{
    public static $files = array (
        'fc73bab8d04e21bcdda37ca319c63800' => __DIR__ . '/..' . '/mikecao/flight/flight/autoload.php',
        '5b7d984aab5ae919d3362ad9588977eb' => __DIR__ . '/..' . '/mikecao/flight/flight/Flight.php',
        'f084d01b0a599f67676cffef638aa95b' => __DIR__ . '/..' . '/smarty/smarty/libs/bootstrap.php',
    );

    public static $classMap = array (
        'Configuration' => __DIR__ . '/../../..' . '/app/config/configuration.php',
        'Controller' => __DIR__ . '/../../..' . '/app/config/controller.php',
        'Controller_Demo' => __DIR__ . '/../../..' . '/app/controllers/demo.php',
        'Controller_Empresa' => __DIR__ . '/../../..' . '/app/controllers/empresa.php',
        'Controller_Error' => __DIR__ . '/../../..' . '/app/controllers/error.php',
        'Controller_Index' => __DIR__ . '/../../..' . '/app/controllers/index.php',
        'Controller_Sede' => __DIR__ . '/../../..' . '/app/controllers/sede.php',
        'Controller_Tipos_Almacen' => __DIR__ . '/../../..' . '/app/controllers/tipos_almacen.php',
        'Database' => __DIR__ . '/../../..' . '/app/config/database.php',
        'IdiormMethodMissingException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormResultSet' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormString' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormStringException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'Model' => __DIR__ . '/../../..' . '/app/config/model.php',
        'ORM' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitceac49b83e66207e5b2ff31dd4059e77::$classMap;

        }, null, ClassLoader::class);
    }
}
