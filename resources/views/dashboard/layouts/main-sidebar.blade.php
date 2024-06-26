<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Home-->
                    <li>
                        <a href="{{ route('admin.home') }}"><i class="ti-home"></i><span class="right-nav-text">الرئيسيه
                            </span></a>
                    </li>
                    <!-- menu item Categories-->
                    <li>
                        <a href="{{ route('admin.scooters.index') }}"><i class="fa-regular fa-rectangle-list"></i><span
                                class="right-nav-text">
                                قائمة السكوترات
                            </span> </a>
                    </li>
                    <!-- menu item Servies-->
                    <li>
                        <a href="{{ route('admin.services.index') }}"><i class="fa-solid fa-city"></i><span
                                class="right-nav-text"> قائمة الباقات
                            </span> </a>
                    </li>
                    <!-- menu item Contacts-->
                    {{-- <li>
                        <a href="{{ route('admin.contacts.index') }}"><i class="fas fa-comments"></i><span
                                class="right-nav-text"> قائمة الرسائل</span></a>
                    </li> --}}
                    <!-- menu item Orders-->
                    {{-- <li>
                        <a href="{{ route('admin.orders.index') }}"><i class="fa-solid fa-basket-shopping"></i><span
                                class="right-nav-text"> قائمة الطلبات</span></a>
                    </li> --}}
                    <!-- menu item Users-->
                    <li>
                        <a href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i><span
                                class="right-nav-text">
                                قائمة المستخدمين</span></a>
                    </li>
                    <!-- menu item Settings-->
                    {{-- <li>
                        <a href="{{ route('admin.settings.index') }}"><i class="fas fa-cogs"></i><span
                                class="right-nav-text">الاعدادات</span></a>
                    </li> --}}
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
