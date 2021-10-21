<div>
    <div>
        <div class="row">
            <div class="col-9 mx-auto">
                @if ($showSuccesNotification)
                <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text text-white">{{ __('Categoria criada com sucesso!') }}</span>
                    <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif
                <div class="card card-body mt-4">
                    <form wire:submit.prevent="create" action="#" method="POST" role="form">
                        <h6 class="mb-0">Nova categoria</h6>
                        <p class="text-sm mb-0">Criar nova categoria</p>
                        <hr class="horizontal dark my-3">
                        <label for="projectName" class="form-label">Nome da categoria</label>
                        <input wire:model="name" type="text" class="form-control" id="projectName" onfocus="focused(this)" onfocusout="defocused(this)">

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{route('product')}}">
                                <button type="button" name="button" class="btn btn-light m-0">Cancelar</button>
                            </a>
                            <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Criar produto</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>