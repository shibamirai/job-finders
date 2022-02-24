<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(JobFinder::class);
    }

    public function periodOfCreation(): Attribute
    {
        return new Attribute(
            get: function () {
                if ($this->creation_time) {
                    return ($this->creation_time >= 12 ? floor($this->creation_time / 12) . '年' : '') . $this->creation_time % 12 . 'ヶ月';
                } else {
                    return '制作期間不明';
                }
            }
        );
    }
}
