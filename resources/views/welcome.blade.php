@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success mb-5 container">{{ session('success') }}</div>
    @endif
    <div class="container row ml-md-5 align-middle">
        <input type="checkbox" id="btn-menu">
        <div for="btn-menu" class="bg-white shadow rounded paragraphe mb-3 ml-2 pl-2 pr-2">
            <label for="btn-menu"><h4 class="paragraphe mt-2"><b><i class="fas fa-user"></i> Tous contacts</b></h4></label>
        </div>
        <div class="bg-white shadow rounded paragraphe mb-3 ml-3 ml-2 pl-2 pr-2"><h4 class="mt-2"><b><a href="/"><i class="fas fa-home"></i> Accueil</a></b></h4></div>
        <div class="col-sm-4 menu" id="gauche">
            <div class="bg-white p-1 rounded">
                <h5 class="mt-3 mb-3"><i class="fas fa-user" ></i> Liste des contacts</h5>
                <div class="anyClass">
                    <ul class="list-group ">
                        @foreach ($contact as $contact)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                    @if ($contact->photo !== null)
                                        <img src="{{asset('storage') . '/' . $contact->photo }}" class="rounded-circle image"  alt="...">
                                        {{ $contact->nomContact }}
                                    @else
                                        <img src="{{asset('image/images.png') }}" class="rounded-circle image"  alt="...">
                                        {{ $contact->nomContact }}
                                    @endif
                                <a href="{{ route('contct.show', $contact->id) }}"><i class="fas fa-info-circle"></i></a>
                                <a href="{{ $contact->id }}" style="color: rgb(253, 189, 11)" data-toggle="modal" data-target="#staticBackdropcontact{{ $contact->id }}"><i class="fas fa-user-edit"></i></a>
                                <div class="modal fade" id="staticBackdropcontact{{ $contact->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modifier le contact</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation"action="{{ route('udatecontact', $contact->id) }}" method="POST" novalidate enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom01">nom</label>
                                                        <input type="text" class="form-control col-form-label-sm" name="nom" value="{{ $contact->nomContact }}" id="validationCustom01" placeholder="Nom du contact" required>
                                                        <div class="valid-feedback">
                                                        Valide!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">Prénom</label>
                                                        <input type="text" class="form-control col-form-label-sm" name="prenom" value="{{ $contact->prenom }}" id="validationCustom02" placeholder="Prénom du contact" required>
                                                        <div class="valid-feedback">
                                                        Valide!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">Profession</label>
                                                        <input type="text" class="form-control col-form-label-sm" name="profession" value="{{ $contact->profession }}" id="validationCustom02" placeholder="Profession" required>
                                                        <div class="valid-feedback">
                                                        Valide!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">Téléphone</label>
                                                        <input type="text" class="form-control col-form-label-sm" name="phone" value="{{ $contact->phone }}" id="validationCustom02" placeholder="Téléphone" required>
                                                        <div class="valid-feedback">
                                                        Valide!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">E-mail</label>
                                                        <input type="email" class="form-control col-form-label-sm" name="email" value="{{ $contact->email }}" id="validationCustom02" placeholder="E-mail" required>
                                                        <div class="valid-feedback">
                                                        Valide!
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="groupe">Groupe</label>
                                                        <select class="form-control col-form-label-sm" name="groupe">
                                                        <option ></option>
                                                        @foreach ($item as $contactUpdate)
                                                            <option value="{{ $contactUpdate->id }}">{{ $contactUpdate->nomGroupe }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                <div class="custom-file col-md-12 mb-3 mt-4">
                                                    <input type="file" class="custom-file-input col-form-label-sm" name="image" id="validatedInputGroupCustomFile">
                                                    <label class="custom-file-label" for="validatedInputGroupCustomFile">Chisir une image...</label>
                                                    <div class="valid-feedback">
                                                        Valide!
                                                    </div>
                                                </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit"><i class="fas fa-user"></i> Modifier le contact</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <a href="{{ route('destroy', $contact->id) }}" data-toggle="modal" data-target="#staticBackdropdeletecontact{{  $contact->id }}"><i class="far fa-trash-alt" style="color: red;"></i></a>
                                <div class="modal fade" id="staticBackdropdeletecontact{{  $contact->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Confirmation de la supréssion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Cette action suprimera définitivement le contact et elle est irréversible</p>
                                            <a href="{{ route('contact.destroy', $contact->id) }}" class="btn btn-danger">Suprimer</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Annuler</a>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                @if ($contact->favoris == 0)
                                    <a href="{{ route('edite', $contact->id) }}"><i class="fas fa-heart"></i></a>
                                @else
                                    <a href="{{ route('editefavoris', $contact->id) }}"><i class="fas fa-heart" style="color: green;"></i></a>
                                @endif

                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="bg-white p-1 rounded mt-3">
                <h5 class="mt-3 mb-3"><i class="fas fa-users"></i> Liste des Groupes</h5>
                <div class="anyClass"><span></span>
                    <ul class="list-group ">
                        @foreach ($groupe as $groupe)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                @if ($groupe->image !== null)
                                    <img src="{{asset('storage') . '/' . $groupe->image }}" class="rounded-circle image"  alt="...">
                                    {{ $groupe->nomGroupe }}
                                @else
                                <img src="{{asset('image/groupe.png') }}" class="rounded-circle image"  alt="...">
                                {{ $groupe->nomGroupe }}
                                @endif
                                <a href="{{ route('show', $groupe->id) }}"><i class="fas fa-info-circle"></i></a>
                                <a href="#" style="color: rgb(253, 189, 11);" data-toggle="modal" data-target="#staticBackdropgroupe{{ $groupe->id }}"><i class="fas fa-user-edit"></i></a>
                                <div class="modal fade" id="staticBackdropgroupe{{ $groupe->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modifier le groupe</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation"action="{{ route('groupeupdate', $groupe->id) }}" method="POST" novalidate enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom01">nom du groupe</label>
                                                    <input type="text" class="form-control col-form-label-sm" name="nom" id="validationCustom01" value="{{ $groupe->nomGroupe }}" placeholder="Nom du groupe" required>
                                                    <div class="valid-feedback">
                                                    Valide!
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom01">Description du groupe</label>
                                                    <textarea type="text" class="form-control col-form-label-sm" name="description"  id="validationCustom01" placeholder="Décrivez le groupe" required>{{ $groupe->description }}</textarea>
                                                    <div class="valid-feedback">
                                                    Valide!
                                                    </div>
                                                </div>
                                                <div class="custom-file col-md-12 mb-3 mt-4">
                                                    <input type="file" class="custom-file-input col-form-label-sm" name="image" id="validatedInputGroupCustomFile">
                                                    <label class="custom-file-label" for="validatedInputGroupCustomFile">Chisir une image...</label>
                                                    <div class="valid-feedback">
                                                        Valide!
                                                    </div>
                                                </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit"><i class="fas fa-users"></i>  Modifier le groupe</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <a href="#" data-toggle="modal" data-target="#staticBackdropdeletegroupe{{ $groupe->id }}"><i class="far fa-trash-alt" style="color: red;"></i></a>
                                <div class="modal fade" id="staticBackdropdeletegroupe{{ $groupe->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Confirmation de la supréssion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Cette action néccessite beaucoup votre attention car si cette action est éffectuée vous perdrez tous contacts de ce groupe</p>
                                            <a href="{{ route('destroy', $groupe->id) }}" class="btn btn-danger">Suprimer</a>
                                            <a href="#" class="btn btn-primary">Annuler</a>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>

            </div>
            <div class="bg-white p-1 rounded mt-3">
                <h5 class="mt-3 mb-3"><i class="fas fa-heart"></i> Liste des Favoris</h5>
                <div class="anyClass">
                    <ul class="list-group ">
                        @foreach ($favoriss as $favoriss)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                @if ($favoriss->photo !== null)
                                    <img src="{{asset('storage') . '/' . $favoriss->photo }}" class="rounded-circle image"  alt="...">
                                @else
                                    <img src="{{asset('image/images.png') }}" class="rounded-circle image"  alt="...">
                                @endif
                                {{ $favoriss->nomContact }}
                                <a href="{{ route('editefavoris', $favoriss->id) }}" style="color: green;"><i class="fas fa-heart"></i></a>
                                <a href="{{ route('contact.destroy', $favoriss->id) }}" data-toggle="modal" data-target="#staticBackdropdeletefavoris{{ $favoriss->id }}"><i class="far fa-trash-alt" style="color: red;"></i></a>
                                <div class="modal fade" id="staticBackdropdeletefavoris{{ $favoriss->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Confirmation de la supréssion</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{ route('contact.destroy', $favoriss->id) }}" class="btn btn-danger">Suprimer</a>
                                                <a href="#" class="btn btn-primary" data-dismiss="modal">Annuler</a>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>

            </div>
        </div>
        <div class="col-sm-8 ">
            <div class="bg-white rounded p-3 row ajouter">
                <div class="col-sm-6">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fas fa-user"></i> Ajouter un contact
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-user"></i> Ajouter un contact</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation"action="{{ route('store') }}" method="POST" novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                  <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">nom</label>
                                    <input type="text" class="form-control col-form-label-sm" name="nom" id="validationCustom01" placeholder="Nom du contact" required>
                                    <div class="valid-feedback">
                                      Valide!
                                    </div>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Prénom</label>
                                    <input type="text" class="form-control col-form-label-sm" name="prenom" id="validationCustom02" placeholder="Prénom du contact" required>
                                    <div class="valid-feedback">
                                      Valide!
                                    </div>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Proffession</label>
                                        <input type="text" class="form-control col-form-label-sm" name="profession" id="validationCustom02" placeholder="Profession" required>
                                        <div class="valid-feedback">
                                        Valide!
                                   </div>
                                  </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Téléphone</label>
                                        <input type="text" class="form-control col-form-label-sm" name="phone" id="validationCustom02" placeholder="Téléphone" required>
                                        <div class="valid-feedback">
                                        Valide!
                                    </div>
                                  </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">E-mail</label>
                                        <input type="email" class="form-control col-form-label-sm" name="email" id="validationCustom02" placeholder="E-mail" required>
                                        <div class="valid-feedback">
                                        Valide!
                                    </div>
                                  </div>
                                  <div class="col-sm-6 mb-3">
                                      <label for="groupe">Groupe</label>
                                      <select class="form-control col-form-label-sm" name="groupe">
                                          <option ></option>
                                        @foreach ($groupes as $groupes)
                                           <option value="{{ $groupe->id }}">{{ $groupes->nomGroupe }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  <div class="custom-file col-md-12 mb-3 mt-4">
                                    <input type="file" class="custom-file-input col-form-label-sm" name="image" id="validatedInputGroupCustomFile">
                                    <label class="custom-file-label" for="validatedInputGroupCustomFile">Chisir une image...</label>
                                    <div class="valid-feedback">
                                        Valide!
                                    </div>
                                  </div>
                                </div>
                                <button class="btn btn-primary" type="submit"><i class="fas fa-user"></i> Créer le contact</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer la fénêtre</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdropLabelcreatgroupe">
                    <i class="fas fa-users"></i> Ajouter un Groupe
                  </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdropLabelcreatgroupe" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelcreatgroupe" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabelcreatgroupe"><i class="fas fa-users"></i>  Ajouter un groupe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="needs-validation"action="{{ route('groupeCreate') }}" method="POST" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                              <div class="col-md-12 mb-3">
                                <label for="validationCustom01">nom du groupe</label>
                                <input type="text" class="form-control col-form-label-sm" name="nom" id="validationCustom01" placeholder="Nom du groupe" required>
                                <div class="valid-feedback">
                                  Valide!
                                </div>
                              </div>
                              <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Description du groupe</label>
                                <textarea type="text" class="form-control col-form-label-sm" name="description" id="validationCustom01" placeholder="Nom du contact" required></textarea>
                                <div class="valid-feedback">
                                  Valide!
                                </div>
                              </div>
                              <div class="custom-file col-md-12 mb-3 mt-4">
                                <input type="file" class="custom-file-input col-form-label-sm" name="image" >
                                <label class="custom-file-label">Chisir une image...</label>
                                <div class="valid-feedback">
                                    Valide!
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-primary" type="submit"><i class="fas fa-users"></i>  Créer le groupe</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer la fénêtre</button>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-sm-6 recherche">
                  <form class="d-flex" action="{{ route('seach.index') }}" method="POST">
                    @csrf
                        <input class="form-control mr-2 btn-sm @error('valeur') is-invalid @enderror" type="search"  name="valeur" placeholder="Recherchez ici..." aria-label="Search">
                        <button class="btn btn-outline-primary btn-sm" type="submit">Recherche</button>
                    </form>
                </div>
            </div>
            <div class="bg-white rounded mt-3 p-3 row">
              <div class="col-sm-4 bg-white rounded shadow">
                    <h5 class="mt-3">
                      <i class="fas fa-user" style="color: rgb(230, 9, 9);"></i> contacts
                    </h5>
                    <p class="mt-3">
                        <span class="badge badge-danger badge-pill">{{ $contact->count() }}</span> contacts enregistrés
                    </p>
                <a href="{{ route('conatct.all') }}" class="btn btn-primary mb-3 btn-sm">Tout afficher</a>
              </div>
              <div class="col-sm-4 bg-white rounded shadow ">
                    <h5 class="mt-3">
                        <i class="fas fa-users" style="color: rgb(0, 153, 255);"></i> groupes
                    </h5>
                    <p class="mt-3">
                        <span class="badge badge-primary badge-pill">{{ $groupe->count() }}</span> groupes enregistrés
                    </p>
                <a href="{{ route('groupe.all') }}" class="btn btn-primary mb-3 btn-sm">Tout afficher</a>
              </div>
              <div class="col-sm-4 bg-white rounded shadow ">
                <h5 class="mt-3">
                    <i class="fas fa-heart" style="color: green;"></i> favoris
                </h5>
                <p class="mt-3">
                    <span class="badge badge-success badge-pill">{{ $favoriss->count() }}</span> favoris enregistrés
                </p>
                <a href="{{ route('favoris.index') }}" class="btn btn-primary mb-3 btn-sm">Tout afficher</a>
              </div>
            </div>
            <div class="bg-white rounded mt-3 p-3 row">
                <h5>Infomations générales sur le l'application <span class="badge badge-primary badge-pill">Gestionnaire de carnet d'adresses</span></h5>
                <p style="text-align: justify;">
                    L'affichage de cette application est fonction de l'appareil avec le quel elle est exécutée.
                    Toute fois, l'utilisation de cette application est simple et vous déviez être connecté pour avoir acces à toutes les fonctionnalités: la barre lattérale gauche referme
                    toutes les options de l'application exceptée la recherche. Notez égallement que un contact
                    peut être créé sans être assigné à un groupe (pour le faire laissez la case *groupe* vide), de même
                    un groupe peut être vide lors de sa création et être assigné plus tard par des contacts.
                    NB: la supréssion d'un groupe suppriméra automatiquement tous les contacts qui lui appartiennent. <br>


                    Un coeur vert sur un contact signifie que ce dernier est "favori" et un coeur bleu signifie qu'il n'est pas
                    favori, toute fois il suffit de cliquer sur le coeur pour changer son état. <br>

                    Les informations sur un contact est complètement visible lorsque vous cliquez sur le premier icôn (sous forme de i) qui permet
                    de voir les informations détaillées du contact.
                </p>
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
    </script>
@endsection
