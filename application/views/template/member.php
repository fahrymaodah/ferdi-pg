<nav class="side-nav">
    <ul>
        <li>
            <a href="<?php echo base_url('home') ?>" class="side-menu side-menu<?php echo $this->uri->segment(1) == '' || $this->uri->segment(1) == 'home' ? '--active' : '' ?>">
                <div class="side-menu__icon"><i data-lucide="home"></i></div>
                <div class="side-menu__title">Home</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu side-menu<?php echo $this->uri->segment(1) == 'category' ? '--active' : '' ?>">
                <div class="side-menu__icon"> <i data-lucide="layout-template"></i> </div>
                <div class="side-menu__title">
                    Category
                    <div class="side-menu__sub-icon <?php echo $this->uri->segment(1) == 'category' ? 'transform rotate-180' : '' ?>">
                        <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul class="<?php echo $this->uri->segment(1) == 'category' ? 'side-menu__sub-open' : '' ?>">
                <?php foreach (category() as $key => $value): ?>
                    <li>
                        <a href="<?php echo base_url('category/'.$value['category_url']) ?>" class="side-menu side-menu<?php echo $this->uri->segment(2) == $value['category_url'] ? '--active' : '' ?>">
                            <div class="side-menu__icon"> <i data-lucide="circle"></i> </div>
                            <div class="side-menu__title">
                                <?php echo $value['category_name'] ?>
                                <div class="side-menu__sub-icon transform rotate-180"> </div>
                            </div>
                        </a>
                    </li>                    
                <?php endforeach ?>
            </ul>
        </li>
        <li>
            <a href="<?php echo base_url('product') ?>" class="side-menu side-menu<?php echo $this->uri->segment(1) == 'product' ? '--active' : '' ?>">
                <div class="side-menu__icon"><i data-lucide="shopping-bag"></i></div>
                <div class="side-menu__title">Product</div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="<?php echo base_url('dashboard') ?>" class="side-menu side-menu<?php echo $this->uri->segment(1) == 'dashboard' ? '--active' : '' ?>">
                <div class="side-menu__icon"><i data-lucide="layout-dashboard"></i></div>
                <div class="side-menu__title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('order') ?>" class="side-menu side-menu<?php echo $this->uri->segment(1) == 'order' ? '--active' : '' ?>">
                <div class="side-menu__icon"><i data-lucide="history"></i></div>
                <div class="side-menu__title">Order History</div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
    </ul>
</nav>