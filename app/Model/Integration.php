<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Integration extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'service',
        'recipient',
        'api_token',
    ];

    /**
     * @return string
     */
    public function getWebhookUrlAttribute()
    {
        return route($this->service, ['uuid' => $this->uuid]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
