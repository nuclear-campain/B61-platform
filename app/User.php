<?php

namespace App;

use Illuminate\Database\Eloquent\{Builder, SoftDeletes};
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Cache;
use App\Repositories\UserRepository;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\{HasMedia, HasMediaTrait};

/**
 * Class User
 *
 * @package App
 */
class User extends UserRepository implements HasMedia
{
    use Notifiable, HasRoles, SoftDeletes, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'bio', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Method for checking that the user is authenticated or not.
     *
     * @return bool
     */
    public function isOnline(): bool
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    /**
     * Modify the user his upload image for the avatar. To meet the standards
     *
     * @param  null|Media The instance from the resource object.
     * @return void
     */
    public function registerMediaConversions(Media $media = null)
    {
        $user = auth()->user();
        $this->addMediaConversion('avatar')->width(32)->height(32)->nonQueued();
    }

    /**
     * Method for hashing the given password in the application storage.
     *
     * @param  string $password The given or generated password from the application/form
     * @return void
     */
    public function setPasswordAttribute(string $password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Scope for getting all the admin users out the storage.
     *
     * @param  Builder $query The query builder instance.
     * @return Builder
     */
    public function scopeAdminUsers(Builder $query): Builder
    {
        return $query->role('admin');
    }

    /**
     * Scope for only getting the deleted user out of the application.
     *
     * @param  Builder $query The query builder instance.
     * @return Builder
     */
    public function scopeDeletedUsers(Builder $query): Builder
    {
        return $query->onlyTrashed();
    }
}
