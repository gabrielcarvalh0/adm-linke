<div>
    <div>
        <div class="row">
            <div class="col-9 mx-auto">
                <div class="card card-body mt-4">
                    <form wire:submit.prevent="create" action="#" method="POST" role="form">
                        <h6 class="mb-0">Crie o link de sua loja</h6>
                        <p class="text-sm mb-0">Criar link</p>
                        <hr class="horizontal dark my-3">
                        <label for="projectName" class="form-label">Escreva o nome da sua loja</label>
                        <input wire:model="name" type="text" class="form-control" id="projectName" onfocus="focused(this)" onfocusout="defocused(this)">

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{route('product')}}">
                                <button type="button" name="button" class="btn btn-light m-0">Cancelar</button>
                            </a>
                            <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Criar link</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>