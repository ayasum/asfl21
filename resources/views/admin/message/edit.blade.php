@extends('layouts.admin')
@section('content')
    {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('admin.message.update', $message->id)) !!}
        {!! Form::token() !!}
        {!! BootForm::bind($message) !!}
        {!! BootForm::text('Titre', 'title')->placeHolder('Titre...')->required() !!}
        {!! BootForm::textarea('Message', 'content')->placeHolder('Message...')->class('ckeditor')->required() !!}
        {!! BootForm::select('Catégorie', 'category_id')->options($categories) !!}
        {!! BootForm::submit('Enregistrer', 'pull-right btn-pink') !!}
    {!! BootForm::close() !!}
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-messages').addClass('active');
        });
    </script>
@stop