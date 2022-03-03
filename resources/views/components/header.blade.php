<style>
    a[data-path^="{{ Request::path() }}"] {
        color: var(--bs-blue) !important;
    }

</style>
<header class="header-section sticky-header d-none d-lg-block section-fluid-200">
    <div class="header-wrapper">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <!-- Start Header Logo -->
                    <a href="{{ route('home') }}" class="header-logo">
                        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="" width="50">
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-auto d-flex align-items-center">
                    <!-- Start Header Menu -->
                    <ul class="header-nav">
                        @foreach ($pages as $page)
                            @if ($page->id !== 6)
                                <li class="has-dropdown">
                                    <a href="{{ route($page->slug->name) }}"
                                        data-path="{{ $page->slug->value }}">{{ $page->name }}</a>
                                    @if (count($page->subpages) > 1)
                                        <ul class="submenu">
                                            @foreach ($page->subpages as $subpage)
                                                <li>
                                                    <a
                                                        href="{{ route('details.subpage', $subpage->slug->value) }}">{{ $subpage->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <!-- End Header Menu -->
                </div>
                <div class="col-auto">
                    <div class="header-btn-link">
                        <a href="{{ route('devis') }}" class="btn btn-lg btn-default" data-path="blog">Obtenir un
                            devis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- .....:::::: End Header Section :::::.... -->


<!-- .....:::::: Start Mobile Header Section :::::.... -->
<div class="mobile-header d-block d-lg-none">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <div class="mobile-logo">
                    <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="K4Africa"
                            width="40"></a>
                </div>
            </div>
            <div class="col-auto">
                <div class="mobile-action-link text-end">
                    <a data-bs-toggle="offcanvas" href="#toggleMenu" role="button"><i
                            class="icofont-navigation-menu"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .....:::::: Start MobileHeader Section :::::.... -->

<!--  .....::::: Start Offcanvas Mobile Menu Section :::::.... -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="toggleMenu">
    <div class="offcanvas-header">
        <!-- Start Header Logo -->
        <!-- End Header Logo -->
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>
                        @foreach ($pages as $page)
                            @if ($page->id !== 6)
                                <li>
                                    <a href="{{ route($page->slug->name) }}"
                                        data-path="{{ $page->slug->value }}">{{ $page->name }}</a>
                                    @if (count($page->subpages) > 1)
                                        <ul class="mobile-sub-menu">
                                            @foreach ($page->subpages as $subpage)
                                                <li>
                                                    <a
                                                        href="{{ route('details.subpage', $subpage->slug->value) }}">{{ $subpage->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div> <!-- End Mobile Menu Nav -->
                <div class="col-auto">
                    <div class="header-btn-link">
                        <a href="{{ route('devis') }}" class="btn btn-lg btn-default">Obtenir un devis</a>
                    </div>
                </div>
            </div> <!-- End Mobile Menu -->

        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div>
</div>
<!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
