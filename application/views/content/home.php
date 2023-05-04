<h2 class="text-lg font-medium mr-auto mt-8">Home</h2>

<div class="grid grid-cols-12 gap-6 mt-5">
    <?php foreach ($product as $key => $value): ?>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="">
                    <div class="h-40 2xl:h-56 image-fit rounded-t-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img class="rounded-md" src="<?php echo base_url('assets/img/product/'.$value['product_image']) ?>">
                        <?php if ($value['product_stock'] == 0): ?>
                            <span class="absolute top-0 bg-danger/50 text-white text-xs m-2 px-2 py-1 rounded z-10">
                                Out of Stock
                            </span>
                        <?php endif ?>
                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                            <a href="<?php echo base_url('product/detail/'.$value['product_url']) ?>" class="block font-medium text-base">
                                <?php echo $value['product_name'] ?>
                            </a>
                            <span class="text-white/90 text-xs mt-3"><?php echo $value['category_name'] ?></span>
                        </div>
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 px-3 py-2">
                        <div class="flex items-center">
                            <i data-lucide="hash" class="w-4 h-4 mr-1"></i>
                            Code:&nbsp;&nbsp;<strong><?php echo $value['product_code'] ?></strong>
                        </div>
                        <div class="flex items-center mt-2">
                            <i data-lucide="banknote" class="w-4 h-4 mr-1"></i>
                            Price:&nbsp;&nbsp;Rp. <?php echo number_format($value['product_price'], 0, ',', '.') ?>
                        </div>
                        <div class="flex items-center mt-2">
                            <i data-lucide="layers" class="w-4 h-4 mr-1"></i>
                            Stock:&nbsp;&nbsp;<strong><?php echo $value['product_stock'] ?></strong>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center lg:justify-end items-center px-3 py-2 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center bg-primary px-2 py-1 rounded text-white" href="<?php echo base_url('product/detail/'.$value['product_url']) ?>">
                        <i data-lucide="shopping-cart" class="w-5 h-5 mr-2"></i> Add to Cart
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>