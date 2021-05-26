<!DOCTYPE html>
<html lang="en">
@include("layouts.header")
<body>
    <div id="wrapper">
        @include('layouts.sidebar')
        @include('layouts.navbar')
        @yield('Content')

                
    </div>
                    <!-- End of Content Wrapper -->
                            <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        @include('layouts.model')
        @include('layouts.footer')


</body>
</html>