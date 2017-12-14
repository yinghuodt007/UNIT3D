<?php
/**
 * NOTICE OF LICENSE
 *
 * UNIT3D is open-sourced software licensed under the GNU General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D
 * @license    https://choosealicense.com/licenses/gpl-3.0/  GNU General Public License v3.0
 * @author     BluCrew
 */

namespace App\Contracts;

interface UserRepositoryInterface
{
    public function members($orderBy = 'created_at', $orderSort = 'DESC', $paginate = 50);

    public function search($username, $paginate = 25);

    public function getAuthenticatedUser();

    public function findOrFail($id);

}