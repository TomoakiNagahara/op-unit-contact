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

	/** Automatically
	 *
	 * @created    2025-06-10
	 * @param      string      $file_path
	 */
	static function Auto( string $file_path='form.phtml' )
	{
		//	...
		$form = self::Form();

		//	...
		if( $form->isValidate() ){
			//	...
			$io = Self::Save();

			//	...
			if( $io ){
				$form->Clear();
			}
		}

		//	...
		$records = Self::Load();

		//	...
		self::Template($file_path, ['form'=>$form, 'records'=>$records]);
	}

	/** Form
	 *
	 * @created    2025-06-10
	 * @return    \OP\IF_FORM
	 */
	static function Form() : \OP\IF_FORM
	{
		/* @var $_form \OP\IF_FORM */
		static $_form = null;

		//	Instantiate the form only once.
		if( $_form === null ){
			$_form = OP()->Unit()->Instantiate('Form');
			$_form -> Config(__DIR__.'/form/contact.php');
		}

		//	Return the IF_FORM.
		return $_form;
	}
}
