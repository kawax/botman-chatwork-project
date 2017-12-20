<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Integration;
use Illuminate\Auth\Access\HandlesAuthorization;

class IntegrationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the integration.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Integration  $integration
     * @return mixed
     */
    public function update(User $user, Integration $integration)
    {
        return $user->id === $integration->user_id;
    }

    /**
     * Determine whether the user can delete the integration.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Integration  $integration
     * @return mixed
     */
    public function delete(User $user, Integration $integration)
    {
        return $user->id === $integration->user_id;
    }
}
