<div>
    <div class="row">
        <div class="col-12">
            @if ($showSuccesNotification)
            <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                <span class="alert-text text-white">{{ __('Empresa bloqueada!') }}</span>
                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endif

            @if ($showSuccesNotificationUnlock)
            <div wire:model="showSuccesNotificationUnlock" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                <span class="alert-text text-white">{{ __('Empresa desbloqueada!') }}</span>
                <button wire:click="$set('showSuccesNotificationUnlock', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endif
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">

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

                                @foreach($business as $bus)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$bus->id}}</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="{{asset('storage/'.$bus->image)}}" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$bus->name}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$bus->description}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">R$ 20</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$bus->category}}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ date('d-m-Y', $bus->create_at)}}</span>
                                    </td>
                                    <td class="text-center">

                                        @if($businessAccess->where('link', $bus->name)->first())
                                        <a wire:click="unlock({{$bus->id}})">
                                            <span>
                                                <i class="cursor-pointer fas fa-unlock-alt text-secondary"></i>
                                            </span>
                                        </a>
                                        @else
                                        <a wire:click="block({{$bus->id}})">
                                            <span>
                                                <i class="cursor-pointer fas fa-ban text-secondary"></i>
                                            </span>
                                        </a>
                                        @endif

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