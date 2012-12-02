<?php
/**
 * Eadrax application/classes/Factory/Project/Add.php
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
class Factory_Project_Add extends Factory_Core
{
    /**
     * Loads the context
     *
     * @return Context_Project_Add
     */
    public function fetch()
    {
        return new Context\Project\Add(
            $this->data_user(),
            $this->data_project(),
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
        return new Data\User;
    }

    /**
     * Data object for projects
     *
     * @return Data\Project
     */
    public function data_project()
    {
        return new Data\Project(array(
            'name' => $this->get_data('name'),
            'summary' => $this->get_data('summary')
        ));
    }

    /**
     * Loads the repository for this context
     *
     * @return Eadrax\Repository\Project\Add
     */
    public function repository()
    {
        return new Eadrax\Repository\Project\Add;
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
