@extends('layouts.index')
@section('content')

<section id="messagerie">
    <div class="row">
        <h1>Messagerie</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <h3><button class="btn btn-pink" id="envoi">Ecrire un message</button></h3>
            <div class="messagerie-form hide-form">
                {!! BootForm::openHorizontal(['lg' => [2, 10]])->action(route('message.store')) !!}
                {!! Form::token() !!}
                {!! BootForm::text('Titre', 'title')->placeHolder('Titre...')->required() !!}
                {!! BootForm::textarea('Message <br /><span class="textarea-subtext">(Votre message ici...)</span>', 'content')->placeHolder("Ecrivez votre message ici...")->class('ckeditor')->required() !!}
                @if(Auth::getUser()->group_id == 2 || Auth::getUser()->group_id == 3)
                    {!! BootForm::checkbox('Envoyer le message comme administrateur', 'admin-msg') !!}
                @endif
                {!! BootForm::submit('Envoyer', 'pull-right btn btn-pink') !!}
            {!! BootForm::close() !!}
            </div>
        </div>
        <div class="col-sm-6">
        <h3>Messages des membres</h3>
            @foreach($mMessages as $mMessage)
                <span class="pull-left message-author">{{ strtoupper($mMessage->user->name) . ' ' . ucfirst($mMessage->user->firstname) . ' ' . date('d/m/Y H:i:s', strtotime($mMessage->created_at)) }}</span><br />
                <p>
                    <strong class="pull-left">{{ $mMessage->title }}</strong><br />
                    {!! $mMessage->content !!}
                </p>
                <hr>
            @endforeach
            {{-- Paginator::setPageName('mm') --}}
            {!! $mMessages->appends('am', request('am'))->links() !!}
        </div>
        <div class="col-sm-6">
        <h3>Messages de l'association</h3>
            @foreach($aMessages as $aMessage)
                <span class="pull-left message-author">{{ strtoupper($aMessage->user->name) . ' ' . ucfirst($aMessage->user->firstname) . ' ' . date('d/m/Y H:i:s', strtotime($aMessage->created_at)) }}</span><br />
                <p>
                    <strong class="pull-left">{{ $aMessage->title }}</strong><br />
                    {!! $aMessage->content !!}
                </p>
                <hr>
            @endforeach
            {{-- Paginator::setPageName('am') --}}
            {{ $aMessages->appends('mm', request('mm'))->links() }}
        </div>
    </div>
</section>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-info').addClass('active');
            $(':checkbox:not(:checked)').parent().addClass('notchecked');
            $(':checkbox:checked').parent().addClass('checked');
            $(':checkbox').on('change', function(){
                if( $(this).parent().hasClass('checked') ){
                    $(this).parent().removeClass('checked').addClass('notchecked');
                }else{
                    $(this).parent().removeClass('notchecked').addClass('checked');
                }
            });

            $('#envoi').click(function(event) {
                if( $('.messagerie-form').hasClass('hide-form')){
                    $('.messagerie-form').removeClass('hide-form');
                    $('#envoi').text('Fermer le formulaire');
                } else {
                    $('.messagerie-form').addClass('hide-form');
                    $('#envoi').text('Ecrire un message');
                }
            });
        });
    </script>
@stop