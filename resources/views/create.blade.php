@extends('layouts.app')
@section('content')
<div class="container"><h1>Déposer une annonce</h1>
<hr>
<form method="POST" action="{{route('ad.store')}}">
@csrf
  <div class="form-group">
    <label for="title">Titre de l'annonce</label>
    <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid':''}}" id="title" aria-describedby="title" name="title">
@if ($errors->has('title'))
<span class="invalid-feedback">{{$errors->first('title')}}</span>    
@endif
</div>
<div class="form-group">
<label for="description">Description de l'annonce</label> 
<textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>

<div class="form-group">
    <label for="localisation">Localisation</label>
    <input type="text" class="form-control" id="localisation" name="localisation">
  </div>
 <div class="form-group">
    <label for="price">Prix</label>
    <input type="text" class="form-control" id="price" name="price">
  </div>

@guest
          <div class="form-group">
            <h2>Vos informations</h2>
            <hr>
            <div class="form-group">
              <label for="pseudo">Pseudo</label>
              <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="pseudo" aria-describedby="pseudo">@if ($errors->has('name'))
              <div class="invalid-feedback">{{ $errors->first('name') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" aria-describedby="email">@if ($errors->has('email'))
              <div class="invalid-feedback">{{ $errors->first('email') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="password">Mot de passe</label>
              <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password">
              @if ($errors->has('password'))
                  <span class="invalid-feedback">{{  $errors->first('password') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="password_confirmation">Confirmation</label>
              <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" id="password_confirmation">
              @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback">{{  $errors->first('password_confirmation') }}</span>
              @endif
            </div>
          </div>
        @endguest

  <button type="submit" class="btn btn-primary">Soumettre l'annonce</button>
</form>
</div>

@endsection
