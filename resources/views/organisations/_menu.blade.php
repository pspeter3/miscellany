<div class="box">
    <div class="box-body box-profile">
        @include ('cruds._image')

        <h3 class="profile-username text-center">{{ $model->name }}
            @if ($model->is_private)
                <i class="fas fa-lock" title="{{ trans('crud.is_private') }}"></i>
            @endif
        </h3>

        <ul class="list-group list-group-unbordered">
            @include('cruds.lists.location')
            @if (!empty($model->type))
                <li class="list-group-item">
                    <b>{{ trans('organisations.fields.type') }}</b> <span class="pull-right">{{ $model->type }}</span>
                    <br class="clear" />
                </li>
            @endif

            @if (!empty($model->organisation))
                <li class="list-group-item">
                    <b>{{ trans('crud.fields.organisation') }}</b>
                    <span class="pull-right">
                        <a href="{{ $model->organisation->getLink() }}" data-toggle="tooltip" title="{{ $model->organisation->tooltip() }}">{{ $model->organisation->name }}</a>
                    </span>
                    <br class="clear" />
                </li>
            @endif

            @include('entities.components.tags')
            @include('entities.components.files')
        </ul>
        @include('.cruds._actions')
    </div>
</div>


@include('entities.components.menu')
