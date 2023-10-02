<ul class="nav" id="side-menu">
    <li>
        <a href="#"><i class="fa fa-th-large fa-fw"></i> Thương hiệu<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.brand.index') }}">Danh sách thương hiệu</a>
            </li>
            <li>
                <a href="{{ route('admin.brand.create') }}">Thêm thương hiệu</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-list fa-fw"></i> Thể loại<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.category.index') }}">Danh sách thể loại</a>
            </li>
            <li>
                <a href="{{ route('admin.category.create') }}">Thêm thể loại</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-tachometer fa-fw"></i> Trang chủ<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.dashboard.revenue-by-day') }}">Doanh thu</a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard.export-by-day') }}">Bán hàng</a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard.order-by-day') }}">Đơn hàng</a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard.user-by-day') }}">Người dùng</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-money fa-fw"></i> Mã giảm giá<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.discount.index') }}">Danh sách mã giảm giá</a>
            </li>
            <li>
                <a href="{{ route('admin.discount.create') }}">Thêm mã giảm giá</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-paper-plane-o fa-fw"></i> Mail<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.mail.index') }}">Đăng ký thành viên</a>
                <a href="{{ route('admin.mail.mail') }}">Gửi</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Đơn hàng<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.order-detail.index') }}">Danh sách đơn hàng</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-credit-card fa-fw"></i> Thanh toán<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.payment.index') }}">Danh sách thanh toán</a>
            </li>
            <li>
                <a href="{{ route('admin.payment.create') }}">Thêm thanh toán</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-cube fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.product.index') }}">Danh sách sản phẩm</a>
            </li>
            <li>
                <a href="{{ route('admin.product.create') }}">Thêm sản phẩm</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-list fa-fw"></i> Chi tiết sản phẩm<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.product-detail.index') }}">Danh sách chi tiết sản phẩm</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-file-image-o fa-fw"></i> Slide<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.slide.index') }}">Danh sách slide</a>
            </li>
            <li>
                <a href="{{ route('admin.slide.create') }}">Thêm slide</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-users fa-fw"></i> Người dùng<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.user.index') }}">Danh sách người dùng</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
</ul>
