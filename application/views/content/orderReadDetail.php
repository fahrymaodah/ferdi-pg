<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Order Detail
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="<?php echo base_url('admin/order/invoice/'.$order['order_code']) ?>" class="btn btn-primary shadow-md mr-2">
            <i data-lucide="clipboard" class="w-4 h-4 mr-2"></i> Invoice
        </a>
    </div>
</div>

<div class="intro-y grid grid-cols-12 gap-5 mt-5">
    <div class="col-span-12 lg:col-span-4 2xl:col-span-4">
        <div class="box p-5 rounded-md">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Transaction Details</div>
            </div>
            <div class="flex items-center">
                <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i>
                Invoice: <a href="" class="underline decoration-dotted ml-1">#<?php echo $order['order_code'] ?></a>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i>
                Purchase Date: <?php echo $order['order_datetime'] ?>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="alert-circle" class="w-4 h-4 text-slate-500 mr-2"></i>
                Transaction Status:
                <?php if ($order['order_status'] == 'pending'): ?>
                    <span class="bg-success/20 rounded px-2 ml-1 text-gray-600"><?php echo ucfirst($order['order_status']) ?></span>
                <?php elseif ($order['order_status'] == 'paid'): ?>
                    <span class="bg-success/20 rounded px-2 ml-1 text-success"><?php echo ucfirst($order['order_status']) ?></span>
                <?php elseif ($order['order_status'] == 'packing'): ?>
                    <span class="bg-success/20 rounded px-2 ml-1 text-blue-500"><?php echo ucfirst($order['order_status']) ?></span>
                <?php elseif ($order['order_status'] == 'sending'): ?>
                    <span class="bg-success/20 rounded px-2 ml-1 text-pending"><?php echo ucfirst($order['order_status']) ?></span>
                <?php elseif ($order['order_status'] == 'completed'): ?>
                    <span class="bg-success/20 rounded px-2 ml-1 text-success"><?php echo ucfirst($order['order_status']) ?></span>
                <?php elseif ($order['order_status'] == 'cancelled'): ?>
                    <span class="bg-success/20 rounded px-2 ml-1 text-danger"><?php echo ucfirst($order['order_status']) ?></span>
                <?php else: ?>
                    <span class="rounded px-2 ml-1"><b>NONE</b></span>
                <?php endif ?>
            </div>
        </div>
        <div class="box p-5 rounded-md mt-5">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Buyer Details</div>
            </div>
            <div class="flex items-center">
                <i data-lucide="user" class="w-4 h-4 text-slate-500 mr-2"></i>
                Name: <a href="<?php echo base_url('admin/member/detail/'.$order['member_id']) ?>" class="underline decoration-dotted ml-1"><?php echo $order['member_name'] ?></a>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="mail" class="w-4 h-4 text-slate-500 mr-2"></i>
                Email: <?php echo $order['member_email'] ?>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="phone" class="w-4 h-4 text-slate-500 mr-2"></i>
                Contact: <?php echo $order['member_contact'] ?>
            </div>
        </div>
        <div class="box p-5 rounded-md mt-5">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Payment Details</div>
            </div>
            <div class="flex items-center">
                <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i>
                Method: <div class="ml-auto"><?php echo $order['order_payment'] ?></div>
            </div>
            <div class="flex items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i>
                Price: <div class="ml-auto">Rp. <?php echo number_format($order['order_total'], 0, ',', '.') ?>,-</div>
            </div>
        </div>
        <div class="box p-5 rounded-md mt-5">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Shipping Information</div>
            </div>
            <div class="flex items-center">
                <i data-lucide="send" class="w-4 h-4 text-slate-500 mr-2"></i>
                Courier: <?php echo $order['order_service'] ?>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="send" class="w-4 h-4 text-slate-500 mr-2"></i>
                Tracking: <?php echo $order['destination_tracking'] ?>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="send" class="w-4 h-4 text-slate-500 mr-2"></i>
                Recipient: <?php echo $order['destination_name'] ?>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="send" class="w-4 h-4 text-slate-500 mr-2"></i>
                Contact: <?php echo $order['destination_contact'] ?>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="send" class="w-4 h-4 text-slate-500 mr-2"></i>
                Address: <?php echo $order['destination_address'] ?>. <?php echo $order['destination_city'] ?>. <?php echo $order['destination_postal_code'] ?>
            </div>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
        <div class="box p-5 rounded-md">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Order Details</div>
            </div>
            <div class="overflow-auto lg:overflow-visible -mt-3">
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
                                        <a href="<?php echo base_url('admin/product/detail/'.$value['product_id']) ?>" class="font-medium whitespace-nowrap ml-4">
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
        <?php if ($order['order_status'] == 'packing'): ?>
            <div class="mt-5">
                <div class="flex items-center border-slate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base truncate">Tracking Code</div>
                </div>
            </div>
            <form method="post">
                <div class="mt-3">
                    <input type="text" class="form-control" name="destination_tracking" placeholder="Tracking Code" value="<?php echo set_value('destination_tracking') ?>">
                    <div class="text-danger small ml-2 mt-1"><?php echo form_error('destination_tracking') ?></div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary w-20 mt-5">Submit</button>
                </div>
            </form>            
        <?php endif ?>
    </div>
</div>