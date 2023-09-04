<?php

namespace App\Models;

use App\Traits\LogsActivityTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use LogsActivityTrait;

    protected $connection = 'main';

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'provider',
        'provider_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 多筆貼文
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * 檔案
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            // 類型
            ->acceptsMimeTypes(['image/jpeg'])
            // 單一檔案
            ->singleFile();
    }

    /**
     * 圖片轉換,縮圖
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(120)
            ->height(120)
            ->performOnCollections('avatar');
    }
}
