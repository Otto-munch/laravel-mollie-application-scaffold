<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Order\Contracts\ProvidesInvoiceInformation;

class User extends Authenticatable implements ProvidesInvoiceInformation
{
    use HasFactory, Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      /**
    * Get the receiver information for the invoice.
    * Typically includes the name and some sort of (E-mail/physical) address.
    *
    * @return array An array of strings
    */
    public function getInvoiceInformation()
    {
        return [$this->name, $this->email];
    }

    /**
    * Get additional information to be displayed on the invoice. Typically a note provided by the customer.
    *
    * @return string|null
    */
    public function getExtraBillingInformation()
    {
        return null;
    }
}
