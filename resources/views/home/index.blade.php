@extends('home.layouts.master')
@section('content')

    <style>
        .nav-tabs {
            padding: 0 0 0 30vw;
        }
    </style>

    <div>
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
    </div>
    <div class="results">
        @if (Session::get('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
    </div>

    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-print-none">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#tabs-home-3" class="nav-link active"
                            data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-profile-3" class="nav-link"
                            data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-upload"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                                <path d="M9 15l3 -3l3 3" />
                                <path d="M12 12l0 9" />
                            </svg>
                            Deposit</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-withdraw-3" class="nav-link"
                            data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-download"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M19 18a3.5 3.5 0 0 0 0 -7h-1a5 4.5 0 0 0 -11 -2a4.6 4.4 0 0 0 -2.1 8.4" />
                                <path d="M12 13l0 9" />
                                <path d="M9 19l3 3l3 -3" />
                            </svg>
                            Withdraw</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-transfer-3" class="nav-link"
                            data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-transfer"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M20 10h-16l5.5 -6" />
                                <path d="M4 14h16l-5.5 6" />
                            </svg>
                            Transfer</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-statement-3" class="nav-link"
                            data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-invoice"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                <path d="M9 7l1 0" />
                                <path d="M9 13l6 0" />
                                <path d="M13 17l2 0" />
                            </svg>
                            Statement</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-logout-3" class="nav-link"
                            data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M9 12h12l-3 -3" />
                                <path d="M18 15l3 -3" />
                            </svg>
                            Log out</a>
                    </li>
                </ul>
            </div>
        </header>
        <header class="navbar-expand-md">


        </header>
        <div class="page-wrapper">
            <!-- Page header -->

            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="d-flex justify-content-center">

                        <div>
                            <div class="card" style="width: 650px;">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tabs-home-3">
                                            <h4>Welcome {{ $user->name }}</h4>
                                            <hr>
                                            <div style="display: flex;">
                                                <label> your id </label>
                                                <h4 style="margin-left: 90px;">{{ $user->email }}</h4>
                                            </div>
                                            <hr>
                                            <div style="display: flex;" class="mb-2">
                                                <label> your balance </label>
                                                <h4 style="margin-left: 52px;">₹ {{ $user->balance }}</h4>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs-profile-3">
                                            <h4>Deposit Money</h4>
                                            <div class="form-group">
                                                <form action="{{ route('deposit') }}" method="post">
                                                    @csrf
                                                    <div class="results">
                                                        @if (Session::get('fail'))
                                                            <div class="alert alert-danger">
                                                                {{ Session::get('fail') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <label>Amount</label> <br>
                                                    <input type="number" placeholder="enter amount to deposit"
                                                        class="form-control mt-2" name="amount">
                                                    <span class="text-danger">
                                                        @error('amount')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                    <button type="submit" class="btn btn-primary mt-3"
                                                        style="width: 100%;">Deposit</button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tabs-withdraw-3">
                                            <h4>Withdraw Money</h4>
                                            <div class="form-group">

                                                <form action="{{ route('withdraw') }}" method="post">
                                                    @csrf
                                                    <div class="results">
                                                        @if (Session::get('fail'))
                                                            <div class="alert alert-danger">
                                                                {{ Session::get('fail') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <label>Amount</label> <br>
                                                    <input type="number" placeholder="enter amount to withdraw"
                                                        class="form-control mt-2" name="amount">
                                                    <span class="text-danger">
                                                        @error('amount')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                    <button type="submit" class="btn btn-primary mt-3"
                                                        style="width: 100%;">Withdraw</button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tabs-transfer-3">
                                            <h4>Transfer Money</h4>
                                            <form action="{{ route('transfer') }}" method="post">
                                                @csrf
                                                <div class="results">
                                                    @if (Session::get('fail'))
                                                        <div class="alert alert-danger">
                                                            {{ Session::get('fail') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Email Address</label> <br>
                                                    <input type="email" placeholder="enter email"
                                                        class="form-control mt-2" name="email">
                                                    <span class="text-danger">
                                                        @error('email')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>

                                                </div>
                                                <div class="form-group mt-2">
                                                    <label>Amount</label> <br>
                                                    <input type="number" placeholder="enter amount to transfer"
                                                        class="form-control mt-2" name="amount">
                                                    <span class="text-danger">
                                                        @error('amount')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                    <button type="submit" class="btn btn-primary mt-3"
                                                        style="width: 100%;">Transfer</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tabs-statement-3">
                                            <h4>Statement of account</h4>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">DATETIME</th>
                                                        <th scope="col">TYPE</th>
                                                        <th scope="col">AMOUNT</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($statement as $s)
                                                        @php
                                                            $created_at = $s->created_at;
                                                            $datetime = new DateTime($created_at);
                                                            $date = $datetime->format('d-m-Y');
                                                            $time = $datetime->format('h:i:s A');
                                                            // $type = DB::table('transactions')
                                                            //     ->where('type', 'transfer')
                                                            //     ->get();
                                                        @endphp
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ $date }} - {{ $time }}</td>
                                                            <td>
                                                                @if ($s->type === 'transfer' && $s->transactions)
                                                                    {{ $s->transactions->email }}
                                                                @else
                                                                    {{ $s->type }}
                                                                @endif
                                                            </td>
                                                            {{-- <td>{{ $s->type }}</td> --}}
                                                            <td>₹ {{ $s->amount }}</td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <div class="card-body">
                                                <ul class="pagination">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                                        </a>
                                                    </li>


                                                    @for ($i = 1; $i <= $statement->lastPage(); $i++)
                                                        <li class="page-item {{ $i == $statement->currentPage() ? 'active' : '' }}">
                                                            <a class="page-link" href="{{ route('index', ['page' => $i]) }}">{{ $i }}</a>
                                                        </li>
                                                    @endfor

                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $statement->nextPageUrl() }}">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>


                                        </div>

                                        <div class="tab-pane" id="tabs-logout-3">
                                            <h4>Logout of your account</h4>
                                            <a href="{{ route('logout') }}"><button type="submit"
                                                    class="btn btn-primary mt-3"
                                                    style="width: 100%;">Logout</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
