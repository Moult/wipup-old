<?php
/**
 * Eadrax features/bootstrap/repository.php
 *
 * @package   Features
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2012 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 * @link      http://wipup.org/
 */

/**
 * Handles MySQL interactions
 *
 * @package    Features
 * @subpackage Repository
 */
class Repository {
    /**
     * Inserts a new row into the users table.
     *
     * @param array $data An array with keys for username, password, and email
     * @return void
     */
    public function insert_user($data)
    {
        $password_hash = Auth::instance()->hash($data['password']);
        $query = DB::insert('users', array(
            'username',
            'password',
            'email'
        ))->values(array(
            $data['username'],
            $password_hash,
            $data['email']
        ));
        $query->execute();
    }
}
