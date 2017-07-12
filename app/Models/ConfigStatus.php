<?php
/**
 * GitScrum v0.1.
 *
 * @author  Renato Marinho <renato.marinho@s2move.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPLv3
 */

namespace GitScrum\Models;

use GitScrum\Scopes\ConfigStatusScope;
use Illuminate\Database\Eloquent\Model;

class ConfigStatus extends Model
{
    use ConfigStatusScope;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'config_statuses';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'name', 'description', 'position'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(\GitScrum\Models\User::class, 'statuses', 'id', 'user_id');
    }

    public function status()
    {
        //return $this->hasOne(\GitScrum\Models\Status::class, 'id', 'id');
    }

    public function issue()
    {
        return $this->belongsTo(\GitScrum\Models\Issue::class, 'config_status_id', 'id');
    }
}
