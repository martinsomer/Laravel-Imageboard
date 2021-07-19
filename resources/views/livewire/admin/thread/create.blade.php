<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Thread') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.thread.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Thread')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
            
            <!-- Subject Input -->
            <div class='form-group'>
                <label for='inputsubject' class='col-sm-2 control-label'> {{ __('Subject') }}</label>
                <input type='text' wire:model.lazy='subject' class="form-control @error('subject') is-invalid @enderror" id='inputsubject'>
                @error('subject') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Comment Input -->
            <div class='form-group'>
                <label for='inputcomment' class='col-sm-2 control-label'> {{ __('Comment') }}</label>
                <textarea wire:model.lazy='comment' class="form-control @error('comment') is-invalid @enderror"></textarea>
                @error('comment') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Board_id Input -->
            <div class='form-group'>
                <label for='inputboard_id' class='col-sm-2 control-label'> {{ __('Board_id') }}</label>
                <select wire:model='board_id' class="form-control @error('board_id') is-invalid @enderror" id='inputboard_id'>
                @foreach(config('easy_panel.crud.thread.fields.board_id')['select'] as $key => $value)
                    <option value='{{ $key }}'>{{ $value }}</option>
                @endforeach
            </select>
                @error('board_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.thread.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
