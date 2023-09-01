<?php

namespace App\Models;

use App\Traits\LogsActivityTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use HasTags;
    use InteractsWithMedia;
    use LogsActivityTrait;

    protected $connection = 'main';

    /**
     * fillable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    /**
     * User
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 檔案
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')
            // 沒有圖片回傳預設圖片網址/路徑
            ->useFallbackUrl('/images/fallback.jpg')
            ->useFallbackUrl('/images/fallback.jpg', 'thumb')
            // 沒有圖片回傳預設圖片路徑
            // ->useFallbackPath(public_path('/images/fallback.jpg'))
            // ->useFallbackPath(public_path('/images/fallback.jpg'), 'thumb')
            // 類型
            ->acceptsMimeTypes(['image/jpeg', 'image/png'])
            // 單一檔案
            ->singleFile();
    }

    /**
     * 圖片轉換,縮圖
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(320)
            ->height(160)
            ->performOnCollections('cover');
    }
}
