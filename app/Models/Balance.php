<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
  public $timestemps = false;

  public function deposit(float $value)	:	Array
  {
  	$this->amount += number_format($value, 2, '.', '');
  	$deposit = $this->save();
  	
  	if ($deposit)
  		return [
  			'success' => true,
  			'message' => 'Deposit made successfully.'
  		];

  	return [
  		'success' => false,
  		'message' => 'Failed to make the deposit.'
  	];
  }
}
