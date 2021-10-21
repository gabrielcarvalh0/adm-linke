<div>
    <div>
        <div class="row">
            <div class="col-9 mx-auto">
                @if ($showSuccesNotification)
                <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text text-white">{{ __('Produto atualizado com sucesso!') }}</span>
                    <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif
                <div class="card card-body mt-4">
                    <form wire:submit.prevent="update({{$product->id}})" action="#" method="POST" role="form">
                        <h6 class="mb-0">Atualizar produto</h6>
                        <p class="text-sm mb-0">Atualizar esse produto</p>
                        <hr class="horizontal dark my-3">
                        <label for="projectName" class="form-label">Nome do produto</label>
                        @error('product.name') <span class="text-danger text-sm mb-0">{{ $message }}</span> @enderror
                        <input wire:model="product.name" type="text" class="form-control" id="projectName" onfocus="focused(this)" onfocusout="defocused(this)">

                        <label class="mt-4">Descrição</label>
                        <p class="form-text text-muted text-xs ms-1">
                            Faça uma breve descrição do produto
                        </p>
                        @error('product.description') <span class="text-danger text-sm mb-0">{{ $message }}</span> @enderror
                        <input wire:model="product.description" type="text" class="form-control" id="projectDesc" onfocus="focused(this)" onfocusout="defocused(this)">

                        <label class="mt-4">Valor</label>
                        <p class="form-text text-muted text-xs ms-1">
                            Coloque o valor desse produto
                        </p>
                        @error('product.value') <span class="text-danger text-sm mb-0">{{ $message }}</span> @enderror
                        <input wire:model="product.value" type="number" class="form-control" id="projectValue" onfocus="focused(this)" onfocusout="defocused(this)">


                        <label class="mt-4 form-label">Imagem</label>
                        <div>
                            <img src="{{asset('storage/'.$product->image)}}" class="avatar avatar-sm me-3">
                        </div>
                        <input type="file" wire:model="newimage" class="form-control">

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{route('product')}}">
                                <button type="button" name="button" class="btn btn-light m-0">Cancelar</button>
                            </a>
                            <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Atualizar produto</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>