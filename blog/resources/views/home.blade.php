@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">

    <thead>

        <tr>

          <td>ID</td>

          <td>Judul</td>

            <td>Gambar</td>

          <td>Isi</td>

          <td>Jumlah Like</td>


          <td colspan="2">Action</td>

        </tr>

    </thead>

    <tbody>

        @foreach($articles as $articles)

        <tr>

            <td>{{$articles->id}}</td>

            <td>{{$articles->judul}}</td>

            <td><img style="width: 30px;" src="{{URL::asset($articles->gambar)}}"></td>

            <td>{!! $articles->isi !!}</td>

            <td>{{$articles->like}}</td>
            
        
            <td>
                <td>
                    <a href="{{ route('articles.show', $articles->id)}}" class="btn btn-success">Detail</a>
                </td>
                <td>
                  @csrf

                  @method('DELETE')

                  <button class="btn btn-danger" type="submit">Delete</button>
                </td>

                </form>

            </td>

        </tr>

        @endforeach

    </tbody>

  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
