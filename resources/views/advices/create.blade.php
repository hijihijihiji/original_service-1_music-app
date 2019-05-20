@extends('layouts.app')

@section('content')

    <h1>アドバイスを入力！</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($advice, ['route' => ['posts.advices.store', $advice->post_id]]) !!}
        
                <div class="form-group">
                    {!! Form::label('advice_url', '演奏へのリンク:') !!}
                    {!! Form::text('advice_url', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'コメント:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('投稿', ['class' => 'btn border border-dark btn-light']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection