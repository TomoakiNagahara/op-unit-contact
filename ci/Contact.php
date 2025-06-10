<?php
/** op-unit-contact:/ci/Contact.php
 *
 * @created     2023-01-30
 * @version     1.0
 * @package     op-unit-contact
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

/* @var $ci UNIT\CI\CI_Config */
$ci = OP::Unit('CI')::Config();

//	...
foreach( glob('Contact/*.php') as $file_path ){
	require_once($file_path);
}

//	...
return $ci->Get();
