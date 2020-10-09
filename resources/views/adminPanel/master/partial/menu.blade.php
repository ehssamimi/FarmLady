<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class={{$main=="categories"?"active":""}}>
                    <a href="#categories">
                        <i class="iconsminds-shop-4"></i>
                        <span>دسته بندی</span>
                    </a>
                </li>
                <li class={{$main=="attributes"?"active":""}}>
                    <a href="#attributes">
                        <i class="iconsminds-shop-4"></i>
                        <span>ویژگی</span>
                    </a>
                </li>
                <li class={{$main=="dashboard"?"active":""}}>
                    <a href="#dashboard">
                        <i class="iconsminds-shop-4"></i>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li class={{$main=="products"?"active":""}}>
                    <a href="#products">
                        <i class="iconsminds-shop-4"></i>
                        <span>محصولات</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">
            <ul class="list-unstyled" data-link="dashboard">
                <li  class={{$sub=="default"?"active":""}}>
                    <a href="/">
                        <i class="simple-icon-rocket"></i> <span class="d-inline-block">Default</span>
                    </a>
                </li>

            </ul>

             <ul class="list-unstyled" data-link="categories">
                <li class={{$sub=="create-category"?"active":""}} >
                    <a href={{route("category.create")}}>
                        <i class="simple-icon-rocket"></i> <span class="d-inline-block">ایجاد دسته بندی </span>
                    </a>
                </li>
                <li class={{$sub=="list-categories"?"active":""}}>
                    <a href={{route("category.index")}}>
                        <i class="simple-icon-pie-chart"></i> <span class="d-inline-block">لیست دسته بندی ها </span>
                    </a>
                </li>

            </ul>
            <ul class="list-unstyled" data-link="attributes">
                <li class={{$sub=="create-attributes"?"active":""}} >
                    <a href={{route("attribute.create")}}>
                        <i class="simple-icon-rocket"></i> <span class="d-inline-block">ایجاد ویژگی </span>
                    </a>
                </li>
                <li class={{$sub=="list-attributes"?"active":""}}>
                    <a href={{route("attribute.index")}}>
                        <i class="simple-icon-pie-chart"></i> <span class="d-inline-block">لیست ویژگی ها </span>
                    </a>
                </li>

            </ul>

             <ul class="list-unstyled" data-link="products">
                <li class={{$sub=="create-products"?"active":""}} >
                    <a href={{route("product.create")}}>
                        <i class="simple-icon-rocket"></i> <span class="d-inline-block">ایجاد محصول </span>
                    </a>
                </li>
                <li class={{$sub=="list-products"?"active":""}}>
                    <a href={{route("product.index")}}>
                        <i class="simple-icon-pie-chart"></i> <span class="d-inline-block">لیست محصولات </span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled" data-link="menu" id="menuTypes">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseMenuTypes" aria-expanded="true"
                       aria-controls="collapseMenuTypes" class="rotate-arrow-icon">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Menu Types</span>
                    </a>
                    <div id="collapseMenuTypes" class="collapse show" data-parent="#menuTypes">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="Menu.Default.html">
                                    <i class="simple-icon-control-pause"></i> <span
                                        class="d-inline-block">Default</span>
                                </a>
                            </li>
                            <li>
                                <a href="Menu.Subhidden.html">
                                    <i class="simple-icon-arrow-left mi-subhidden"></i> <span
                                        class="d-inline-block">Subhidden</span>
                                </a>
                            </li>
                            <li>
                                <a href="Menu.Hidden.html">
                                    <i class="simple-icon-control-start mi-hidden"></i> <span
                                        class="d-inline-block">Hidden</span>
                                </a>
                            </li>
                            <li>
                                <a href="Menu.Mainhidden.html">
                                    <i class="simple-icon-control-rewind mi-hidden"></i> <span
                                        class="d-inline-block">Mainhidden</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel" aria-expanded="true"
                       aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Menu Levels</span>
                    </a>
                    <div id="collapseMenuLevel" class="collapse" data-parent="#menuTypes">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="#">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                            Level</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel2"
                                   aria-expanded="true" aria-controls="collapseMenuLevel2"
                                   class="rotate-arrow-icon collapsed">
                                    <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Another
                                            Level</span>
                                </a>
                                <div id="collapseMenuLevel2" class="collapse">
                                    <ul class="list-unstyled inner-level-menu">
                                        <li>
                                            <a href="#">
                                                <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                                        Level</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseMenuDetached" aria-expanded="true"
                       aria-controls="collapseMenuDetached" class="rotate-arrow-icon collapsed">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Detached</span>
                    </a>
                    <div id="collapseMenuDetached" class="collapse">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="#">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                            Level</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</div>
