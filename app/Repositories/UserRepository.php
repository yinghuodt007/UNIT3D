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

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function members($orderBy = 'created_at', $orderSort = 'DESC', $paginate = 50)
    {
        return $this->user->orderBy($orderBy, $orderSort)->paginate($paginate);
    }

    public function search($username, $paginate = 25)
    {
        $users = $this->user->where([
            ['username', 'like', '%' . $username . '%'],
        ])->paginate($paginate);

        $users->setPath('?username=' . $username);

        return $users;
    }
}