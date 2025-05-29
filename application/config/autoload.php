<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.
|
*/

/*
| -------------------------------------------------------------------
| Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
*/
$autoload['libraries'] = array(
    'database',      // Database connection
    'session',       // Session handling
    'form_validation', // Form validation
    'upload',        // File upload
    'email',         // Email functionality
    'user_agent',    // Browser detection
    'pagination'     // Pagination
);

/*
| -------------------------------------------------------------------
| Drivers
| -------------------------------------------------------------------
| These are the drivers located in system/libraries/ or your
| application/libraries/ directory.
|
*/
$autoload['drivers'] = array('cache');

/*
| -------------------------------------------------------------------
| Helper Files
| -------------------------------------------------------------------
| Prototype:
| $autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array(
    'url',          // URL helper functions
    'form',         // Form helper functions
    'security',     // Security helper functions
    'string',       // String manipulation functions
    'text',         // Text helper functions
    'date',         // Date helper functions
    'file',         // File helper functions
    'html',         // HTML helper functions
    'custom'        // Our custom helper functions
);

/*
| -------------------------------------------------------------------
| Config Files
| -------------------------------------------------------------------
| Prototype:
| $autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files. Otherwise, leave it blank.
|
*/
$autoload['config'] = array('custom_config');

/*
| -------------------------------------------------------------------
| Language Files
| -------------------------------------------------------------------
| Prototype:
| $autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file. For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
| Models
| -------------------------------------------------------------------
| Prototype:
| $autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
| $autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array(
    'User_model'  // Our User model
);

/*
| -------------------------------------------------------------------
| Packages
| -------------------------------------------------------------------
| Prototype:
| $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();


/* End of file autoload.php */
/* Location: ./application/config/autoload.php */
