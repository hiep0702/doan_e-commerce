<ul class="nav" id="side-menu">
    <li>
        <a href="#"><i class="fa fa-th-large fa-fw"></i> Brand<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.brand.index') }}">List Brand</a>
            </li>
            <li>
                <a href="{{ route('admin.brand.create') }}">Add Brand</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-list fa-fw"></i> Category<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.category.index') }}">List Category</a>
            </li>
            <li>
                <a href="{{ route('admin.category.create') }}">Add Category</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-tachometer fa-fw"></i> Dashboard<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.dashboard.revenue-by-day') }}">Revenue</a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard.export-by-day') }}">Sales</a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard.order-by-day') }}">Order</a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard.user-by-day') }}">User</a>
            </li>
            {{-- <li>
                <a href="{{ route('admin.dashboard.trending-product') }}">Trending Product</a>
            </li> --}}
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-money fa-fw"></i> Discount Code<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.discount.index') }}">List Discount Code</a>
            </li>
            <li>
                <a href="{{ route('admin.discount.create') }}">Add Discount Code</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-paper-plane-o fa-fw"></i> Mail<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.mail.index') }}">Subscribe Member</a>
                <a href="{{ route('admin.mail.mail') }}">Send Mail</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Order<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.order-detail.index') }}">List Order</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-credit-card fa-fw"></i> Payment<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.payment.index') }}">List Payment</a>
            </li>
            <li>
                <a href="{{ route('admin.payment.create') }}">Add Payment</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.product.index') }}">List Product</a>
            </li>
            <li>
                <a href="{{ route('admin.product.create') }}">Add Product</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-list fa-fw"></i> Product Detail<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.product-detail.index') }}">List Product Detail</a>
            </li>
            {{-- <li>
                <a href="{{route('admin.product-detail.create')}}">Add Product Detail</a>
            </li> --}}
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-file-image-o fa-fw"></i> Slide<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.slide.index') }}">List Slide</a>
            </li>
            <li>
                <a href="{{ route('admin.slide.create') }}">Add Slide</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.user.index') }}">List User</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
</ul>
