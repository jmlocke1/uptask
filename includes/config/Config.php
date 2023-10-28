<?php
require_once 'ConfigLocal.php';
define('DIR_ROOT', dirname(dirname(__DIR__)));
define('FUNCIONES_URL', DIR_ROOT.'/funciones');
define('TEMPLATES_URL', DIR_ROOT.'/includes/templates');

if(!isset($_SESSION)) {
    session_start();
}
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
/**
 * Configuración de la aplicación AppSalon.
 */
class Config {
	/**
	 * Dominio del proyecto
	 */
	const DOMAIN_PROJECT = ConfigLocal::DOMAIN_PROJECT;
	/**
	 * Carpeta de imágenes para PHP
	 */
	const CARPETA_IMAGENES = DIR_ROOT."/public/build/img/";
	/**
	 * Carpeta de imágenes para la vista
	 */
	const CARPETA_IMAGENES_VIEW = '/build/img/';

	/**
	 * Longitud mínima del password
	 */
	const MIN_LENGTH_PASSWORD = 6;

	/**
	 *  Coste del algoritmo de generación de claves
	 */ 
    const PASSWORD_COST = 10;
	
	/**
	 * Host de la base de datos
	 */
	const DB_HOST = ConfigLocal::DB_HOST;
	/**
	 * Usuario de la base de datos
	 */
	const DB_USER = ConfigLocal::DB_USER;
	/**
	 * Password del usuario de la base de datos
	 */
	const DB_PASSWORD = ConfigLocal::DB_PASSWORD;
	/**
	 * Nombre de la base de datos
	 */
	const DB_NAME = ConfigLocal::DB_NAME;

	// Configuración de mailer
	/**
	 * Host de mailtrap
	 */
	const MAILTRAP_HOST = ConfigLocal::MAILTRAP_HOST;
	/**
	 * Puerto de mailtrap
	 */
	const MAILTRAP_PORT = ConfigLocal::MAILTRAP_PORT;
	const MAILTRAP_USERNAME = ConfigLocal::MAILTRAP_USERNAME;
	const MAILTRAP_PASSWORD = ConfigLocal::MAILTRAP_PASSWORD;
	/**
	 * Email desde donde se mandan las notificaciones. En el despliegue
	 * hay que poner el adecuado, pues este es de prueba y no existe.
	 */
	const MAIL_ORIGIN = ConfigLocal::MAIL_ORIGIN;
}