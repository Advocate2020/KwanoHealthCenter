@extends('layouts.nurse')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h1>Favourites Suburbs</h1>
            <a class="btn btn-primary" href="/nurse/{{Auth::user()->id}}/favourites/create">Add Suburb</a>
        </div>
    </div>
    <hr>
    @if($favs->isEmpty())
        <div class="row" style="display:block;">
            <div class="col-md-12 col-md-offset-5">
                <div class="nomembers">
                    <div class="text-center empty" role="dialog" aria-modal="true">
                        <div class="swal-title" style="">Sorry</div>
                        <div class="swal-text" style="">
                            Sorry, you have not added any favourite suburbs yet.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($favs->isNotEmpty())
    <div class="table-responsive bg-white">
        <table class="table table-bordered table-hover">
            <caption>List of suburbs</caption>
            <thead>
            <tr>
                <th scope="col">Suburb name</th>
                <th scope="col">suburb code</th>
                <th scope="col">City</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($favs as $fav)
                <tr>
                    <td>
                        {{ $fav->suburbname ?? false }}
                    </td>
                    <td>
                        {{ $fav->code ?? false}}
                    </td>
                    <td>
                        {{ $fav->cityname ?? false}}
                    </td>
                    <td>
                        <form action="{{ route('favourite.delete', ['user' => auth()->user()->id,'favourite' => $fav->suburbID]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm px-3">
                                <i class="fas fa-minus"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        @endif
    </div>
@endsection
