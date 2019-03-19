<?php

namespace App;

use App\User;
use App\Course;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Teacher
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teacher query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property string|null $biography
 * @property string|null $website_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teacher whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teacher whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teacher whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teacher whereWebsiteUrl($value)
 */
class Teacher extends Model {

    /**
     * Get del usuario al que pertenece el profesor (Relación 1 a 1)
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get de los cursos que pertenecen a un profesor (Relación 1 a muchos)
     */
    public function courses() {
        return $this->hasMany(Course::class);
    }
}
