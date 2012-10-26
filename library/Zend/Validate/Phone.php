<?php

require_once 'Zend/Validate/Abstract.php';

/**
 * waliduje czy podany ciągjest numerem telefonu
 * opcjonalnie można wybrać, czy prefix kraju jest konieczny
 *
 */
require_once 'Zend/Validate/Abstract.php';

/**
 * waliduje czy podany ciągjest numerem telefonu
 * opcjonalnie można wybrać, czy prefix kraju jest konieczny
 *
 */
class Zend_Validate_Phone extends Zend_Validate_Abstract
{
    const NOT_TELEFON = 'notTelefon';

    protected $_messageTemplates = array(
       self::NOT_TELEFON    => "'%value%' nie jest numerem telefonu",
    );

    public function isValid($value,$isCountryPrefixRequired=true)
    {
        $this->_setValue($value);

        if( true == $isCountryPrefixRequired ){
            if( 1 === preg("#^\+{1}[0-9]{9,15}$#",$value) ){
                /**
                 * @todo chceck prefix with valid list
                 * @see http://www.itu.int/dms_pub/itu-t/opb/sp/T-SP-E.164D-2009-PDF-E.pdf
                 */
                return true;
            }
        }else{
            if( 1 === ereg("^\+{0,1}[0-9]{7,15}$",$value) ){
                return true;
            }
        }
        
        $this->_error(self::NOT_TELEFON);
        return false;
    }
}
