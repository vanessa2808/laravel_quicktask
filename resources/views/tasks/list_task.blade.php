@section('content')
    @extends('tasks.layouts.master')
@section('title', 'admin')

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>
            <span class="custom-checkbox">
                <input type="checkbox" id="selectAll">
                <label for="selectAll"></label>
            </span>
        </th>
        <th>@lang('messages.list_table.id')</th>
        <th>@lang('messages.list_table.user_name')</th>
        <th>@lang('messages.list_table.task_name')</th>
        <th>@lang('messages.list_table.description')</th>
        <th>@lang('messages.list_table.created_at')</th>
        <th>@lang('messages.list_table.updated_at')</th>
        <th>@lang('messages.list_table.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list_tasks as $key => $tasks)
        <tr>
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                </span>
            </td>
            <td>{{$key+1}}</td>
            <td>{{$tasks->user->name}}</td>
            <td>{{$tasks->name}}</td>
            <td>{{$tasks->description}}</td>
            <td>{{$tasks->created_at}}</td>
            <td>{{$tasks->updated_at}}</td>
            <td>
                <a href="{{route('tasks.edit_task',['id'=>$tasks->id])}}" class="edit" data-toggle="modal"><i
                        class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                <a href="{{route('tasks.destroy',['id'=>$tasks->id])}}" class="delete"><i class="material-icons"
                                                                                          data-toggle="tooltip"
                                                                                          title="Delete">&#xE872;</i></a>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection
