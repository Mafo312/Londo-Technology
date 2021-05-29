@extends("layouts.app")
@section("content")
<a href="/nes" class="btn btn-primary">Crée un personnel</a>

    <div class="container">
        <div class="row">
            @foreach($personnel as $p)
                <div class="card col-lg-3">
                    <img src="{{asset('storage') . '/' . $p->photo }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Nom: {{$p->nom}} Prenom: {{$p->prenom}}</h5>
                        <p class="card-text">Mail: {{$p->email}}</p>
                    </div>
                    <div class="card-footer"  >
                        <a href="{{route('personnel.edit', ['personnel' => $p->id])}}" class="btn btn-primary">Modifier</a>
                        <a href="{{route('personnel.destroy', ['personnel' => $p->id])}}" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection