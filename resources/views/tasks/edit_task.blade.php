@section('content')
    @extends('tasks.layouts.master')
@section('title', 'admin')

<div class="modal-dialog">
    <div class="modal-content">
        <h2>@lang('messages.edit_form.edit_task')</h2>
        <form method="POST" action="{{route('tasks.edit_task',['id'=>$task->id])}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>@lang('messages.task_form.user')</label>
                <select class="form-control" id="user_id" name="user_id">
                    <option value="{{$task->user->name}}">@lang('messages.task_form.assign_user')</option>
                    @foreach($list_users as $key => $users)
                        <option {{ $task->user_id == $users->id ? 'selected="selected"' : "" }} value="{{ $users->id }}">{{ $users->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('user_id')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label>@lang('messages.task_form.name')</label>
                <input type="text" class="name" id="name" value="{{$task->name}}" class="form-control">
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label>@lang('messages.task_form.description')</label>
                <input type="text" class="description" id="description" value="{{$task->description}}" class="form-control">
            </div>
            @error('description')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="@lang('messages.edit_form.edit_task')">
            </div>
        </form>
    </div>
</div>
@endsection
