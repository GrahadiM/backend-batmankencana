@extends('layouts.fe.index')

@section('content')

    <!-- PROFILE -->
    <div class="container">
        <!-- PROFILE -->
        <div class="card mb-4">
            <form class="card-body row" action="{{ route('fe.profileUpdate') }}" method="POST">
                @csrf
                <h3 class="col-12 card-title text-center mb-4">Manage Profile</h3>
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="User">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Email Address">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">WhatApp</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}" placeholder="WhatApp">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="dob1" class="form-label">Tanggal Lahir</label>
                    <!-- <input type="number" max="31" class="form-control" id="dob1" placeholder="Tanggal Lahir"> -->
                    <select name="dob1" class="form-select" aria-label="Default select example">
                        @if (!empty(Auth::user()->dob1))
                            <option value="{{ Auth::user()->dob1 }}">{{ Auth::user()->dob1 }}</option>
                        @else
                            <option selected disabled>Pilih Tanggal</option>
                        @endif
                        @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="dob2" class="form-label">Bulan Lahir</label>
                    <!-- <input type="number" max="12" class="form-control" id="dob2" placeholder="Bulan Lahir"> -->
                    <select name="dob2" class="form-select" aria-label="Default select example">
                        @if (!empty(Auth::user()->dob2))
                            <option value="{{ Auth::user()->dob2 }}">{{ Auth::user()->dob2 }}</option>
                        @else
                            <option selected disabled>Pilih Bulan</option>
                        @endif
                        @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="dob3" class="form-label">Tahun Lahir</label>
                    {{-- <input name="dob3" type="text" size="4" maxlength="4" max="2023" onKeyPress="return goodchars(event,'0123456789',this)" class="form-control" id="dob3" value="{{ Auth::user()->dob3 }}" placeholder="Tahun Lahir"> --}}
                    <select name="dob3" class="form-select" aria-label="Default select example">
                        @if (!empty(Auth::user()->dob3))
                            <option value="{{ Auth::user()->dob3 }}">{{ Auth::user()->dob3 }}</option>
                        @else
                            <option selected disabled>Pilih Tahun</option>
                        @endif
                        @for ($i=date('Y'); $i>=date('Y')-100; $i-=1){
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-end mt-4 mb-3">
                    <button class="btn btn-sm btn-outline-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        LOGOUT
                    </button>
                </div>
                <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-start mt-4 mb-3">
                    <button class="btn btn-sm btn-outline-primary" type="submit">SAVE DATA</button>
                </div>
            </form>
        </div>
        <!-- PROFILE -->
        <!-- PASSWORD -->
        <div class="card mb-4">
            <form class="card-body row" action="{{ route('fe.profilePassword') }}" method="POST">
                @csrf
                <h3 class="col-12 card-title text-center mb-4">Manage Password</h3>
                <div class="col-md-4 mb-3">
                    <label for="password" class="form-label">Password Lama</label>
                    <input type="password" class="form-control" name="current_password" id="password" placeholder="Password" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="password" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Konfirmasi Password" required>
                </div>
                <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-end mt-4 mb-3">
                    {{-- <button class="btn btn-sm btn-outline-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        LOGOUT
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form> --}}
                </div>
                <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-start mt-4 mb-3">
                    <button class="btn btn-sm btn-outline-primary" type="submit">SAVE DATA</button>
                </div>
            </form>
        </div>
        <!-- PASSWORD -->
        <!-- LOGOUT -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <!-- LOGOUT -->
    </div>
    <!-- PROFILE -->

@endsection
