<?php

/**
 * Composer
 */
require dirname(__DIR__) . '/Vendor/Autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


require_once dirname(__DIR__) . '/App/routes.php';