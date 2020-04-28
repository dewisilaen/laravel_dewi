Dokumen Script
1.	Script welcome.blade.php

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dewi Silaen</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Dewi Silaen
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Blog Dewi On Github</a>
                    <a href="https://github.com/dewisilaen/laravel_dewi.git">Script di Github</a>
                    <a href="https://localhost:8000/dewis">Create Page</a>
                    <a href="https://localhost:8000/dewis">Read Page</a>
                    <a href="https://localhost:8000/dewis">Edit Page</a>
                    <a href="https://localhost:8000/dewis">Delete Page</a>
                    <a href="https://github.com/laravel/laravel">About Dewi</a>
                </div>
            </div>
        </div>
    </body>
</html>

2.	Script base.blade.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dewi - Halaman Create</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
</head>
<body>

<div class="container">
@yield('main')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
3.	Script index.blade.php
<div>
    <a style="margin: 19px;" href="{{ route('dewis.create')}}" class="btn btn-primary">New Contact</a>
</div> 

@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Contacts</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nama</td>
          <td>NPM</td>
          <td>Kelas</td>
          <td>Alamat</td>
          <td>No Hp</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($dewis as $dewi)
        <tr>
            <td>{{$dewi->id}}</td>
            <td>{{$dewi->nama}}</td>
            <td>{{$dewi->npm}}</td>
            <td>{{$dewi->kelas}}</td>
            <td>{{$dewi->alamat}}</td>
            <td>{{$dewi->nohp}}</td>
            <td>
                <a href="{{ route('dewis.edit',$dewi->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('dewis.destroy', $dewi->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection

<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>


4.	Script edit.blade.php
@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Contact</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('dewis.update', $dewi->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" value={{ $dewi->nama }} />
            </div>

            <div class="form-group">
                <label for="npm">NPM:</label>
                <input type="text" class="form-control" name="npm" value={{ $dewi->npm }} />
            </div>
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <input type="text" class="form-control" name="kelas" value={{ $dewi->kelas }} />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" name="alamat" value={{ $dewi->alamat }} />
            </div>
            <div class="form-group">
                <label for="nohp">Nomor HP:</label>
                <input type="text" class="form-control" name="nohp" value={{ $dewi->nohp }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection

5.	Script create.blade.php
@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Contact</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('dewis.update', $dewi->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" value={{ $dewi->nama }} />
            </div>

            <div class="form-group">
                <label for="npm">NPM:</label>
                <input type="text" class="form-control" name="npm" value={{ $dewi->npm }} />
            </div>
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <input type="text" class="form-control" name="kelas" value={{ $dewi->kelas }} />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" name="alamat" value={{ $dewi->alamat }} />
            </div>
            <div class="form-group">
                <label for="nohp">Nomor HP:</label>
                <input type="text" class="form-control" name="nohp" value={{ $dewi->nohp }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection

6.	Script DewiController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dewi;

class DewiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dewis = Dewi::all();

        return view('dewis.index', compact('dewis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dewis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama'=>'required',
            'npm'=>'required'
        ]);
        $dewi = new Dewi([
            'nama' => $request->get('nama'),
            'npm' => $request->get('npm'),
            'kelas' => $request->get('kelas'),
            'alamat' => $request->get('alamat'),
            'nohp' => $request->get('nohp')
        ]);
        $dewi->save();
        return redirect('/dewis')->with('success', 'Dewi saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dewi = Dewi::find($id);
        return view('dewis.edit', compact('dewi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama'=>'required',
            'npm'=>'required'
        ]);
        $dewi = Dewi::find($id);
        $dewi->nama = $request->get('nama');
        $dewi->npm = $request->get('npm');
        $dewi->kelas = $request->get('kelas');
        $dewi->alamat = $request->get('alamat');
        $dewi->nohp = $request->get('nohp');
        $dewi->save();
        return redirect('/dewis')->with('success', 'Dewi updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dewi = Dewi::find($id);
        $dewi->delete();

        return redirect('/dewis')->with('success', 'Dewi deleted!');
    }
}
