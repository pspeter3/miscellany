<div class="row">
    <div class="col-md-3">
       @include('journals._menu')
    </div>

    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="{{ (request()->get('tab') == null ? ' active' : '') }}">
                    <a href="#entry" data-toggle="tooltip" title="{{ trans('crud.fields.entry') }}">
                        <i class="fa fa-align-justify"></i> <span class="hidden-sm hidden-xs">{{ trans('crud.fields.entry') }}</span></a>
                </li>
                @include('cruds._tabs', ['relations' => false])
            </ul>

            <div class="tab-content">
                <div class="tab-pane {{ (request()->get('tab') == null ? ' active' : '') }}" id="entry">
                    @if (!empty($model->entry))
                        <p>{!! $model->entry !!}</p>
                    @endif
                    @include('cruds.partials.mentions')
                </div>
                @include('cruds._panes', ['relations' => false])
            </div>
        </div>
        @include('cruds.boxes.history')
    </div>
</div>
