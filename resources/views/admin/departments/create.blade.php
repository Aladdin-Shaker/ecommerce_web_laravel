@extends('admin.index')

@section('content')
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#jstree').jstree({
            "core" : {"themes" : { "variant" : "large"},'data' : {!! load_dep(old('parent')) !!} },
            "checkbox" : { "keep_selected_style" : false },
            "plugins" : ["wholerow"]
        });
    });
    $('#jstree').on('changed.jstree', function(e, data) {
        // extract the data changed
        var i,j,r=[];
        for(i=0, j=data.selected.length; i<j; i++)
        {
            r.push(data.instance.get_node(data.selected[i]).id);
        }
        $('.parent_id').val(r.join(', '));
    });
</script>
@endpush
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{!! $title !!}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {!! Form::open(['url' => aurl('departments'), 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('dep_name_ar',
            trans('admin.dep_name_ar')) !!}
            {!! Form::text('dep_name_ar', old('dep_name_ar'),
            ['class' =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dep_name_en',
            trans('admin.dep_name_en')) !!}
            {!! Form::text('dep_name_en', old('dep_name_en'),
            ['class' =>
            'form-control']) !!}
        </div>

        <div class="clearfix"></div>
        <div id="jstree"></div>
        <input type="hidden" name="parent" class="parent_id"
            value="{{old('parent')}}">

        <div class="form-group">
            {!! Form::label('description',
            trans('admin.description')) !!}
            {!! Form::textarea('description', old('description'),
            ['class' =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('keyword',
            trans('admin.keyword')) !!}
            {!! Form::textarea('keyword', old('keyword'),
            ['class' =>
            'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('icon',
            trans('admin.icon')) !!}
            {!! Form::file('icon', old('icon'),
            ['class' =>
            'form-control'])
            !!}
            @if (!empty(setting()->logo))
            <img src="{{Storage::url(setting()->logo)}}" height="100px"
                width="100px" />
            @endif
        </div>

        {!! Form::submit(trans('admin.create_department'), ['class' => 'btn
        btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.card-body -->
</div>

@endsection
