<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed">
    @include('backend.layouts.header')
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('backend.layouts.sidebar')
            <div class="layout-page">
                @include('backend.layouts.navbar')
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->
                    @include('backend.layouts.footer')
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
        </div>
    </div>
    @include('backend.layouts.script')

    @yield('viewJs')
</body>
</html>