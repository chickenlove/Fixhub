<div class="box">
    <div class="box-header">
        <div class="pull-right">
            @if($project->can('update'))
            <button class="btn btn-primary" type="button" data-toggle="modal" data-backdrop="static" data-target="#environment"><i class="fixhub fixhub-plus"></i> {{ trans('environments.create') }}</button>
            @endif
        </div>
        <h3 class="box-title">{{ trans('environments.label') }}</h3>
    </div>

    <div class="box-body" id="no_environments">
        <p>{{ trans('environments.none') }}</p>
    </div>

    <div class="box-body table-responsive" id="environment_list">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ trans('environments.name') }}</th>
                    <th>{{ trans('environments.default_on') }}</th>
                    <th>{{ trans('environments.servers') }}</th>
                    <th>{{ trans('environments.status') }}</th>
                    <th>{{ trans('environments.completed') }}</th>
                    <th>{{ trans('environments.description') }}</th>
                    <th class="text-right">{{ trans('app.actions') }}</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

@push('templates')
    <script type="text/template" id="environment-template">
        <td data-environment-id="<%- id %>"><span class="drag-handle"><i class="fixhub fixhub-drag"></i></span>
        @if (Route::currentRouteName() == 'projects')
        <a href="/projects/{{ $project->id }}/environments/<%- id %>"><%- name %></a>
        @else
        <%- name %>
        @endif
        </td>
        <td><% if (default_on) { %>{{ trans('app.yes') }}<% } else { %>{{ trans('app.no') }}<% } %></td>
        <td><%- server_count %> <i class="fixhub fixhub-server server-names" data-html="true" data-toggle="tooltip" data-placement="right" title="<%- server_names %>"></i></td>
        <td><span class="text-<%- label_class %>"><i class="fixhub fixhub-<%-icon_class %>"></i> <span><%- label %></span></td>
        <td><%- last_run %></td>
        <td><%- description %></td>
        <td>
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-default btn-edit" title="{{ trans('environments.edit') }}" data-toggle="modal" data-backdrop="static" data-target="#environment"><i class="fixhub fixhub-edit"></i></button>
                <button type="button" class="btn btn-danger btn-delete" title="{{ trans('environments.delete') }}" data-toggle="modal" data-backdrop="static" data-target="#model-trash"><i class="fixhub fixhub-delete"></i></button>
            </div>
        </td>
    </script>
@endpush
