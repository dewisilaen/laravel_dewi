@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a contact</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('dewis.store') }}">
          @csrf
          <div class="form-group">    
              <label for="nama">Name:</label>
              <input type="text" class="form-control" name="nama"/>
          </div>

          <div class="form-group">
              <label for="npm">NPM:</label>
              <input type="text" class="form-control" name="npm"/>
          </div>
          <div class="form-group">
              <label for="kelas">Kelas:</label>
              <input type="text" class="form-control" name="kelas"/>
          </div>
          <div class="form-group">
              <label for="alamat">Alamat:</label>
              <input type="text" class="form-control" name="alamat"/>
          </div>
          <div class="form-group">
              <label for="nohp">Nomor Hp:</label>
              <input type="text" class="form-control" name="nohp"/>
          </div>                         
          <button type="submit" class="btn btn-primary-outline">Add contact</button>
      </form>
  </div>
</div>
</div>
@endsection