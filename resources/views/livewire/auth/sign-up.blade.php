  <section class="h-100-vh mb-8">
      <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://images.unsplash.com/photo-1556741533-974f8e62a92d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');">
          <span class="mask bg-gradient-dark opacity-6"></span>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-5 text-center mx-auto">
                      <h1 class="text-white mb-2 mt-5">{{ __('Bem vindo(a)!') }}</h1>
                      <p class="text-lead text-white">
                          {{ __('Cadastre-se com informações verdadeiras.') }}
                      </p>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="row mt-lg-n10 mt-md-n11 mt-n10">
              <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                  <div class="card z-index-0">
                      <div class="card-header text-center pt-4">
                          <h5>{{ __('Registre com suas credenciais') }}</h5>
                      </div>

                      <div class="card-body">

                          <form wire:submit.prevent="register" action="#" method="POST" role="form text-left">
                              <div class="mb-3">
                                  <div class="@error('name') border border-danger rounded-3  @enderror">
                                      <input wire:model="name" type="text" class="form-control" placeholder="Nome completo" aria-label="Name" aria-describedby="email-addon">
                                  </div>
                                  @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>

                              <div class="mb-3">
                                  <div class="@error('email') border border-danger rounded-3 @enderror">
                                      <input wire:model="email" type="email" class="form-control" placeholder="E-mail" aria-label="Email" aria-describedby="email-addon">
                                  </div>
                                  @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                              <div class="mb-3">
                                  <div class="@error('phone') border border-danger rounded-3  @enderror">
                                      <input wire:model="phone" type="number" class="form-control" placeholder="Telefone" aria-label="phone" aria-describedby="email-addon">
                                  </div>
                                  @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                              <div class="mb-3">
                                  <div class="@error('password') border border-danger rounded-3 @enderror">
                                      <input wire:model="password" type="password" class="form-control" placeholder="Senha" aria-label="Password" aria-describedby="password-addon">
                                  </div>
                                  @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                              <div class="form-check form-check-info text-left">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                      {{ __('Eu concordo com os') }} <a href="javascript:;" class="text-dark font-weight-bolder">{{ __('Termos
                                          &
                                          Condições')}} </a>{{__(' da plataforma')}}
                                  </label>
                              </div>
                              <div class="text-center">
                                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Registrar</button>
                              </div>
                              <p class="text-sm mt-3 mb-0">{{ __('Você já possui uma conta? ') }}<a href="{{ route('login') }}" class="text-dark font-weight-bolder">{{ __('Entrar') }}</a>
                              </p>
                          </form>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>