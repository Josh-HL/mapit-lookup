<?php

// Change if running your own MaPit instance
define('MAPIT_URI', 'http://mapit.mysociety.org');

// Comment out if Zend Framework is already in your include_path
define('ZEND_FRAMEWORK_PATH', '/usr/share/php/libzend-framework-php');

if (defined('ZEND_FRAMEWORK_PATH'))
{
  set_include_path(get_include_path() . PATH_SEPARATOR . ZEND_FRAMEWORK_PATH);
}

require_once 'mapit.php';

$mapit = new MaPit(MAPIT_URI);
$postcode = $mapit->getPostcode('SW1A 1AA');

print_r($postcode);
print "\n";

?>
