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

	/** QQL
	 *
	 * @created    2025-06-10
	 * @return    \OP\IF_QQL
	 */
	static function QQL() : \OP\IF_QQL
	{
		/* @var $_qql \OP\IF_QQL */
		static $_qql = null;

		//	Instantiate the unit only once.
		if( $_qql === null ){
			$_qql = OP()->Unit('QQL');
			$file = 'Contact.sqlite3';
			$path = (OP()->Env()->isCI() ? 'ci/':'') . $file;
			$_qql->Open($path);
		}

		//	Return the IF_QQL.
		return $_qql;
	}

	/** Return login id number
	 *
	 * @created    2025-06-10
	 * @return     int         $id
	 */
	static function Id() : int
	{
		//	...
		$info = OP()->Unit('Login')->Info();

		//	...
		return $info['ai'] ?? 0;
	}

	/** Get message records.
	 *
	 * @created    2025-06-10
	 * @return     array       $records
	 */
	static function Load() : array
	{
		//	...
		$qql = self::QQL();
		$id  = self::Id();

		//	...
		if( OP()->Env()->isCI() ){
			$id = 1;
		}

		//	...
		$records = $qql->Get(" t_message.id = {$id} ",[],['limit'=>30]);

		//	...
		return $records;
	}

	/** Save message.
	 *
	 * @created    2025-06-10
	 * @return     bool
	 */
	static function Save() : bool
	{
		//	...
		$form = self::Form();
		$qql  = self::QQL();
		$id   = self::Id();

		//	...
		$message = $form->GetValue('message');

		//	...
		$set = [
			'id'        => $id,
			'message'   => $message,
			'created'   => OP()->Time(true),
			'timestamp' => OP()->Timestamp(false),
		];

		//	...
		$ai = $qql->Set(" t_message ", $set);

		//	...
		return $ai ? true: false;
	}
}
