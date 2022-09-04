<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">Home </span></a>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Category::count()}} </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.categories')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.categories.create')}}"
                           data-i18n="nav.dash.crypto">أضافة
                            قسم جديد </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">التصنيفات  </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\section::count()}} </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.sections')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.sections.create')}}"
                           data-i18n="nav.dash.crypto">أضافة
                            قسم جديد </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الماركات  </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Brand::count()}} </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.brands')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.brands.create')}}"
                           data-i18n="nav.dash.crypto">أضافة
                            قسم جديد </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات  </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Product::count()}} </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.products')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.products.create')}}"
                           data-i18n="nav.dash.crypto">أضافة
                            منتج جديد </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">العملاء </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\User::count()}} </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.show_users')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.users.create')}}"
                           data-i18n="nav.dash.crypto">أضافة
                             عميل </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الفواتير </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Invoice::count()}} </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.invoice')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.invoice.create')}}"
                           data-i18n="nav.dash.crypto">أضافة
                            فاتوره </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">دفعات العميل </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Payment::count()}} </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.payments')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.payments.create')}}"
                           data-i18n="nav.dash.crypto">أضافة
                            دفعه </a>
                    </li>
                </ul>
            </li>




        </ul>
        </li>







        <!--  the start-->


        <!--the end -->

        </ul>
    </div>
</div>
