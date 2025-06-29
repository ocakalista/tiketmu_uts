<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'image',
        'gallery',
        'category_id',
        'organizer',
        'venue',
        'address',
        'event_date',
        'event_time',
        'price',
        'max_participants',
        'current_participants',
        'status',
        'rating',
        'featured',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'event_date' => 'date',
        'event_time' => 'datetime',
        'gallery' => 'array',
        'price' => 'decimal:2',
        'rating' => 'decimal:1',
        'featured' => 'boolean'
    ];

    protected $dates = [
        'event_date',
        'event_time',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Scope Methods (ini yang diperlukan untuk mengatasi error)
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', Carbon::today());
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeAvailable($query)
    {
        return $query->whereRaw('current_participants < max_participants')
                    ->orWhereNull('max_participants');
    }

    public function scopePast($query)
    {
        return $query->where('event_date', '<', Carbon::today());
    }

    public function scopeToday($query)
    {
        return $query->whereDate('event_date', Carbon::today());
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('event_date', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ]);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('event_date', Carbon::now()->month)
                    ->whereYear('event_date', Carbon::now()->year);
    }

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Accessor Methods
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getFormattedDateAttribute()
    {
        return $this->event_date->format('d F Y');
    }

    public function getFormattedTimeAttribute()
    {
        return $this->event_time->format('H:i') . ' WIB';
    }

    public function getIsUpcomingAttribute()
    {
        return $this->event_date >= Carbon::today();
    }

    public function getIsPastAttribute()
    {
        return $this->event_date < Carbon::today();
    }

    public function getIsTodayAttribute()
    {
        return $this->event_date->isToday();
    }

    public function getAvailableSpotsAttribute()
    {
        if ($this->max_participants) {
            return $this->max_participants - $this->current_participants;
        }
        return null; // Unlimited spots
    }

    public function getIsFullAttribute()
    {
        if ($this->max_participants) {
            return $this->current_participants >= $this->max_participants;
        }
        return false;
    }

    public function getCapacityPercentageAttribute()
    {
        if ($this->max_participants && $this->max_participants > 0) {
            return round(($this->current_participants / $this->max_participants) * 100, 1);
        }
        return 0;
    }

    // Mutator Methods
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = \Str::slug($value);
        }
    }

    // Helper Methods
    public function incrementParticipants($count = 1)
    {
        $this->increment('current_participants', $count);
    }

    public function decrementParticipants($count = 1)
    {
        $this->decrement('current_participants', $count);
    }

    public function updateRating()
    {
        $averageRating = $this->reviews()->avg('rating');
        $this->update(['rating' => $averageRating ?? 0]);
    }

    // Static Methods
    public static function getFeaturedEvents($limit = 6)
    {
        return static::published()
                    ->upcoming()
                    ->featured()
                    ->limit($limit)
                    ->get();
    }

    public static function getUpcomingEvents($limit = 12)
    {
        return static::published()
                    ->upcoming()
                    ->orderBy('event_date', 'asc')
                    ->limit($limit)
                    ->get();
    }

    public static function getEventsByCategory($categoryId, $limit = 10)
    {
        return static::published()
                    ->upcoming()
                    ->byCategory($categoryId)
                    ->limit($limit)
                    ->get();
    }
}