<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Product</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 md:col-span-4 lg:col-span-6 xl:col-span-4">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center">
            <div class="hidden xl:block text-slate-500">
                <h3 class="text-lg font-medium mt-1">Detail Product</h3>
            </div>
        </div>
        <div class="box mt-4 p-5">
            <div class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                <img class="rounded-md" src="<?php echo base_url('assets/img/product/'.$product['product_image']) ?>">
                <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                    <a href="<?php echo base_url('admin/product/detail/'.$product['product_id']) ?>" class="block font-medium text-base">
                        <?php echo $product['product_name'] ?>
                    </a>
                    <span class="text-white/90 text-xs mt-3"><?php echo $product['category_name'] ?></span>
                </div>
            </div>
            <div class="text-slate-600 dark:text-slate-500 mt-3">
                <div class="flex items-center">
                    <i data-lucide="hash" class="w-4 h-4 mr-1"></i>
                    Code:&nbsp;&nbsp;<strong><?php echo $product['product_code'] ?></strong>
                </div>
                <div class="flex items-center mt-2">
                    <i data-lucide="banknote" class="w-4 h-4 mr-1"></i>
                    Price:&nbsp;&nbsp;Rp. <?php echo number_format($product['product_price'], 0, ',', '.') ?>
                </div>
                <div class="flex items-center mt-2">
                    <i data-lucide="layers" class="w-4 h-4 mr-1"></i>
                    Stock:&nbsp;&nbsp;<strong><?php echo $product['product_stock'] ?></strong>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 md:col-span-4 lg:col-span-6 xl:col-span-4">
        <form method="post">
            <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center">
                <div class="hidden xl:block text-slate-500">
                    <h3 class="text-lg font-medium">Stock Product</h3>
                </div>
                <div class="w-full xl:w-auto flex flex-wrap xl:flex-nowrap items-center gap-y-3 ml-auto xl:mt-0">
                    <button type="submit" class="btn btn-primary shadow-md mr-2">
                        <i data-lucide="save" class="w-4 h-4 mr-2"></i> Submit
                    </button>
                </div>
            </div>
            <table class="table table-report">
                <?php foreach ($product['product_size'] as $key => $value): ?>
                    <tr class="intro-x">
                        <td class="w-5">
                            <label class="form-check-label mr-2" for="checkbox-<?php echo $key+1 ?>">
                                <strong><?php echo $value['size_name'] ?></strong>
                            </label>
                        </td>
                        <td class="whitespace-nowrap">
                            <div class="form-check form-switch">
                                <input id="checkbox-<?php echo $key+1 ?>" class="form-check-input" type="checkbox" name="id[]" value="<?php echo $value['product_size_id'] ?>" data-input="input-<?php echo $key+1 ?>">
                            </div>
                        </td>
                        <td class="whitespace-nowrap">
                            <input id="input-<?php echo $key+1 ?>" type="number" class="form-control" name="stock[]" placeholder="<?php echo $value['size_name'] ?>" value="<?php echo $value['product_size_stock'] == 0 ? '' : $value['product_size_stock'] ?>" disabled>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </form>
    </div>
</div>

<script>
    $('.form-check-input').on('change', function() {
        var input = $(this).data('input');

        if ($(this).is(':checked')) {
            $('#'+input).removeAttr('disabled');
            document.getElementById(input).focus();
        }
        else {
            $('#'+input).attr('disabled','disabled');
        }
    })
</script>