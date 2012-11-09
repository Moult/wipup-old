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
use Eadrax\Eadrax\Context;
use Eadrax\Eadrax\Data;

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
        return new Context_Project_Add(
            $this->data_user(),
            $this->role_user(),
            $this->data_project(),
            $this->role_proposal(),
            $this->repository(),
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
     * Loads the user role
     *
     * @return Context\Project\Add\User
     */
    public function role_user()
    {
        return new Context\Project\Add\User;
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
     * Loads the proposal role
     *
     * @return Context\Project\Add\Proposal
     */
    public function role_proposal()
    {
        return new Context\Project\Add\Proposal;
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
}
