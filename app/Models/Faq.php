<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    //updated_atとcreated_atが不要のためfalseとする
    public $timestamps = false;

    //マスアサインメントされるものを指定している
    protected $fillable = [
        'question',
        'answer',
    ];

}
