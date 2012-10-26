<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Validate
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */ 

/**
 * @see Zend_Validate_Abstract
 */
require_once 'Zend/Validate/Abstract.php'; 

/**
 * @category   Zend
 * @package    Zend_Validate
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Validate_Nip extends Zend_Validate_Abstract
{
    /**
     * Validation failure message key for when the value is not of valid length
     */
    const LENGTH   = 'numLength';

    /**
     * Validation failure message key for when the value fails the mod  checksum
     */
    const CHECKSUM = 'numChecksum';

     /**
     * Digits filter for input
     *
     * @var Zend_Filter_Digits
     */
    protected static $_filter = null;

    /**
     * @var array
     */
    protected $_messageTemplates = array(
        self::LENGTH   => "'%value%' must contain 10 digits",
        self::CHECKSUM => "Luhn algorithm (mod-11 checksum) failed on '%value%'"
    ); 

    /**
     * Defined by Zend_Validate_Interface
     *
     * Returns true if and only if $value contains a valid Eividencial namber message
     *
     * @param  string $value
     * @return boolean
     */
    public function isValid($value)
    {

        $this->_setValue($value);

        if (null === self::$_filter) {
            /**
             * @see Zend_Filter_Digits
             */
            require_once 'Zend/Filter/Digits.php';
            self::$_filter = new Zend_Filter_Digits();
        }

        $valueFiltered = self::$_filter->filter($value);

        $length = strlen($valueFiltered);

        if ($length != 10) {
            $this->_error(self::LENGTH);
            return false;
        }

        $mod = 11;
        $sum = 0;
        $weights = array (6, 5, 7, 2, 3, 4, 5, 6, 7);    

        preg_match_all("/\d/", $valueFiltered, $digits) ;

        $valueFilteredArray = $digits[0];        

        foreach ( $valueFilteredArray as $digit )
        {
            $weight = current($weights);
            $sum += $digit * $weight;
            next($weights);
        }

        if ( ( ($sum % $mod == 10) ? 0 : $sum % $mod) != $valueFilteredArray[$length - 1] )
        {
            $this->_error(self::CHECKSUM, $valueFiltered);
            return false;
        }

        return true;
    }
}