<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Checkout Details
    </h2>
</div>

<?php $total = 0 ?>
<?php foreach ($product as $key => $value): ?>
    <?php $total += $value['product_price']*$value['cart_qty'] ?>
<?php endforeach ?>

<div class="intro-y grid grid-cols-12 gap-5 mt-5">
     <div class="col-span-12 lg:col-span-12 2xl:col-span-8">
         <div class="alert alert-primary show mb-2">
            Jumlah Transaksi Yang Harus Dibayar : <b>Rp. <?php echo number_format($total, 0, ',', '.') ?>,-</b>
        </div>
        <div class="post intro-y overflow-hidden box mt-5">
            <ul class="post__tabs nav nav-tabs flex-col sm:flex-row bg-slate-200 dark:bg-darkmode-800" role="tablist">
                <li id="customer-tab" class="nav-item">
                    <a href="javascript:;" class="nav-link py-4 active" data-tw-target="#customer" aria-controls="customer" aria-selected="active" role="tab">
                        <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Customer Details
                    </a>
                </li>
                <li id="shipping-tab" class="nav-item">
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#shipping" aria-controls="shipping" aria-selected="" role="tab">
                        <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Address Details
                    </a>
                </li>
            </ul>
            <form id="form" method="post">
                <div class="post__content tab-content">
                    <div id="customer" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="customer-tab">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Customer Information
                            </div>
                            <div class="mt-5">
                                <div class="mb-5">
                                    <label for="destination-name" class="form-label">Name <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="destination-name" name="destination_name" value="<?php echo set_value('destination_name') != '' ? set_value('destination_name') : $member['member_name'] ?>">
                                    <div class="text-danger small ml-2 mt-1"><?php echo form_error('destination_name') ?></div>
                                </div>
                                <div class="mb-5">
                                    <label for="destination-email" class="form-label">Email <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="destination-email" name="destination_email" value="<?php echo set_value('destination_email') != '' ? set_value('destination_email') : $member['member_email'] ?>">
                                    <div class="text-danger small ml-2 mt-1"><?php echo form_error('destination_email') ?></div>
                                </div>
                                <div class="mb-5">
                                    <label for="destination-contact" class="form-label">Contact <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="destination-contact" name="destination_contact" value="<?php echo set_value('destination_contact') != '' ? set_value('destination_contact') : $member['member_contact'] ?>">
                                    <div class="text-danger small ml-2 mt-1"><?php echo form_error('destination_contact') ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="shipping" class="tab-pane p-5" role="tabpanel" aria-labelledby="shipping-tab">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Address Information
                            </div>
                            <div class="mt-5">
                                <div class="mb-5">
                                    <label for="destination-provincy" class="form-label">Provincy <small class="text-danger">*</small></label>
                                    <select id="destination-provincy" name="destination_provincy" class="form-select"></select>
                                    <div class="text-danger small ml-2 mt-1"><?php echo form_error('destination_provincy') ?></div>
                                </div>
                                <div class="mb-5">
                                    <label for="destination-city" class="form-label">City <small class="text-danger">*</small></label>
                                    <select id="destination-city" name="destination_city" class="form-control"></select>
                                    <div class="text-danger small ml-2 mt-1"><?php echo form_error('destination_city') ?></div>
                                </div>
                                <div class="mb-5">
                                    <label for="destination-address" class="form-label">Address <small class="text-danger">*</small></label>
                                    <textarea class="form-control" id="destination-address" name="destination_address"><?php echo set_value('destination_address') ?></textarea>
                                    <div class="text-danger small ml-2 mt-1"><?php echo form_error('destination_address') ?></div>
                                </div>
                                <div class="mb-5">
                                    <label for="destination-postal-code" class="form-label">Postal Code <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="destination-postal-code" name="destination_postal_code" value="<?php echo set_value('destination_postal_code') ?>">
                                    <div class="text-danger small ml-2 mt-1"><?php echo form_error('destination_postal_code') ?></div>
                                </div>
                                <div class="mb-5">
                                    <label for="order-service" class="form-label">Delivery Service <small class="text-danger">*</small></label>
                                    <select id="order-service" name="order_service" class="form-control">
                                        <option disabled selected>Pilih Ekspedisi</option>
                                        <option value='JNE' <?php echo set_select('order_service', 'JNE', FALSE) ?>>JNE</option>
                                        <option value='J&T Express' <?php echo set_select('order_service', 'J&T Express', FALSE) ?>>J&T Express</option>
                                        <option value='SiCepat' <?php echo set_select('order_service', 'SiCepat', FALSE) ?>>Sicepat</option>
                                        <option value='ANTERAJA' <?php echo set_select('order_service', 'ANTERAJA', FALSE) ?>>Anteraja</option>
                                    </select>
                                    <div class="text-danger small ml-2 mt-1"><?php echo form_error('order_service') ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex p-5">
                    <a href="<?= site_url('cart') ?>" class="btn w-32 border-slate-300 dark:border-darkmode-400 text-slate-500">My Cart</a>
                    <button type="submit" class="btn btn-primary w-32 shadow-md ml-auto">Pay Order</button>
                </div>
            </form>
        </div>
     </div>
     <div class="col-span-12 lg:col-span-12 2xl:col-span-4">
         <div class="alert alert-primary show mb-2">
            Payment Information
        </div>
        <div class="box p-5 mt-5">
            <div class="flex">
                <div class="mr-auto">Subtotal</div>
                <div class="font-medium">Rp. <?php echo number_format($total, 0, ',', '.') ?></div>
            </div>
            <div class="flex mt-4">
                <div class="mr-auto">Discount</div>
                <div class="font-medium text-danger">Rp. 0</div>
            </div>
            <div class="flex mt-4">
                <div class="mr-auto">Tax</div>
                <div class="font-medium">Rp. 0</div>
            </div>
            <div class="flex mt-4 pt-4 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="mr-auto font-medium text-base">Total Charge</div>
                <div class="font-medium text-base"><strong>Rp. <?php echo number_format($total, 0, ',', '.') ?>,-</strong></div>
            </div>
        </div>
     </div>
</div>

<script>
    $(document).ready(function() {
        // Get data provinsi
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('rajaongkir/provinsi') ?>",
            success: function(result) {
                $("#destination-provincy").html(result);

                <?php if (set_value('destination_provincy') != ''): ?>
                    $("#destination-provincy").val('<?php echo set_value('destination_provincy') ?>');

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('rajaongkir/kota') ?>",
                        data: "id_provinsi="+<?php echo set_value('destination_provincy') ?>,
                        success: function(city) {
                            $("#destination-city").html(city);

                            <?php if (set_value('destination_city') != ''): ?>
                                $("#destination-city").val('<?php echo set_value('destination_city') ?>');
                            <?php endif ?>
                        }
                    });
                <?php endif ?>
            }
        });

        // Get data kota
        $("#destination-provincy").on("change", function() {
            var provinsi = $("option:selected", this).val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('rajaongkir/kota') ?>",
                data: "id_provinsi="+provinsi,
                success: function(result) { $("#destination-city").html(result); }
            });
        });

    })
</script>