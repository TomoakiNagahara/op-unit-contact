<?php
/** op-unit-contact:/Contact.class.php
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
namespace OP\UNIT;

/** use
 *
 */
use OP\IF_UNIT;
use OP\OP_CORE;
use OP\OP_CI;
use OP\OP_TEMPLATE;

/** Contact
 *
 * @created     2023-01-30
 * @version     1.0
 * @package     op-unit-contact
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */
class Contact implements IF_UNIT
{
	/** Use
	 *
	 */
	use OP_CORE, OP_CI;
	use OP_TEMPLATE;
}
