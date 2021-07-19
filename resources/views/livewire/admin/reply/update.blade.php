<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Reply') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.reply.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Reply')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

            
            <!-- Comment Input -->
            <div class='form-group'>
                <label for='inputcomment' class='col-sm-2 control-label'> {{ __('Comment') }}</label>
                <input type='text' wire:model.lazy='comment' class="form-control @error('comment') is-invalid @enderror" id='inputcomment'>
                @error('comment') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Thread_id Input -->
            <div class='form-group'>
                <label for='inputthread_id' class='col-sm-2 control-label'> {{ __('Thread_id') }}</label>
                <select wire:model='thread_id' class="form-control @error('thread_id') is-invalid @enderror" id='inputthread_id'>
                @foreach(config('easy_panel.crud.reply.fields.thread_id')['select'] as $key => $value)
                    <option value='{{ $key }}'>{{ $value }}</option>
                @endforeach
            </select>
                @error('thread_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.reply.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
