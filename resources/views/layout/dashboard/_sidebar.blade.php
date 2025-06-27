<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title"
                                                                                       data-i18n="nav.dash.main">Dashboard</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="dashboard-ecommerce.html"
                           data-i18n="nav.dash.ecommerce">eCommerce</a>
                    </li>
                    <li><a class="menu-item" href="dashboard-crypto.html" data-i18n="nav.dash.crypto">Crypto</a>
                    </li>
                    <li class="active"><a class="menu-item" href="dashboard-sales.html"
                                          data-i18n="nav.dash.sales">Sales</a>
                    </li>
                </ul>
            </li>

            <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">Layouts</span><i class="la la-ellipsis-h ft-minus"
                                                                        data-toggle="tooltip"
                                                                        data-placement="right"
                                                                        data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item">
                <a href="{{route("dashboard.roles.index")}}"><i class="la la-columns"></i>
                    <span class="menu-title" data-i18n="nav.page_layouts.main">Roles</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route("dashboard.roles.index")}}" data-i18n="nav.page_layouts.1_column">Roles</a></li>
                    <li><a class="menu-item" href="{{route("dashboard.roles.create")}}" data-i18n="nav.page_layouts.2_columns">Create</a></li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="{{route("dashboard.admins.index")}}"><i class="la la-columns"></i>
                    <span class="menu-title" data-i18n="nav.page_layouts.main">Admins</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route("dashboard.admins.index")}}" data-i18n="nav.page_layouts.1_column">Admins</a></li>
                    <li><a class="menu-item" href="{{route("dashboard.admins.create")}}" data-i18n="nav.page_layouts.2_columns">Create</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
