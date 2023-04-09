<?php

use munkireport\models\MRModel as Eloquent;

class Bitdefender_model extends Eloquent
{
    protected $table = 'bitdefender';

    protected $hidden = ['id', 'serial_number'];

    protected $fillable = [
      'serial_number',
      'av_enabled',
      'product_version',
      'av_signature_version',
      'last_update',
      'error_num',

    ];
}
