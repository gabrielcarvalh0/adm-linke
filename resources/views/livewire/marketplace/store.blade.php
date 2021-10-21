<div>

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

            <div class="card ">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{asset('storage/'.$business->image)}}" alt="..." class="w-100 border-radius-lg">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1 fs-sm-2">
                                {{ $business->name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ $business->category}}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="card">

                <div class="card-body pt-4 p-3">

                    <div>
                        <div class="row">
                            @foreach($allCategory as $ctg)
                            <div class="col-sm-6 col-md-2 col-lg-2 ">
                                <div class="sidenav-footer mx-3 mt-3 pt-3">
                                    <div class="card bg-secondary shadow-none card-background-mask-primary" id="sidenavCard">

                                        <div class="card-body text-center p-3 w-100">
                                            <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                                                <i class="ni ni-app text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
                                            </div>
                                            <div class="docs-info">
                                                <h6 class="text-white up mb-2">{{$ctg->name}}</h6>
                                                <a href="{{$business->name}}-{{$ctg->name}}" class="btn btn-white btn-sm w-100 mb-0">Abrir</a>
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