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