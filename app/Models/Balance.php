<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
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


  public function transfer(float $value, User $sender) : Array
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

    /* Sender */
    $totalBefore = $this->amount ? $this->amount : 0;
    $this->amount -= number_format($value, 2, '.', '');
    $transfer = $this->save();

    $history = auth()->user()->transactions()->create([
      'type'                => 'T', 
      'amount'              => $value, 
      'total_before'        => $totalBefore, 
      'total_after'         => $this->amount, 
      'date'                => date('Ymd'),
      'user_id_transaction' => $sender->id,
    ]);


    /* Receiver */
    $senderBalance = $sender->balance()->firstOrCreate([]);
    $totalBeforeSender = $senderBalance->amount ? $senderBalance->amount : 0;
    $senderBalance->amount += number_format($value, 2, '.', '');
    $transferSender = $senderBalance->save();

    $historySender = $sender->transactions()->create([
      'type'                => 'I', 
      'amount'              => $value, 
      'total_before'        => $totalBeforeSender, 
      'total_after'         => $senderBalance->amount, 
      'date'                => date('Ymd'),
      'user_id_transaction' => auth()->user()->id,
    ]);

    if ($transfer && $history && $transferSender && $historySender) {
      DB::commit();

      return [
        'success' => true,
        'message' => 'Transfer made successfully.'
      ];
    } else {
        DB::rollback();

        return [
          'success' => false,
          'message' => 'Failed to make the transer.'
        ];
    }
  }

  
}
