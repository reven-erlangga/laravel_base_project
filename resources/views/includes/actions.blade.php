<div class="d-flex flex-row">
    <a href="{{ route("$edit", $model) }}" class="btn btn-warning text-light mx-2" data-turbolinks="false">
        <i class="fas fa-edit"></i>
    </a>
    <x-form-button :action="route($destroy, $model)" class="btn btn-danger mx-2" method="DELETE">
        <i class="fas fa-trash"></i>
    </x-form-button>
</div>