<footer class="footer navfooter position-fixed z-index-3 bottom-0 w-100 bg-white shadow-lg p-2 pt-3 ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">

            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-around">
                    <li class="nav-item">
                    <i class="fas fa-home fs-3 cursor-pointer {{ Route::currentRouteName() == 'store' ? 'text-primary' : '' }}"></i>
                    </li>
                    <li class="nav-item">
                    <i class="fas fa-cart-plus fs-3 cursor-pointer"></i>

                    </li>

                </ul>
            </div>
        </div>
    </div>
</footer>