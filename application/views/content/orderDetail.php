<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Order Detail
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <?php if ($order['order_status'] == 'pending'): ?>
            <button id="btn-payment" data-code="<?php echo $order['order_code'] ?>" class="btn btn-success text-white shadow-md mr-2">
                <i data-lucide="credit-card" class="w-4 h-4 mr-2"></i> Bayar
            </button>
        <?php elseif ($order['order_status'] == 'sending'): ?>
            <a href="<?php echo base_url('order/completed/'.$order['order_code']) ?>" class="btn btn-success btn-status text-white shadow-md mr-2">
                <i data-lucide="clipboard-check" class="w-4 h-4 mr-2"></i> Completed
            </a>
        <?php endif ?>
        <a href="<?php echo base_url('order/invoice/'.$order['order_code']) ?>" class="btn btn-primary shadow-md mr-2">
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
                Name: <a href="" class="underline decoration-dotted ml-1"><?php echo $order['member_name'] ?></a>
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
        <?php if ($order['order_status'] == 'pending'): ?>
            <a href="<?php echo base_url('order/cancelled/'.$order['order_code']) ?>" class="btn btn-danger btn-status shadow-md mt-5 float-right">
                <i data-lucide="x" class="w-4 h-4 mr-2"></i> Batalkan
            </a>
        <?php endif ?>
    </div>
</div>

<form id="payment-form" method="post" action="<?php echo base_url('snap/finish') ?>">
    <input type="hidden" name="result_type" id="result-type" value=""></div>
    <input type="hidden" name="result_data" id="result-data" value=""></div>
</form>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-kmbmTlxtNRFjaL3L"></script>

<script>
    $('#btn-payment').click(function(e) {
        e.preventDefault();
        $(this).attr("disabled", "disabled");

        var code = $(this).data('code');

        $.ajax({
            url: '<?php echo base_url('snap/token') ?>',
            data: 'code='+code,
            cache: false,
            success: function(token) {
                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, token) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(token));
                }

                snap.pay(token, {
                    onSuccess: function(result) {
                        changeResult('success', result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        $("#payment-form").submit();
                    }
                })
            }
        })
    })
</script>