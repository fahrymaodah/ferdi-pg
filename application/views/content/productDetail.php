<h2 class="text-lg font-medium mr-auto mt-8">
    Detail Product
</h2>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6">
        <div class="intro-y box news p-5">
            <h2 class="intro-y font-medium text-xl sm:text-2xl"><?php echo $product['product_name'] ?></h2>
            <div class="intro-y flex text-slate-600 dark:text-slate-500 mt-3 text-xs sm:text-sm">
                <a href="<?php echo base_url('category/'.$product['category_url']) ?>">
                    <?php echo $product['category_name'] ?>
                </a>
                <span class="mx-1">•</span>
                <a class="text-primary" href="<?php echo base_url('product/detail/'.$product['product_url']) ?>">
                    <?php echo $product['product_code'] ?>
                </a>
            </div>
            <div class="intro-y mt-3">
                <div class="news__preview image-fit">
                    <img class="rounded-md" src="<?php echo base_url('assets/img/product/'.$product['product_image']) ?>">
                </div>
            </div>
            <div class="intro-y flex relative pt-3 sm:pt-3 pb-3">
                <div class="mr-auto flex items-center">
                    <span class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full text-primary bg-primary/10 dark:bg-darkmode-300 dark:text-slate-300 ml-auto mr-1 sm:ml-0"><i data-lucide="layers" class=""></i></span>
                    <?php echo $product['product_stock'] ?>
                </div>
                <div class="flex items-center">
                    <span class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full text-primary bg-primary/10 dark:bg-darkmode-300 dark:text-slate-300 ml-auto mr-1 sm:ml-0"><i data-lucide="banknote" class=""></i></span>
                    Rp. <?php echo number_format($product['product_price'], 0, ',', '.') ?>,-                    
                </div>

            </div>
            <div class="intro-y text-justify leading-relaxed">
                <p class="mb-3"><?php echo $product['product_description'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-span-6 md:col-span-4 lg:col-span-4 xl:col-span-4">
        <div class="intro-y box news p-5">
            <h2 class="intro-y font-medium">Stock</h2>
            <table class="table text-xs mt-3">
                <thead class="table-light">
                    <tr>
                        <th class="whitespace-nowrap">Size</th>
                        <th class="whitespace-nowrap">Stock</th>
                        <th class="whitespace-nowrap">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product['product_size'] as $key => $value): ?>
                        <tr class="<?php echo $value['product_size_stock'] == 0 ? 'bg-danger/80 text-white' : '' ?>">
                            <td><?php echo $value['size_name'] ?></td>
                            <td><?php echo $value['product_size_stock'] ?></td>
                            <td><?php echo $value['size_description'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <form method="post" class="mt-3">
            <div class="flex items-center">
                <select class="form-select w-full mr-2 <?php echo form_error('product_size_id') ? 'border-danger' : '' ?>" name="product_size_id">
                    <option disabled selected>Size</option>
                    <?php foreach ($product['product_size'] as $key => $value): ?>
                        <option value="<?php echo $value['product_size_id'] ?>" <?php echo $value['product_size_stock'] == 0 ? 'class="bg-danger/80 text-white" disabled' : '' ?>  <?php echo set_select('product_size_id', $value['product_size_id']); ?>>
                            <?php echo $value['size_name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <input type="number" class="form-control <?php echo form_error('cart_qty') ? 'border-danger' : '' ?>" name="cart_qty" placeholder="Qty" value="<?php echo set_value('cart_qty') ?>">
            </div>
            <div class="flex justify-end mt-3">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </div>
        </form>
    </div>
</div>