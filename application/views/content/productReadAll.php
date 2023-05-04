<h2 class="text-lg font-medium mr-auto mt-8">Product</h2>

<div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
    <div class="hidden xl:block mx-auto text-slate-500"></div>
    <div class="w-full xl:w-auto flex flex-wrap xl:flex-nowrap items-center gap-y-3 mt-3 xl:mt-0">
        <a href="<?php echo base_url('admin/product/create') ?>" class="btn btn-primary shadow-md mr-2">
            <i data-lucide="plus" class="w-4 h-4"></i> Add New Product
        </a>
    </div>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <?php foreach ($product as $key => $value): ?>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img class="rounded-md" src="<?php echo base_url('assets/img/product/'.$value['product_image']) ?>">
                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                            <a href="<?php echo base_url('admin/product/detail/'.$value['product_id']) ?>" class="block font-medium text-base">
                                <?php echo $value['product_name'] ?>
                            </a>
                            <span class="text-white/90 text-xs mt-3"><?php echo $value['category_name'] ?></span>
                        </div>
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
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
                <div class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-blue-500 mr-auto" href="<?php echo base_url('admin/product/detail/'.$value['product_id']) ?>">
                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview
                    </a>
                    <a class="flex items-center mr-3" href="<?php echo base_url('admin/product/update/'.$value['product_id']) ?>">
                        <i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit
                    </a>
                    <a class="flex items-center text-danger btn-del" href="<?php echo base_url('admin/product/delete/'.$value['product_id']) ?>">
                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>