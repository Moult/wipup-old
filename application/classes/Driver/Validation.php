<?php
/**
 * Eadrax application/classes/Driver/Validation.php
 *
 * @package   Driver
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2012 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 * @link      http://wipup.org/
 */

defined('SYSPATH') OR die('No direct script access.');

/**
 * This is a driver for KO's built in validation.
 *
 * @package    Driver
 * @subpackage Validation
 */
class Driver_Validation implements Eadrax\Eadrax\Entity\Validation
{
    private $instance;

    public function setup(array $input_data)
    {
        $this->instance = Validation::factory($input_data);
    }

    public function rule($key, $rule, $arg = NULL)
    {
        if ($arg !== NULL)
        {
            $this->instance->rule($key, $rule, array(':value', $arg));
        }
        else
        {
            $this->instance->rule($key, $rule);
        }
    }

    public function callback($key, array $function, array $args)
    {
        array_unshift($args, ':value');
        $this->instance->rule($key, $function, $args);
    }

    public function check()
    {
        return $this->instance->check();
    }

    public function errors()
    {
        return $this->instance->errors();
    }
}
