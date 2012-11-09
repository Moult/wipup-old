<?php
/**
 * Eadrax application/classes/Factory/User/Register.php
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
class Factory_User_Register extends Factory_Core
{
    /**
     * Loads the context
     *
     * @return Context\User\Register
     */
    public function fetch()
    {
        return new Context\User\Register(
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
     * @return Data\User
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
     * Loads the guest role
     *
     * @return Context\User\Register\Guest
     */
    public function role_guest()
    {
        return new Context\User\Register\Guest;
    }

    /**
     * Loads the repository for this context
     *
     * @return Eadrax\Repository\User\Register
     */
    public function repository()
    {
        return new Eadrax\Repository\User\Register;
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
     * Loads validation driver.
     *
     * @return Driver_Validation
     */
    public function entity_validation()
    {
        return new Driver_Validation;
    }
}
