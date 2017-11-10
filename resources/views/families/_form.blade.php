{{ csrf_field() }}
<div class="row">
    <div class="col-md-6">
        <div class="form-group required">
            <label>{{ trans('families.fields.name') }}</label>
            {!! Form::text('name', null, ['placeholder' => trans('families.placeholders.name'), 'class' => 'form-control', 'maxlength' => 191]) !!}
        </div>
        <div class="form-group">
            <label>{{ trans('families.fields.location') }}</label>
            {!! Form::select('location_id', (isset($family) && !empty($family->location) ? [$family->location_id => $family->location->name] : []), null, ['id' => 'location_id', 'class' => 'form-control select2', 'data-url' => route('locations.find'), 'data-placeholder' => trans('families.placeholders.location')]) !!}
        </div>

        <hr />

        <div class="form-group">
            <label>{{ trans('families.fields.image') }}</label>

            {!! Form::hidden('remove-image') !!}
            {!! Form::file('image', array('class' => 'image')) !!}
            @if (!empty($family->image))
                <div class="preview">
                    <div class="image">
                        <img src="/storage/{{ $family->image }}"/>
                        <a href="#" class="img-delete" data-target="remove-image" title="{{ trans('crud.remove') }}">
                            <i class="fa fa-trash"></i> {{ trans('crud.remove') }}
                        </a>
                    </div>
                    <br class="clear">
                </div>
            @endif        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>{{ trans('families.fields.history') }}</label>
            {!! Form::textarea('history', null, ['class' => 'form-control html-editor', 'id' => 'history']) !!}
        </div>
    </div>
</div>


<div class="form-group">
    <button class="btn btn-success">{{ trans('crud.save') }}</button>
    <button class="btn btn-default" name="submit-new">{{ trans('crud.save_and_new') }}</button>
    {!! trans('crud.or_cancel', ['url' => url()->previous()]) !!}
</div>
