<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    
    function _initAutoload() {
        $loader = Zend_Loader_Autoloader::getInstance();
        $loader->setFallbackAutoloader(true);
    }
    
    // Initilize database
    protected function _initDatabase()  
    {  
        $adapter = Zend_Db::factory('PDO_MYSQL', array(  
            'host' => 'localhost',  
            'username' => 'root',  
            'password' => 'l3tm3in',  
            'dbname' => 'zenddemo',  
            'charset' => 'utf8'

            /**  
            * Some options  
            * 'port' => '3307',  
            *'unix_socket' => '/tmp/mysql2.sock'  
            */  
        ));  
        Zend_Db_Table_Abstract::setDefaultAdapter($adapter); // setting up the db adapter to DbTable  
    }  
    
    /**
     * Initialize Doctrine
     * @return Doctrine_Manager
     */
    public function _initDoctrine() {
        // include and register Doctrine's class loader
        //require_once('Doctrine/Common/ClassLoader.php');
        $classLoader = new \Doctrine\Common\ClassLoader(
            'Doctrine'
        );
        $classLoader->register();
        
        $classLoader = new \Doctrine\Common\ClassLoader(
            'AZ', 
            APPLICATION_PATH . '/../library/'
        );
        $classLoader->register();        
        
//        $classLoader = new \Doctrine\Common\ClassLoader(
//            'DoctrineExtensions', 
//            APPLICATION_PATH . '/../library/'
//        );
        $classLoader->register();
        
        // create the Doctrine configuration
        $config = new \Doctrine\ORM\Configuration();
        
        // setting the cache ( to ArrayCache. Take a look at
        // the Doctrine manual for different options ! )
        $cache = new \Doctrine\Common\Cache\ArrayCache;
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);
        
        // choosing the driver for our database schema
        // we'll use annotations
        $driver = $config->newDefaultAnnotationDriver(
            APPLICATION_PATH . '/models/'
        );
        $config->setMetadataDriverImpl($driver);
        
        // set the proxy dir and set some options
        $config->setProxyDir(APPLICATION_PATH . '/Proxies');
        $config->setAutoGenerateProxyClasses(true);
        $config->setProxyNamespace('App\Proxies');
//        if (APPLICATION_ENV !== "production") {
//            $config->setSQLLogger(new DoctrineLog());
//        }
        
        // now create the entity manager and use the connection
        // settings we defined in our application.ini
        $connectionSettings = $this->getOption('doctrine');
        $conn = array(
            'driver'    => $connectionSettings['conn']['driv'],
            'user'      => $connectionSettings['conn']['user'],
            'password'  => $connectionSettings['conn']['pass'],
            'dbname'    => $connectionSettings['conn']['dbname'],
            'host'      => $connectionSettings['conn']['host']
        );
         $connauth = array(
            'driver'    => $connectionSettings['conn']['driv'],
            'username'  => $connectionSettings['conn']['user'],
            'password'  => $connectionSettings['conn']['pass'],
            'dbname'    => $connectionSettings['conn']['dbname'],
            'host'      => $connectionSettings['conn']['host']
        );
        
        $entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

        // push the entity manager into our registry for later use
        $registry = Zend_Registry::getInstance();
        $registry->entitymanager = $entityManager;
        $registry->dbConfig = $connauth;
        return $entityManager;
    }
    
}

