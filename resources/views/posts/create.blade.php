@extends('layouts.app')

@section('content')

    <h2>アドバイスをもらおう！</h2>

    <div class="row">
        <div class="col-6">
            {!! Form::model($post, ['route' => 'posts.store']) !!}
        
                <div class="form-group">
                    {!! Form::label('artist', 'アーティスト名:') !!}
                    {!! Form::text('artist', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tune', '曲名:') !!}
                    {!! Form::text('tune', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tune_url', '曲のURL:') !!}
                    {!! Form::text('tune_url', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('part', 'パート:') !!}
                    {!! Form::text('part', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', '不明点:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('投稿', ['class' => 'btn border border-dark btn-light']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection