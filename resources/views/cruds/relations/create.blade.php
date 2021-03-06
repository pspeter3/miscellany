@extends('layouts.' . (request()->ajax() ? 'ajax' : 'app'), [
    'title' => trans('relations.create.title', ['name' => $model->name]),
    'description' => trans('relations.create.description'),
    'breadcrumbs' => [
        ['url' => route($parent . '.index'), 'label' => trans($parent . '.index.title')],
        ['url' => route($parent . '.show', $model->id), 'label' => $model->name],
        trans('crud.tabs.relations'),
    ]
])

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            @include('partials.errors')

            {!! Form::open(array('route' => [$route . '.store', $model->id], 'method'=>'POST', 'data-shortcut' => "1")) !!}
            @include('cruds.relations._form')

            {!! Form::hidden('owner_id', $model->entity->id) !!}

            <div class="form-group">
                <button class="btn btn-success">{{ trans('crud.save') }}</button>
                {!! trans('crud.or_cancel', ['url' => (!empty($cancel) ? $cancel : url()->previous() . (strpos(url()->previous(), '#relation') === false ? '#relation' : null))]) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
