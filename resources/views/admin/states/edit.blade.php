@extends('admin.index')

@section('content')

@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
    @if($state->country_id)
    $.ajax({
            url: '{{ aurl('states/create') }}',
            type: 'get',
            dataType: 'html',
            data: { country_id:'{{ $state->country_id }}', select:'{{ $state->city_id }}' },
            success: function(data) {
                $('.city').html(data);
            }
            })
    @endIf
    $(document).on('change', '.country_id', function () {
        var country = $('.country_id option:selected').val();
        console.log(country);
        if(country > 0)
        {
            $.ajax({
                url: '{{ aurl('states/create') }}',
                type: 'get',
                dataType: 'html',
                data: {country_id:country, select:''},
                success: function(data) {
                    $('.city').html(data);
                }
            })
        }
        else
        {
            $('.city').html('');

        }
    })
})
</script>

@endpush

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{!! $title !!}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {!! Form::open(['url' => aurl('states/'. $state->id), 'method'
        =>
        'put']) !!}

        <div class="form-group">
            {!! Form::label('state_name_ar',
            trans('admin.state_name_ar')) !!}
            {!! Form::text('state_name_ar', $state->state_name_ar,
            ['class' =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('state_name_en',
            trans('admin.state_name_en')) !!}
            {!! Form::text('state_name_en',$state->state_name_en,
            ['class' =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('country_id', trans('admin.country')) !!}
            {!!
            Form::select('country_id',App\Model\Country::pluck('country_name_'.session('lang'),'id')
            ,$state->country_id,
            ['class' => 'form-control country_id', 'placeholder' =>
            '..........']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('city_id', trans('admin.city')) !!}
            <span class="city"></span>
        </div>

        {!! Form::submit(trans('admin.save'), ['class' => 'btn
        btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.card-body -->
</div>

@endsection
