<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Invoice Detail
    </h2>
</div>

<div class="intro-y box overflow-hidden mt-5">
    <div class="border-b border-slate-200/60 dark:border-darkmode-400 text-center sm:text-left">
        <div class="flex flex-col lg:flex-row pt-10 px-5 sm:px-20 sm:pt-20 lg:pb-20 text-center sm:text-left">
            <div>
                <div class="text-primary font-semibold text-3xl">INVOICE</div>
                <div class="mt-2">Receipt <span class="font-medium">#<?php echo $order['order_code'] ?></span></div>
                <div class="mt-1"><?php echo $order['order_datetime'] ?></div>                
            </div>
            <div class="mt-20 lg:mt-0 lg:ml-auto lg:text-right">
                <div class="text-base text-slate-500">Pengirim</div>
                <div class="text-xl text-primary font-medium">Dunia Coding Store</div>
                <div class="mt-1">duniacodingstore@gmail.com</div>
                <div class="mt-1">Depok, Sleman. DIY. 55282.</div>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row border-b px-5 sm:px-20 pt-10 pb-10 sm:pb-20 text-center sm:text-left">
            <div>
                <div class="text-base text-slate-500">Penerima</div>
                <div class="text-lg font-medium text-primary mt-2"><?php echo $order['destination_name'] ?></div>
                <div class="mt-1">
                    <?php echo $order['destination_email'] ?> - <?php echo $order['destination_contact'] ?>
                </div>
                <div class="mt-1">
                    <?php echo $order['destination_address'] ?>. <?php echo $order['destination_city'] ?>. <br>
                    <?php echo $order['destination_postal_code'] ?>
                </div>
            </div>
            <div class="lg:text-right mt-10 lg:mt-0 lg:ml-auto">
                <div class="text-base text-slate-500">Pemesan</div>
                <div class="text-lg font-medium text-primary mt-2"><?php echo $order['member_name'] ?></div>
                <div class="mt-1"><?php echo $order['member_email'] ?> - <?php echo $order['member_contact'] ?></div>
            </div>
        </div>
    </div>
    <div class="px-5 sm:px-16 py-10 sm:py-20">
        <div class="overflow-x-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap !py-5">Product</th>
                        <th class="whitespace-nowrap text-right">Size</th>
                        <th class="whitespace-nowrap text-right">Price</th>
                        <th class="whitespace-nowrap text-right">Qty</th>
                        <th class="whitespace-nowrap text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order['product'] as $key => $value): ?>
                        <tr>
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
                            <td class="text-right">Rp. <?php echo number_format($value['order_product_price'], 0, ',', '.') ?>,-</td>
                            <td class="text-right"><?php echo $value['order_product_qty'] ?></td>
                            <td class="text-right">Rp. <?php echo number_format($value['order_product_price']*$value['order_product_qty'], 0, ',', '.') ?>,-</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
        <div class="text-center sm:text-left mt-10 sm:mt-0">
            <div class="text-base text-slate-500">Payment Method</div>
            <div class="text-lg text-primary font-medium mt-2"><?php echo $order['order_payment'] ?></div>
            <div>
                <?php if ($order['order_status'] == 'pending'): ?>
                    <img class="mt-2" src="<?php echo base_url('assets/img/pending.jpg') ?>" width="120">
                <?php elseif ($order['order_status'] == 'cancelled'): ?>
                <?php else: ?>
                    <img class="mt-2" src="<?php echo base_url('assets/img/paid.jpg') ?>" width="120">
                <?php endif ?>
            </div>
        </div>
        <div class="text-center sm:text-right sm:ml-auto">
            <div class="text-base text-slate-500">Total Amount</div>
            <div class="text-xl text-primary font-medium mt-2">
                Rp. <?php echo number_format($order['order_total'], 0, ',', '.') ?>,-
            </div>
        </div>
    </div>
</div>