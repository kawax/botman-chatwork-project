<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
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
