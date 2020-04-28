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