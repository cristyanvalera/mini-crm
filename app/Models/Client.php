<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

/**
 * @property int $id
 * @property string $contact_name
 * @property string $contact_email
 * @property string $contact_phone_number
 * @property string $company_name
 * @property string $company_address
 * @property string $company_city
 * @property string $company_zip
 * @property string $company_vat
 */
class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'contact_name',
        'contact_email',
        'contact_phone_number',
        'company_name',
        'company_address',
        'company_city',
        'company_zip',
        'company_vat',
    ];
}
