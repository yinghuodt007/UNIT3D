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
use Illuminate\Auth\AuthManager;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var AuthManager
     */
    private $auth;

    public function __construct(User $user, AuthManager $auth)
    {
        $this->user = $user;
        $this->auth = $auth;
    }

    public function members($group = null, $paginate = 50, $orderBy = 'created_at', $orderSort = 'DESC')
    {
        if ($group === null) {
            return $this->user->orderBy($orderBy, $orderSort)->paginate($paginate);
        }

        return $this->user->where('group_id', $group)->orderBy($orderBy, $orderSort)->paginate($paginate);

    }

    public function search($username, $paginate = 25)
    {
        $users = $this->user->where([
            ['username', 'like', '%' . $username . '%'],
        ])->paginate($paginate);

        return $users;
    }

    public function getAuthenticatedUser()
    {
        return $this->auth->user();
    }

    public function findOrFail($id)
    {
        return $this->user->findOrFail($id);
    }
}