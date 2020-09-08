@section('content')
    @extends('tasks.layouts.master')
@section('title', 'admin')

<div class="modal-dialog">
    <div class="modal-content">
        <h2>@lang('messages.task_form.add_task_form')</h2>
        <form method="POST" action="tasks/add_task" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>@lang('messages.task_form.user')</label>
                <select class="form-control" id="user_id" name="user_id">
                    <option value="0">@lang('messages.task_form.assign_user')</option>
                    @foreach($list_users as $key => $users)
                        <option value="{{ $users->id }}">{{ $users->name }}</option>
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
                <input type="text" class="name" id="name" class="form-control">
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label>@lang('messages.task_form.description')</label>
                <input type="text" class="description" id="description" class="form-control">
            </div>
            @error('description')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="@lang('messages.task_form.add_task')">
            </div>
        </form>
    </div>
</div>
@endsection
