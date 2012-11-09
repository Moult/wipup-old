<?php
/**
 * Eadrax application/classes/View/Layout.php
 *
 * @package   View
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2012 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 * @link      http://wipup.org/
 */

defined('SYSPATH') OR die('No direct script access.');

/**
 * Sets up partials, essentially a core file for KOstache.
 *
 * @package View
 */
abstract class View_Layout
{
    /**
     * Base url of website.
     * @var string
     */
    public $baseurl;

    /**
     * Sets up useful sitewide variables.
     *
     * @return void
     */
    public function __construct()
    {
        $this->baseurl = URL::base();
    }

    /**
     * Retrieves the error messaged based on an array
     *
     * @param string $key   The field name
     * @param string $value The validation check it failed
     * @return string
     */
    public function get_error_message($key, $value)
    {
        $error_messages = array(
            'username' => array(
                'is_existing_account' => 'No account with those user details exist.',
                'not_empty' => 'Your username is required.',
                'regex' => 'Your username contains illegal characters.',
                'min_length' => 'Your username should be more than 4 characters.',
                'max_length' => 'Your username should be less than 15 characters.',
                'is_unique_username' => 'An account with that username has already been registered in our system. Please pick enother.'
            ),
            'password' => array(
                'not_empty' => 'Your password is required.',
                'min_length' => 'Your password should be more than 6 characters.'
            ),
            'email' => array(
                'not_empty' => 'Your email is required.',
                'email' => 'Your email is not a real email.'
            ),
            'name' => array(
                'not_empty' => 'A name is required.'
            ),
            'summary' => array(
                'not_empty' => 'A summary is required.'
            )
        );

        return $error_messages[$key][$value];
    }
}
