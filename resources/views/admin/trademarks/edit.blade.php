@extends('admin.index')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{!! $title !!}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {!! Form::open(['url' => aurl('trademarks/'. $trade->id), 'method'
        =>
        'put', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('name_ar',
            trans('admin.name_ar')) !!}
            {!! Form::text('name_ar', $trade->name_ar,
            ['class' =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_en',
            trans('admin.name_en')) !!}
            {!! Form::text('name_en',$trade->name_en,
            ['class' =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('logo', trans('admin.logo')) !!}
            {!! Form::file('logo', ['class'
            =>
            'form-control']) !!}
            @if (!empty($trade->logo))
            <img src="{{Storage::url($trade->logo)}}" height="100px"
                width="100px" />
            @endif
        </div>

        {!! Form::submit(trans('admin.save'), ['class' => 'btn
        btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.card-body -->
</div>

@endsection
