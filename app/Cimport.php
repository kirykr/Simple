<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cimport extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
    												'importdate',
    												'importindate',
    												'invoicenum',
    												'totalamount',
    												'user_id',
    												'supplier_id'

  											];		
}
