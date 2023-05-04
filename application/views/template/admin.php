<nav class="side-nav">
    <ul>
        <li>
            <a href="<?php echo base_url('admin/dashboard') ?>" class="side-menu side-menu<?php echo $this->uri->segment(2) == 'dashboard' ? '--active' : '' ?>">
                <div class="side-menu__icon"><i data-lucide="layout-dashboard"></i></div>
                <div class="side-menu__title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/category') ?>" class="side-menu side-menu<?php echo $this->uri->segment(2) == 'category' ? '--active' : '' ?>">
                <div class="side-menu__icon"><i data-lucide="layout-grid"></i></div>
                <div class="side-menu__title">Category</div>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/size') ?>" class="side-menu side-menu<?php echo $this->uri->segment(2) == 'size' ? '--active' : '' ?>">
                <div class="side-menu__icon"><i data-lucide="layout-template"></i></div>
                <div class="side-menu__title">Size</div>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/product') ?>" class="side-menu side-menu<?php echo $this->uri->segment(2) == 'product' ? '--active' : '' ?>">
                <div class="side-menu__icon"><i data-lucide="shopping-bag"></i></div>
                <div class="side-menu__title">Product</div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="<?php echo base_url('admin/member') ?>" class="side-menu side-menu<?php echo $this->uri->segment(2) == 'member' ? '--active' : '' ?>">
                <div class="side-menu__icon"><i data-lucide="users"></i></div>
                <div class="side-menu__title">Customer</div>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/order') ?>" class="side-menu side-menu<?php echo $this->uri->segment(2) == 'order' ? '--active' : '' ?>">
                <div class="side-menu__icon"><i data-lucide="history"></i></div>
                <div class="side-menu__title">Order History</div>
            </a>
        </li>
    </ul>
</nav>