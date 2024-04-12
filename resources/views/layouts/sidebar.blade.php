<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Quản lý thư viện</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <li class="sidebar-item {{ Request::routeIs('user.index') ? 'active' : '' }}">
                <a class="sidebar-link " href="{{route('user.index')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Nhân viên</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::routeIs('author.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('author.index')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Tác giả</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::routeIs('category.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('category.index')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Thể loại sách</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::routeIs('book.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('book.index')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Sách</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::routeIs('borrowing-form.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('borrowing-form.index')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Phiếu mượn sách</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::routeIs('purchase-form.index') ? 'active' : '' }}">
                <a class="sidebar-link {{ Request::routeIs('purchase-form.index') ? 'active' : '' }}" href="{{route('purchase-form.index')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Phiếu mua sách</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
