<?php

/**
 * CULQI PHP SDK
 *
 * Init, cargamos todos los archivos necesarios
 *
 * @version 1.2.1
 * @package Culqi
 * @copyright Copyright (c) 2015-2016 Culqi
 * @license MIT
 * @license https://opensource.org/licenses/MIT MIT License
 * @link http://beta.culqi.com/desarrolladores/ Culqi Developers
 */

// Errors
include_once dirname(__FILE__).'/Culqi/Error/Errors.php';
include_once dirname(__FILE__).'/Culqi/Client.php';
include_once dirname(__FILE__).'/Culqi/Resource.php';

// Culqi API
include_once dirname(__FILE__).'/Culqi/Transfers.php';
include_once dirname(__FILE__).'/Culqi/Cards.php';
include_once dirname(__FILE__).'/Culqi/Events.php';
include_once dirname(__FILE__).'/Culqi/Customers.php';
include_once dirname(__FILE__).'/Culqi/Tokens.php';
include_once dirname(__FILE__).'/Culqi/Charges.php';
include_once dirname(__FILE__).'/Culqi/Refunds.php';
include_once dirname(__FILE__).'/Culqi/Subscriptions.php';
include_once dirname(__FILE__).'/Culqi/Plans.php';
include_once dirname(__FILE__).'/Culqi/Iins.php';
include_once dirname(__FILE__).'/Culqi/Culqi.php';
