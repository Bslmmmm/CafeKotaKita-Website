<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'caption',
        'image_url',
        'mood',
        'location',
        'shared_menu_id',
        'profile_image_url',
        'user_tag',
        'liked_by',
        'like_count',
        'comment_count',
        'retweet_count',
        'view_count',
    ];

    protected $casts = [
        'liked_by' => 'array',
        'like_count' => 'integer',
        'comment_count' => 'integer',
        'retweet_count' => 'integer',
        'view_count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $attributes = [
        'liked_by' => '[]',
        'like_count' => 0,
        'comment_count' => 0,
        'retweet_count' => 0,
        'view_count' => 0,
    ];

    /**
     * Get the timestamp attribute (alias for created_at)
     */
    protected function timestamp(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->created_at,
        );
    }

    /**
     * Check if post is liked by specific user
     */
    public function isLikedBy(string $userId): bool
    {
        return in_array($userId, $this->liked_by ?? []);
    }

    /**
     * Add like from user
     */
    public function addLike(string $userId): void
    {
        if (!$this->isLikedBy($userId)) {
            $likedBy = $this->liked_by ?? [];
            $likedBy[] = $userId;
            $this->liked_by = $likedBy;
            $this->like_count = count($likedBy);
            $this->save();
        }
    }

    /**
     * Remove like from user
     */
    public function removeLike(string $userId): void
    {
        if ($this->isLikedBy($userId)) {
            $likedBy = array_filter($this->liked_by ?? [], fn($id) => $id !== $userId);
            $this->liked_by = array_values($likedBy);
            $this->like_count = count($likedBy);
            $this->save();
        }
    }

    /**
     * Increment view count
     */
    public function incrementViewCount(): void
    {
        $this->increment('view_count');
    }

    /**
     * Increment comment count
     */
    public function incrementCommentCount(): void
    {
        $this->increment('comment_count');
    }

    /**
     * Decrement comment count
     */
    public function decrementCommentCount(): void
    {
        $this->decrement('comment_count');
    }

    /**
     * Increment retweet count
     */
    public function incrementRetweetCount(): void
    {
        $this->increment('retweet_count');
    }

    /**
     * Convert model to array format similar to Flutter's toMap()
     */
    public function toMap(): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'username' => $this->username,
            'caption' => $this->caption,
            'imageUrl' => $this->image_url,
            'mood' => $this->mood,
            'location' => $this->location,
            'sharedMenuId' => $this->shared_menu_id,
            'profileImageUrl' => $this->profile_image_url,
            'userTag' => $this->user_tag,
            'timestamp' => $this->created_at->toISOString(),
            'likedBy' => $this->liked_by ?? [],
            'likeCount' => $this->like_count,
            'commentCount' => $this->comment_count,
            'retweetCount' => $this->retweet_count,
            'viewCount' => $this->view_count,
        ];
    }

    /**
     * Scope to get posts ordered by latest
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Scope to get posts by specific user
     */
    public function scopeByUser($query, string $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope to get popular posts (by like count)
     */
    public function scopePopular($query)
    {
        return $query->orderBy('like_count', 'desc');
    }
}
