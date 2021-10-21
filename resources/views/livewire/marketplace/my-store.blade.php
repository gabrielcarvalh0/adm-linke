<div id="my-store">

    <form wire:submit.prevent="update" action="#" method="POST" role="form text-left">
        @if ($showSuccesNotification)
        <div wire:model="showSuccesNotification" class="position-absolute z-index-1 right-0 mt-3 alert alert-primary alert-dismissible fade show" role="alert">
            <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
            <span class="alert-text text-white">{{ __('Informações alteradas com sucesso!') }}</span>
            <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>

        @endif

        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            @if ($newimage)
                            <img src="{{ $newimage->temporaryUrl() }}" alt="..." class="w-100 border-radius-lg shadow-sm">
                            @else
                            <img src="{{asset('storage/'.$business->image)}}" alt="..." class="w-100 border-radius-lg shadow-sm">
                            @endif
                            <input wire:model="newimage" type="file" hidden style="display: none;" id="input-update-photo" accept="image/*">
                            <a id="btn-update-photo" href="javascript:;" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                                <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $business->name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ $business->category}}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="d-flex justify-content-end">
                            <a href="../{{$link->link}}" class="btn bg-gradient-dark btn-md mt-4 mb-4">
                                Ver loja
                                <i class="fas fa-external-link-alt ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Meu negócio') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="business-name" class="form-control-label">{{ __('Nome da empresa') }}</label>
                                <div class="@error('business.name')border border-danger rounded-3 @enderror">
                                    <input wire:model="business.name" class="form-control" type="text" placeholder="Name" id="business-name">
                                </div>
                                @error('business.name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('E-mail') }}</label>
                                <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                    <input wire:model="user.email" class="form-control" type="email" placeholder="@example.com" id="user-email">
                                </div>
                                @error('user.email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label">{{ __('Telefone') }}</label>
                                <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                    <input wire:model="user.phone" class="form-control" type="tel" placeholder="40770888444" id="phone">
                                </div>
                                @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">{{ __('Onde voce está localizado') }}</label>
                                <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                    <input wire:model="user.location" class="form-control" type="text" placeholder="Location" id="name">
                                </div>
                                @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about">{{ 'Sobre meu negócio' }}</label>
                        <div class="@error('user.about')border border-danger rounded-3 @enderror">
                            <textarea wire:model="user.about" class="form-control" id="about" rows="3" placeholder="Say something about yourself"></textarea>
                        </div>
                        @error('user.about') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Salvar alterações' }}</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3 d-flex justify-content-between">
                    <h6 class="mb-0">{{ __('Suas categorias') }}</h6>
                    <div>
                        <a href="{{route('category')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Adcionar categoria</a>
                    </div>
                </div>

                <div class="card-body pt-4 p-3">



                    <div>
                        <div class="row">
                            @foreach($allCategory as $ctg)
                            <div class="col-sm-4 col-md-3">
                                <div class="sidenav-footer mx-3 mt-3 pt-3">
                                    <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
                                        <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpeg')">
                                        </div>
                                        <div class="card-body text-center p-3 w-100">
                                            <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                                                <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
                                            </div>
                                            <div class="docs-info">
                                                <h6 class="text-white up mb-2">{{$ctg->name}}</h6>
                                                <a href="mystore/{{$ctg->name}}" class="btn btn-white btn-sm w-100 mb-0">Abrir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>