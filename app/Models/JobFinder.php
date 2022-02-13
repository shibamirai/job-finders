<?php

namespace App\Models;

use App\Enums\EmploymentPattern;
use App\Enums\Gender;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobFinder extends Model
{
    use HasFactory;

    protected $guarded = [];

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
                    ->orWhere('skills', 'like', '%' . $search . '%')
            )
        );
    }

    public function getGenderStrAttribute()
    {
        return Gender::getDescription($this->gender);
    }

    public function getPeriodOfUseAttribute()
    {
        $diff = date_diff(
            new DateTime($this->use_from),
            new DateTime($this->hired_at)
        );
        return ($diff->y > 0 ? $diff->y .'年' : '') . $diff->m . 'ヶ月';
    }

    public function getEmploymentPatternStrAttribute()
    {
        return EmploymentPattern::getDescription($this->employment_pattern);
    }
}
