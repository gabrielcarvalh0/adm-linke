<div>
    <div class="row">
        <div class="col-12">
            @if ($showSuccesNotification)
            <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                <span class="alert-text text-white">{{ __('Produto deletado com sucesso!') }}</span>
                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endif
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Produtos cadastrados</h5>
                        </div>
                        <div>
                            <a href="{{route('category')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Adcionar categoria</a>
                        </div>

                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Imagem
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nome
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Descrição
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Valor
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Categoria
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Data criação
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($product as $allproduct)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$allproduct->id}}</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="{{asset('storage/'.$allproduct->image)}}" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$allproduct->name}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$allproduct->description}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">R$ {{$allproduct->value}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$allproduct->category}}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ date('d-m-Y', $allproduct->create_at)}}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="product-update/{{$allproduct->id}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>

                                        <a wire:click="delete({{$allproduct->id}})">
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>