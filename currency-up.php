<?php

define('DIR_ROOT_APP', dirname(__FILE__).'/');

require_once(DIR_ROOT_APP . 'admin/config.php');

if (file_exists(DIR_ROOT_APP . 'vqmod/vqmod.php')) {
	// VirtualQMOD
	require_once(DIR_ROOT_APP . 'vqmod/vqmod.php');
	VQMod::bootup();
	require_once(VQMod::modCheck(DIR_SYSTEM . 'startup.php'));
} else {
	require_once(DIR_SYSTEM . 'startup.php');
}

// Registry
$registry = new Registry();

// Loader
$obj = new Loader($registry);
$registry->set('load', $obj);

// Config
$config = new Config();
$registry->set('config', $config);

// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$registry->set('db', $db);

// Settings
$query = $db->query("SELECT * FROM " . DB_PREFIX . "setting");

foreach ($query->rows as $setting) {
	$config->set($setting['key'], $setting['value']);
}

// Cache
$registry->set('cache', new Cache());

//Currency update
$obj->load->model('localisation/currency');
$obj->model_localisation_currency->updateCurrencies(true);

echo "Ok\n";
?>