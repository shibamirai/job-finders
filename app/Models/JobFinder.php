<?php

namespace App\Models;

use App\Enums\EmploymentPattern;
use App\Enums\Gender;
use App\Enums\Handicap;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobFinder extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'gender' => Gender::class,
        'handicap' => Handicap::class,
        'employment_pattern' => EmploymentPattern::class,
    ];

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(fn ($query) =>
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('occupation', 'like', '%' . $search . '%')
            )
        );
    }

    public function periodOfUse(): Attribute
    {
        return new Attribute(
            get: function () {
                $diff = date_diff(
                    new DateTime($this->use_from),
                    new DateTime($this->hired_at)
                );
                return ($diff->y > 0 ? $diff->y .'年' : '') . $diff->m . 'ヶ月';
            }
        );
    }
}
