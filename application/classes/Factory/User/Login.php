<?php
/**
 * Eadrax application/classes/Factory/User/Login.php
 *
 * @package   Context
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2012 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 * @link      http://wipup.org/
 */

defined('SYSPATH') OR die('No direct script access.');
use Eadrax\Eadrax\Context;
use Eadrax\Eadrax\Data;

/**
 * Dependency injection to load all related data, repositories, and 
 * vendor entities to prepare the Context for execution.
 *
 * @package Context
 */
class Factory_User_Login extends Factory_Core
{
    /**
     * Loads the context
     *
     * @return Context_User_Login
     */
    public function fetch()
    {
        return new Context\User\Login(
            $this->data_user(),
            $this->role_guest(),
            $this->repository(),
            $this->entity_auth(),
            $this->entity_validation()
        );
    }

    /**
     * Data object for users
     *
     * @return Data_User
     */
    public function data_user()
    {
        return new Data\User(array(
            'username' => $this->get_data('username'),
            'password' => $this->get_data('password'),
            'email' => $this->get_data('email')
        ));
    }

    /**
     * Loads guest role
     *
     * @return Context\User\Login\Guest
     */
    public function role_guest()
    {
        return new Context\User\Login\Guest;
    }

    /**
     * Loads repository
     *
     * @return Eadrax\Repository\User\Login
     */
    public function repository()
    {
        return new Eadrax\Repository\User\Login;
    }

    /**
     * This is a Kohana module.
     *
     * @return Auth
     */
    public function entity_auth()
    {
        return Auth::instance();
    }

    /**
     * Load validation driver.
     *
     * @return Driver_Validation
     */
    public function entity_validation()
    {
        return new Driver_Validation;
    }
}
