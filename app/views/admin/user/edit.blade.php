@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-6">
        {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('admin.user.update', $user->id)) }}
            {{ Form::token() }}
            {{ BootForm::bind($user) }}
            {{ BootForm::text('Nom', 'name')->placeHolder("Nom de l'adhérent...")->required() }}
            {{ BootForm::text('Prénom', 'firstname')->placeHolder("Prénom de l'adhérent...")->required() }}
            {{ BootForm::text('Identifiant', 'username')->placeHolder("Identifiant de l'adhérent...")->required() }}
            {{ BootForm::text('Email', 'email')->placeHolder("Email de l'adhérent ...")->required() }}
            @if($user->hideEmail)
                {{ BootForm::checkbox('Email privé', 'hideEmail')->check() }}
            @else
                {{ BootForm::checkbox('Email privé', 'hideEmail') }}
            @endif
            {{ BootForm::text('Mobile', 'mobile')->placeHolder("Mobile de l'adhérent...") }}
            @if($user->hideMobile)
                {{ BootForm::checkbox('Mobile privé', 'hideMobile')->check() }}
            @else
                {{ BootForm::checkbox('Mobile privé', 'hideMobile') }}
            @endif
            {{ BootForm::text('Fax', 'fax')->placeHolder("Fax de l'adhérent...") }}
            @if($user->hideFax)
                {{ BootForm::checkbox('Fax privé', 'hideFax')->check() }}
            @else
                {{ BootForm::checkbox('Fax privé', 'hideFax') }}
            @endif
            {{ BootForm::select('Groupe', 'group_id')->options($groups) }}
    </div>
    <div class="col-sm-6">
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
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-users').addClass('active');
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