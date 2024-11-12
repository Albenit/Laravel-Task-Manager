@if (Illuminate\Support\Facades\Session::has('success'))
<div class="px-4 px-md-5">
    <div style="background: #DEF2D5 !important;border-radius: 8px !important;"
        class="alert alert-success alert-dismissible fade show my-3 px-3" role="alert">
        <div class="row g-0" style="background-color: rgb(222, 242, 213) !important;">
            <div class="col my-auto">
                <div style="font-weight: 600;color: #377449; background-color: rgb(222, 242, 213) !important">{!! Illuminate\Support\Facades\Session::get('success') !!}</div>

            </div>
            <div class="col-auto my-auto" style="background-color: rgb(222, 242, 213) !important;">
                <button style="border: none; background-color: rgb(222, 242, 213) !important;" type="button"
                    class="" data-bs-dismiss="alert" aria-label="Close">
                    <svg width="15" height="15" viewBox="0 0 15 15" style="background-color: rgb(222, 242, 213) !important"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.0498 1.00044L13.0498 13.0004" stroke="#434343" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12.9756 1L1.07376 13.0497" stroke="#434343" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endif
@if (Illuminate\Support\Facades\Session::has('fail'))
<div class="px-4 px-md-5">
    <div style="border-radius: 8px !important;"
        class="alert alert-danger alert-dismissible fade show my-3" role="alert">
        <div class="row g-0">
            <div class="col my-auto">
                <div style="font-weight: 600;color: #CB0C0C;">{!! Illuminate\Support\Facades\Session::get('fail') !!}</div>

            </div>
            <div class="col-auto my-auto">
                <button style="border: none; background-color: transparent;" type="button"
                    class="" data-bs-dismiss="alert" aria-label="Close">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.0498 1.00044L13.0498 13.0004" stroke="#434343" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12.9756 1L1.07376 13.0497" stroke="#434343" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endif
