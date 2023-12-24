<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $user=auth()->user();
        $statement=$user->transactions()->latest()->paginate(5);
        $statement->each(function($transaction){
            if ($transaction->type === 'transfer') {
                $recipient_email = $transaction->transactions->email ??'N/A';
                $transaction->email = $recipient_email ;
            }
        });
        // dd($statement);
        return view('home.index',compact('user','statement'));
    }
    public function signup(){
        return view('home.register');
    }
    public function signin(){
        return view('home.login');
    }


    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'balance' => '0'
        ]);

        if ($user) {
            return redirect()->route('signin')->with('success','success');
        } else {
            return back()->with('fail', 'something went wrong');
        }
    }

    public function login(Request $req)
    {

        $req->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if (auth()->attempt([
            'email' => $req->email,
            'password' => $req->password,
        ])) {
            return redirect()->route('index')->with('success','login success');
        } else {
            return back()->with('fail', 'You have to Signup');
        }
    }


    public function deposit(Request $req){
        $user=auth()->user();

        $req->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        $user->balance += $req->amount;
        $user->save();

        Transactions::create([
            'user_id' => $user->id,
            'type' => 'deposit',
            'amount' => $req->amount
        ]);
        return redirect(route('index'))->with('success','Successfully deposited the amount');
    }

    public function withdraw(Request $req)
{
    $user = auth()->user();

    $req->validate([
        'amount' => 'required|numeric|min:0.01',
    ]);

    if ($user->balance < $req->amount) {
        return redirect(route('index'))->with('error', 'Insufficient balance');
    }

    $user->balance -= $req->amount;
    $user->save();

    Transactions::create([
        'user_id' => $user->id,
        'type' => 'withdraw',
        'amount' => $req->amount
    ]);
    return redirect(route('index'))->with('success', 'Successfully withdrew the amount');
}


    public function transfer(Request $req){
        $user=auth()->user();

        $req->validate([
            'email' => 'required|email|exists:users,email',
            'amount' => 'required|numeric|min:0.01|max:'.$user->balance,
        ]);

        if ($user->email == $req->email) {
            return redirect(route('index'))->with('error', 'Cannot transfer to yourself');
        }

        $recipient=User::where('email',$req->email)->first();
        $user->balance -= $req->amount;
        $user->save();


        $recipient->balance += $req->amount;
        $recipient->save();

        Transactions::create([
            'user_id' => $user->id,
            'recepient_id' => $recipient->id,
            'type' => 'transfer',
            'amount' => $req->amount
        ]);
        return redirect(route('index'))->with('success','transfer successfull');
    }


    public function logout()
    {
        auth()->logout();
        return redirect()->route('signin');
    }


}
