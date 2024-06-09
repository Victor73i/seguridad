@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.offline-page')
@endsection
@section('content')
    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <img src="https://img.themesbrand.com/velzon/images/auth-offline.gif" alt="" height="210">
                                    <h3 class="mt-4 fw-semibold">El sistema actualmente se encuentra modo Offline</h3>
                                    <p class="text-muted mb-4 fs-14">Nosotros no podemos darte actualmente lo que tu necesitas. Cuando regresemo a Online Refresca la pagina.</p>
                                    <button class="btn btn-success btn-border" onClick="window.location.href=window.location.href"><i class="ri-refresh-line align-bottom"></i> Refrescar la pagina</button>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->
    </div>
    <!-- end auth-page-wrapper -->
@endsection
@section('script')
@endsection