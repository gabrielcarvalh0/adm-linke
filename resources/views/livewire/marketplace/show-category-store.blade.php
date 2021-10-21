<div id="show-category-store">

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header justify-content-end px-4">
                <button type="button" class="btn-close text-black-50" data-bs-dismiss="toast" aria-label="Close">
                    <i class=" fas fa-times fs-4"></i>
                </button>

            </div>
            <div class="toast-body text-center">
                <strong class="me-2"></strong>
                <small><i class="fas fa-check-circle fs-4"></i></small>
            </div>
        </div>
    </div>

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
                <div class="col-auto d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-black p-2" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-arrow-left  fs-3 cursor-pointer"></i>
                    </a>
                </div>
                <div class="col-auto my-auto p-2">
                    <div class="h-100">
                        <h5 class="mb-0 fs-sm-2">
                            {{$allCategory->name}}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $business->category}}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="panel-products" class="container-fluid py-4">
        <div class="card">

            <div class="card-body pt-4 p-3">

                <div>
                    <form method="POST">
                        @csrf
                        <div class="row">
                            @foreach($allProducts as $product)
                            <div class="col-sm-6 col-md-2 col-lg-2 ">
                                <div class="sidenav-footer">
                                    <div class="card shadow-none border-bottom" id="sidenavCard">

                                        <div class=" d-flex text-center p-3 w-100 justify-content-evenly">
                                            <div class="w-100 text-center mb-3  d-flex align-items-center justify-content-center flex-column border-radius-md">
                                                <img src="{{asset('storage/'.$product->image)}}" class="avatar avatar-xl me-3">

                                                <div class="d-flex flex-row justify-content-evenly mt-4 w-100">
                                                    <!-- <button id="btn-remove" class="bg-white border border-2 w-20 rounded-circle flex-shrink-1">-</button>
                                                <input type="number" name="" value="0" class="w-25 text-center border border-2" id="add-{{$product->id}}">
                                                <button id="btn-add" class="bg-white border border-2 w-20 rounded-circle flex-shrink-1">+</button>
                                            -->
                                                    <div class="num-block skin-1">
                                                        <div class="num-in">
                                                            <span class="minus dis"></span>
                                                            <input name="qtd" type="number" class="in-num" readonly="">
                                                            <span class="plus"></span>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="docs-info w-50 p-2 d-flex  align-items-center justify-content-center flex-column">
                                                <h6 class="text-black up mb-2">{{$product->name}}</h6>
                                                <p class="text-black mb-2 text-sm">{{$product->description}}</p>
                                                <h6  class="text-black mb-2 ">R$  <span id="value-prod">{{$product->value}}</span>,00 </h6>

                                                <button class="btn btn-primary btn-sm w-100 mb-0 mt-2 px-2 text-xs">ADICIONAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="panel-card" class="container-fluid py-4">
        <div class="card">
            <div class="row">
                <div class="col-md-8 cart p-4">
                    <div class="title">
                        <div class="row">
                            <div class="col p-2 ps-4">
                                <h4 class="mb-0 fs-sm-2">Shopping Cart</h4>
                            </div>
                            <div  id="all-qts-item" class="col align-self-center text-right text-muted"></div>
                        </div>
                    </div>
                 
                    <div id="shopp-card" class="row border-top border-bottom">
                      
                    
                    
                    </div>
                  
                    <div class="back-to-shop p-2">
                        <a href="#">&leftarrow;
                        <span class="text-muted">Voltar a comprar</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 summary p-4 bg-gray-200">
                    <div class="p-2">
                        <h5 class="mb-0 fs-sm-2">Resumo</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div id="all-qts-item" class="col" style="padding-left:0;"></div>
                        <div class="col text-right">&euro; 132.00</div>
                    </div>
                    <form>
                        <p>SHIPPING</p>
                     
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL DO PEDIDO</div>
                        <div class="col text-right">&euro; 137.00</div>
                    </div> 
                    <button class="btn btn-primary">Finalizar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>