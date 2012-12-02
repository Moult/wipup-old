<?php
/**
 * Eadrax application/classes/Factory/User/Dashboard.php
 *
 * @package   Context
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2012 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 * @link      http://wipup.org/
 */

defined('SYSPATH') OR die('No direct script access.');

use Eadrax\Core\Context;
use Eadrax\Core\Data;

/**
 * Dependency injection to load all related data, repositories, and 
 * vendor entities to prepare the Context for execution.
 *
 * @package Context
 */
class Factory_User_Dashboard extends Factory_Core
{
    /**
     * Loads the context
     *
     * @return Context_User_Dashboard
     */
    public function fetch()
    {
        return new Context\User\Dashboard(
            $this->data_user(),
            $this->entity_auth()
        );
    }

    /**
     * Data object for users
     *
     * @return Data\User
     */
    public function data_user()
    {
        return new Data\User;
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
}
