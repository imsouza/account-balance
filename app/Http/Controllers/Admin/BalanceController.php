<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;

class BalanceController extends Controller
{
  public function index()
  {
  	$balance = auth()->user()->balance;

  	$amount = $balance ? $balance->amount : 0;

  	return view('admin.balance.index', compact('amount'));
  }


  public function deposit()
  {
  	return view('admin.balance.deposit');
  }


  public function depositStore(MoneyValidationFormRequest $request)
  {
  	$balance = auth()->user()->balance()->firstOrCreate([]);
    $response = $balance->deposit($request->value);

    if ($response['success'])
      return redirect()->route('admin.balance')->with('success', $response['message']);

    return redirect()->back()->with('danger', $response['message']);
  }


  public function withdraw()
  {
    return view('admin.balance.withdraw');
  }


  public function withdrawStore(MoneyValidationFormRequest $request)
  {
    $balance = auth()->user()->balance()->firstOrCreate([]);
    $response = $balance->withdraw($request->value);

    if ($response['success'])
      return redirect()->route('admin.balance')->with('success', $response['message']);

    return redirect()->back()->with('danger', $response['message']);
  }


  public function transfer()
  {
    return view('admin.balance.transfer');
  }


  public function confirmTransfer(Request $request, User $user)
  {
    if (!$sender = $user->getSender($request->sender))
      return redirect()->back()->with('danger', 'User not found.');

    if ($sender->id === auth()->user()->id)
      return redirect()->back()->with('danger', 'You cannot transfer to yourself.');

    $balance = auth()->user()->balance;

    return view('admin.balance.transfer-confirm', compact('sender', 'balance'));
  }


  public function transferStore(MoneyValidationFormRequest $request, User $user)
  {
    if (!$sender = $user->getSender($request->sender_id))
      return redirect()->route('balance.transfer')->with('success', 'Receiver not found.');

    $balance = auth()->user()->balance()->firstOrCreate([]);
    $response = $balance->transfer($request->value, $sender);

    if ($response['success'])
      return redirect()->route('admin.balance')->with('success', $response['message']);

    return redirect()->route('balance.transfer')->with('danger', $response['message']);
  }


  public function history()
  {
    $historys = auth()->user()->transactions()->with(['userSender'])->get();
    return view('admin.balance.history', compact('historys'));
  }
}
