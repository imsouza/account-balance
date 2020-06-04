<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
  public $timestemps = false;

  public function deposit(float $value)	:	Array
  {

    DB::beginTransaction();

    $totalBefore = $this->amount ? $this->amount : 0;
  	$this->amount += number_format($value, 2, '.', '');
  	$deposit = $this->save();

  	$history = auth()->user()->transactions()->create([
      'type'         => 'I', 
      'amount'       => $value, 
      'total_before' => $totalBefore, 
      'total_after'  => $this->amount, 
      'date'         => date('Ymd'),
    ]);

  	if ($deposit && $history) {
      DB::commit();

  		return [
  			'success' => true,
  			'message' => 'Deposit made successfully.'
  		];
    } else {
      DB::rollback();

      return [
        'success' => false,
        'message' => 'Failed to make the deposit.'
      ];
    }
  }


  public function withdraw(float $value) : Array
  {
    if ($this->amount < $value)
      return [
        'success' => false,
        'message' => 'Insufficient funds in the account.'
      ];

    if ($value <= 0)
      return [
        'success' => false,
        'message' => 'Please, enter a value other than 0.'
      ];

    DB::beginTransaction();

    $totalBefore = $this->amount ? $this->amount : 0;
    $this->amount -= number_format($value, 2, '.', '');
    $withdraw = $this->save();

    $history = auth()->user()->transactions()->create([
      'type'         => 'O', 
      'amount'       => $value, 
      'total_before' => $totalBefore, 
      'total_after'  => $this->amount, 
      'date'         => date('Ymd'),
    ]);

    if ($withdraw && $history) {
      DB::commit();

      return [
        'success' => true,
        'message' => 'Withdraw made successfully.'
      ];
    } else {
      DB::rollback();

      return [
        'success' => false,
        'message' => 'Failed to make the withdraw.'
      ];
    }
  }
}