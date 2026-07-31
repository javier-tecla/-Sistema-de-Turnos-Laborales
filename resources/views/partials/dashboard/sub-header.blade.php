<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <h1>Bienvenido, {{ auth()->user()->full_name }}</h1>
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                    <div>
                        <span class="badge bg-primary rounded-pill px-4 py-2 fs-6">
                            <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="me-1">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5
                                    1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" fill="currentColor" />
                            </svg>
                            {{ strtoupper(auth()->user()->getRoleNames()->first() ?? 'Sin rol') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="iq-header-img">
        <img src="{{ asset('images/dashboard/top-header.png') }}" alt="header"
            class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
        <img src="{{ asset('images/dashboard/top-header1.png') }}" alt="header"
            class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
        <img src="{{ asset('images/dashboard/top-header2.png') }}" alt="header"
            class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
        <img src="{{ asset('images/dashboard/top-header3.png') }}" alt="header"
            class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
        <img src="{{ asset('images/dashboard/top-header4.png') }}" alt="header"
            class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
        <img src="{{ asset('images/dashboard/top-header5.png') }}" alt="header"
            class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
    </div>
</div>
