<?php
/**
 * Eadrax application/classes/Factory/User/Logout.php
 *
 * @package   Context
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2012 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 * @link      http://wipup.org/
 */

defined('SYSPATH') OR die('No direct script access.');
use Eadrax\Eadrax\Context;

/**
 * Dependency injection to load all related data models, repositories, and 
 * vendor entities to prepare the Context for execution.
 *
 * @package Context
 */
class Factory_User_Logout extends Factory_Core
{
    /**
     * Loads the context
     *
     * @return Context_User_Logout
     */
    public function fetch()
    {
        return new Context\User\Logout(
            $this->entity_auth()
        );
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
