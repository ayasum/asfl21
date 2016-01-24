@extends('layouts.index')
@section('content')
<div class="content-container">
 
    <div class="row">
        <div class="col-sm-12">
            <h1 class="animate-page-title">Mon Profil</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <ul class="nav nav-pills nav-justified">

                <li class="active"><a href="#profil" data-toggle="tab">Mon profil</a></li>
                <li><a href="#adresses" data-toggle="tab">Mes adresses</a></li>
                <li><a href="#activites" data-toggle="tab">Mes activités</a></li>
                <li><a href="#motdepasse" data-toggle="tab">Mot de passe</a></li>

            </ul>
        </div>
    </div>
    <div class="row tab-content">

        <!-- Div de l'onglet profil -->
        <div role="tabpanel" class="row tab-pane fade in active" id="profil">
            {{ BootForm::openHorizontal(2, 10)->put()->action(URL::route('user.update', $user->id)) }}
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="col-sm-9 col-sm-offset-3"><h3>Mes coordonnées</h3></div>
                        {{ Form::token() }}
                        {{ BootForm::bind($user) }}
                        {{ BootForm::text('Nom', 'name')->placeHolder("Nom...")->required() }}
                        {{ BootForm::text('Prénom', 'firstname')->placeHolder("Prénom...")->required() }}
                        {{ BootForm::text('Identifiant', 'username')->placeHolder("Identifiant...")->required() }}
                        {{ BootForm::text('Email', 'email')->placeHolder("Email...")->required() }}
                        @if($user->hideEmail)
                            {{ BootForm::checkbox('Ne pas montrer mon email (Cache le formulaire de contact)', 'hideEmail')->check() }}
                        @else
                            {{ BootForm::checkbox('Ne pas montrer mon email (Cache le formulaire de contact)', 'hideEmail') }}
                        @endif
                        {{ BootForm::text('Mobile', 'mobile')->placeHolder("Mobile...") }}
                        @if($user->hideMobile)
                            {{ BootForm::checkbox('Ne pas montrer mon mobile', 'hideMobile')->check() }}
                        @else
                            {{ BootForm::checkbox('Ne pas montrer mon mobile', 'hideMobile') }}
                        @endif
                        {{ BootForm::textarea('Description de vos activités', 'description')->placeHolder("Entrez ici une description des activités que vous proposez...") }}
                        {{ BootForm::submit('Enregistrer', 'pull-right btn-pink') }}
                </div>
            {{ BootForm::close() }}
        </div>

        <!-- Div de l'onglet adresses -->
        <div role="tabpanel" class="tab-pane fade" id="adresses">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-2">
                    <h2>Mes Adresses</h2>
                </div>
                <div class="col-sm-4">
                    <h2><a href="{{ URL::route('adresse.create') }}" ><button class="btn btn-pink pull-right">Ajouter</button></a></h2>
                </div>
            </div>
            <div class="col-sm-10 col-sm-offset-1">
                <table class="table table-condensed table-hover">
                    <thead>
                        <td>Nom</td>
                        <td>Adresse</td>
                        <td>Téléphone</td>
                        <td>Actions</td>
                    </thead>
                    <tbody>
                        @foreach($addresses as $address)
                            <tr>
                                <td>{{ $address->name }}</td>
                                <td>{{ Str::title($address->address) }}, {{ $address->zipCode }}, {{ Str::title($address->city) }}</td>
                                <td>{{ $address->phone }}</td>
                                <td>
                                    <a href="{{ URL::route('adresse.edit', $address->id) }}"><button class="btn label label-warning">Editer</button></a>
                                    {{ BootForm::open()->delete()->action(URL::route('adresse.destroy', $address->id))->style('display: inline;') }}
                                        {{ Form::token() }}
                                        {{ BootForm::bind($address) }}
                                        {{ BootForm::submit('Supprimer', 'label-danger label') }}
                                    {{ BootForm::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Div de l'onglet activités -->
        <div role="tabpanel" class="tab-pane fade" id="activites">
          <div class="col-sm-6 col-sm-offset-3">
              <div class="col-sm-12 text-center"><h3>Mes activités</h3></div>
              {{ BootForm::openHorizontal(2, 10)->put()->action(URL::route('user.updateActivities', $user->id)) }}
                  {{ Form::token() }}
                  {{ BootForm::bind($user) }}
                  @foreach($activities as $act)
                      @if($user->activities->contains($act->id))
                          {{ BootForm::checkbox($act->activityName, 'activities[]')->value($act->id)->check() }}
                      @else
                          {{ BootForm::checkbox($act->activityName, 'activities[]')->value($act->id) }}
                      @endif
                  @endforeach
                  {{ BootForm::submit('Enregistrer', 'pull-right btn-pink') }}
              {{ BootForm::close() }}
          </div>
        </div>
        
        <!-- Div de l'onglet mot de passe -->
        <div role="tabpanel" class="tab-pane fade" id="motdepasse">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="col-sm-12 text-center"><h3>Changer mon mot de passe</h3></div>
                    {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('sessions.update')) }}
                      {{ Form::token() }}
                      {{ BootForm::password('Mot de passe', 'password') }}
                      {{ BootForm::password('Confirmation', 'password_confirmation') }}
                      {{ BootForm::submit('Envoyer', 'pull-right btn-pink') }}
                    {{ BootForm::close() }}
            </div>
        </div>

    </div> <!-- Fin div tab-content -->
</div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-profil').addClass('active');
            $(':checkbox:not(:checked)').parent().addClass('notchecked');
            $(':checkbox:checked').parent().addClass('checked');
            $(':checkbox').on('change', function(){
                if( $(this).parent().hasClass('checked') ){
                    $(this).parent().removeClass('checked').addClass('notchecked');
                }else{
                    $(this).parent().removeClass('notchecked').addClass('checked');
                }
            });
        });
    </script>
@stop