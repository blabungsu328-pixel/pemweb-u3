<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
        'image'
    ];

    // Penulis artikel
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Route model binding memakai slug, bukan id
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // URL gambar untuk semua halaman StudySpace
    protected function imageUrl(): Attribute
    {
        return Attribute::get(function () {

            // Jika gambar kosong, gunakan placeholder
            if (!$this->image) {
                return 'https://picsum.photos/seed/article-' . $this->id . '/800/400';
            }

            // Pertahankan gambar lama yang menggunakan URL eksternal
            if (filter_var($this->image, FILTER_VALIDATE_URL)) {
                return $this->image;
            }

            // Gambar hasil upload Laravel
            return Storage::url($this->image);
        });
    }
}