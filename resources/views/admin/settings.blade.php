@extends('admin.index')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{!! $title !!}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {!! Form::open(['url' => aurl('settings'), 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('sitename_ar', trans('admin.sitename_ar')) !!}
            {!! Form::text('sitename_ar', setting()->sitename_ar, ['class'
            =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('sitename_en', trans('admin.sitename_en')) !!}
            {!! Form::text('sitename_en', setting()->sitename_en, ['class'
            =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', trans('admin.email')) !!}
            {!! Form::email('email', setting()->email, ['class'
            =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('logo', trans('admin.logo')) !!}
            {!! Form::file('logo', ['class'
            =>
            'form-control']) !!}
            @if (!empty(setting()->logo))
            <img src="{{Storage::url(setting()->logo)}}" height="100px"
                width="100px" />
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('icon', trans('admin.icon')) !!}
            {!! Form::file('icon', ['class' => 'form-control']) !!}
            @if (!empty(setting()->icon))
            <img src="{{Storage::url(setting()->icon)}}" height="100px"
                width="100px" />
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('description', trans('admin.description')) !!}
            {!! Form::textarea('description', setting()->description,
            ['class'
            =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('keywords', trans('admin.keywords')) !!}
            {!! Form::textarea('keywords', setting()->keywords, ['class'
            =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('main_lang', trans('admin.main_lang')) !!}
            {!! Form::select('main_lang',['ar' => trans('admin.ar'), 'en'
            => trans('admin.en')] ,setting()->main_lang, ['class'
            =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status', trans('admin.status')) !!}
            {!! Form::select('status',['open' => trans('admin.open'),
            'close' => trans('admin.close')], setting()->status, ['class'
            =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('message_maintenance',
            trans('admin.message_maintenance')) !!}
            {!! Form::textarea('message_maintenance',
            setting()->message_maintenance, ['class'
            =>
            'form-control']) !!}
        </div>
        {!! Form::submit(trans('admin.save'), ['class' => 'btn
        btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.card-body -->
</div>

@endsection
