<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;
use App\User;

class Transaction extends Model
{
  protected $fillable = ['type', 'amount', 'total_before', 'total_after', 'user_id_transaction', 'date'];

  public function type($type = null)
  {
  	$types = [
  		'I' => 'Deposit',
  		'O' => 'Withdraw',
  		'T' => 'Transfer'
  	];

  	if (!$type)
  		return $types;

  	if($this->user_id_transaction != null && $type == 'I')
  		return 'Received';

  	return $types[$type];
  }


  public function scopeUserAuth($query)
  {
    return $query->where('user_id', auth()->user()->id);
  }


  public function user()
  {
  	return $this->belongsTo(User::class);
  }


  public function userSender()
  {
  	return $this->belongsTo(User::class, 'user_id_transaction');
  }


  public function getDateAttribute($value)
  {
  	return Carbon::parse($value)->format('m/d/Y');
  }


  public function filter(Array $data, $totalPage)
  {
    return $this->where(function ($query) use ($data) {
      if (isset($data['id']))
        $query->where('id', $data['id']);

      if (isset($data['date']))
        $query->where('date', $data['date']);

      if (isset($data['type']))
        $query->where('type', $data['type']);
    })->userAuth()->with(['userSender'])->paginate($totalPage);

    return $historys;
  }
}
