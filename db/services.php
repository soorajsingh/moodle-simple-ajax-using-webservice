<?php

$services = array(
      'mypluginservice' => array(                      //the name of the web service
          'functions' => array ('mod_testtest_loadsettings', 'mod_testtest_updatesettings'), //web service functions of this service
          'requiredcapability' => '',                //if set, the web service user need this capability to access 
                                                     //any function of this service. For example: 'some/capability:specified'                 
          'restrictedusers' =>0,                      //if enabled, the Moodle administrator must link some user to this service
                                                      //into the administration
          'enabled'=>1,                               //if enabled, the service can be reachable on a default installation
          'shortname'=>'mytesttestservice' //the short name used to refer to this service from elsewhere including when fetching a token
       )
  );

$functions = array(
    'mod_testtest_loadsettings' => array(
        'classname' => 'mod_testtest_external',
        'methodname' => 'loadsettings',
        'classpath' => 'mod/testtest/externallib.php',
        'description' => 'Load settings data',
        'type' => 'read',
        'ajax' => true,
        'loginrequired' => true,
    ),
    'mod_testtest_updatesettings' => array(
        'classname' => 'mod_testtest_external',
        'methodname' => 'updatesettings',
        'classpath' => 'mod/testtest/externallib.php',
        'description' => 'Update settings data',
        'type' => 'write',
        'ajax' => true,
        'loginrequired' => true,
    )    
);


