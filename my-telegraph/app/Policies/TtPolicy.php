<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\TelegraphText;

class TtPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Проверка права на редактирование
     *
     * @param User $user
     * @param TelegraphText $tt
     * @return boolean
     */
    public function update(User $user, TelegraphText $tt): bool
    {
        return $tt->user_id === $user->id;
    }

    /**
     * Проверка права на удаление
     *
     * @param User $user
     * @param TelegraphText $tt
     * @return boolean
     */
    public function destroy(User $user, TelegraphText $tt): bool
    {
        return $this->update($user, $tt);
    }
}
