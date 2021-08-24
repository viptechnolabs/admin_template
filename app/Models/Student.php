<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public const    GENDER = [
        'male' => 'Male',
        'female' => 'Female',
    ];

    public const  LANGUAGE = [
        'english' => 'English',
        'hindi' => 'Hindi',
    ];

    public const  OBTAIN_CLASS = [
        'o' => 'O',
        'a' => 'A',
        'b' => 'B',
        'c' => 'C',
        'fail' => 'Fail',
    ];

    public const STREAM = [
        'b.com' => 'B.Com',
        'm.com' => 'M.Com',
        'b.a' => 'B.A',
        'm.a' => 'M.A',
        'bca' => 'BCA',
        'mca' => 'MCA',
        'mba' => 'MBA',
    ];

    public function college(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(College::class, 'clg_id', 'id');
    }

//    public function university(): \Illuminate\Database\Eloquent\Relations\HasOne
//    {
//        return $this->hasOne(University::class, 'uni_id ', 'id');
//    }



}
