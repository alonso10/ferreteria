<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'client';
    public $incrementing = false;
    protected $keyType = 'string';

    public function usesTimestamps(): bool{
        return false;
    }

    protected $fillable = [
        'id',
        'first_name',
        'second_name',
        'surname',
        'second_surname',
        'email',
        'department',
        'city',
        'address',
        'phone',
        'job',
        'identification',
        'identification_type'
    ];
}
