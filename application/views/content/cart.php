<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Cart Details
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="<?php echo base_url('cart/clear') ?>" class="btn btn-danger btn-del shadow-md mr-2">Clear Cart</a>
        <a href="<?php echo base_url('home') ?>" class="btn btn-primary shadow-md mr-2">Continue Shopping</a>
    </div>
</div>

<div class="intro-y grid grid-cols-11 gap-5 mt-5">
    <div class="col-span-12 lg:col-span-12 2xl:col-span-8">
        <div class="box p-5 rounded-md">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Order Details</div>
                <a href="<?php echo base_url('checkout') ?>" class="flex items-center ml-auto btn btn-primary shadow-md mr-2"><i data-lucide="activity" class="w-4 h-4 mr-2"></i>CHECKOUT</a>
            </div>
            <div class="overflow-auto lg:overflow-visible -mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">
                                <input class="form-check-input" type="checkbox" disabled>
                            </th>
                            <th class="whitespace-nowrap !py-5">Product</th>
                            <th class="whitespace-nowrap text-right">Size</th>
                            <th class="whitespace-nowrap text-right">Price</th>
                            <th class="whitespace-nowrap text-right">Qty</th>
                            <th class="whitespace-nowrap text-right">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0 ?>
                        <?php foreach ($product as $key => $value): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('cart/delete/'.$value['cart_id']) ?>" class="btn-del text-danger">
                                        <i data-lucide="trash-2"></i>
                                    </a>
                                </td>
                                <td class="!py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <img class="rounded-lg border-2 border-white shadow-md" src="<?php echo base_url('assets/img/product/'.$value['product_image']) ?>">
                                        </div>
                                        <a href="<?php echo base_url('product/detail/'.$value['product_id']) ?>" class="font-medium whitespace-nowrap ml-4">
                                            <?php echo $value['product_name'] ?> <br> <?php echo $value['category_name'] ?>
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right"><?php echo $value['size_name'] ?></td>
                                <td class="text-right">Rp. <?php echo number_format($value['product_price'], 0, ',', '.') ?>,-</td>
                                <td class="text-right"><?php echo $value['cart_qty'] ?></td>
                                <td class="text-right">Rp. <?php echo number_format($value['product_price']*$value['cart_qty'], 0, ',', '.') ?>,-</td>
                            </tr>
                            <?php $total += $value['product_price']*$value['cart_qty'] ?>
                        <?php endforeach ?>
                        <tr>
                            <td colspan="5" class="text-center"><strong>Total</strong></td>
                            <td class="text-right"><strong>Rp. <?php echo number_format($total, 0, ',', '.') ?>,-</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>