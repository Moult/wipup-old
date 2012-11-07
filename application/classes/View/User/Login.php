<?php
/**
 * Eadrax application/classes/View/User/Login.php
 *
 * @package   View
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2012 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 * @link      http://wipup.org/
 */

defined('SYSPATH') OR die('No direct script access.');

/**
 * View logic for user login form.
 *
 * @package View
 */
class View_User_Login extends View_Layout
{
    /**
     * Holds error information from login form
     * @var array
     */
    public $errors = array();

    /**
     * Converts multidimensional error array into one-dimensional array for 
     * easier display
     *
     * @return array
     */
    public function errors()
    {
        $errors = array();
        foreach ($this->errors as $error)
        {
            $errors[] = $error;
        }
        return $errors;
    }

}
