<nav class="sidebar sidebar-offcanvas border-right-lg" id="sidebar" style="padding-top: 8%;">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Options</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-book"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column">
                    <li><a class="nav-link" href="{{route('admin.addProduct')}}">Add product</a></li>
                    <li><a class="nav-link" href="{{route('product.view')}}">Product list</a></li>
{{--                    <li><a class="nav-link" href="{{route('admin.product-review')}}">Product review</a></li>--}}
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="menu-icon mdi mdi-human"></i>
                <span class="menu-title">Customers</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column">
                    <li> <a class="nav-link" href="{{route('admin.customer.list')}}">Customer list</a></li>
{{--                    <li> <a class="nav-link" href="{{route('admin.feedback')}}">Customer feedback</a></li>--}}
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#student-detail" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-book"></i>
                <span class="menu-title">Order - details</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="student-detail">
                <ul class="nav flex-column">
                    <li><a class="nav-link" href="{{route('admin.orders')}}">Purchased products</a></li>
                    <li><a class="nav-link" href="{{route('admin.download-order')}}">Download Order details</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
