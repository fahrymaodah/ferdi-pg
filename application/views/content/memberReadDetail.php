<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Member
    </h2>
</div>

<div class="intro-y box px-5 pt-5 mt-5">
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                <img class="rounded-full" src="<?php echo base_url('assets/img/user.png') ?>">
                <div class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-white rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                    </svg>
                </div>
            </div>
            <div class="ml-5">
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                    <?php echo $member['member_name'] ?>
                </div>
                <div class="text-slate-500">Member</div>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                <div class="truncate sm:whitespace-normal flex items-center">
                    <i data-lucide="mail" class="mr-2"></i> <?php echo $member['member_email'] ?>
                </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3">
                    <i data-lucide="contact" class="mr-2"></i> <?php echo $member['member_contact'] ?>
                </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-success"> <i data-lucide="alert-circle" class="mr-2 text-success"></i> <b>Akun Terverifikasi </b></div>
            </div>
        </div>
    </div>
</div>

<div class="intro-y px-5 mt-5">
    <div class="hidden xl:block text-slate-500">
        <h3 class="text-lg font-medium mt-1">Order History</h3>
    </div>
    <table class="table table-report mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">No.</th>
                <th class="whitespace-nowrap">Order ID</th>
                <th class="whitespace-nowrap">Customer</th>
                <th class="whitespace-nowrap">Service</th>
                <th class="whitespace-nowrap">Bill</th>
                <th class="whitespace-nowrap">Status</th>
                <th class="whitespace-nowrap">Order Time</th>
                <th class="whitespace-nowrap text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order as $key => $value): ?>
                <tr class="intro-x">
                    <td class="w-10"><?php echo $key+1 ?>.</td>
                    <td class="whitespace-nowrap">
                        <a href="<?php echo base_url('admin/order/detail/'.$value['order_code']) ?>" class="underline decoration-dotted">
                            #<?php echo $value['order_code'] ?>
                        </a>
                    </td>
                    <td class="whitespace-nowrap">
                        <p class="font-medium whitespace-nowrap"><?php echo $value['member_name'] ?></p>
                    </td>
                    <td class="whitespace-nowrap">
                        <p class="whitespace-nowrap text-pending">
                            <i data-lucide="package" class="inline"></i> <?php echo $value['order_service'] ?>
                        </p>
                    </td>
                    <td class="whitespace-nowrap">
                        <p class="font-medium whitespace-nowrap">
                            Rp. <?php echo number_format($value['order_total'], 0, ',', '.') ?>
                        </p>
                    </td>
                    <td class="whitespace-nowrap">
                        <?php if ($value['order_status'] == 'pending'): ?>
                            <div class="flex items-center whitespace-nowrap text-gray-600"><b>PENDING</b></div>
                        <?php elseif ($value['order_status'] == 'paid'): ?>
                            <div class="flex items-center whitespace-nowrap text-success"><b>PAID</b></div>
                        <?php elseif ($value['order_status'] == 'packing'): ?>
                            <div class="flex items-center whitespace-nowrap text-blue-500"><b>PACKING</b></div>
                        <?php elseif ($value['order_status'] == 'sending'): ?>
                            <div class="flex items-center whitespace-nowrap text-pending"><b>SENDING</b></div>
                        <?php elseif ($value['order_status'] == 'completed'): ?>
                            <div class="flex items-center whitespace-nowrap text-success"><b>COMPLETED</b></div>
                        <?php elseif ($value['order_status'] == 'cancelled'): ?>
                            <div class="flex items-center whitespace-nowrap text-danger"><b>CANCELLED</b></div>
                        <?php else: ?>
                            <div class="flex items-center whitespace-nowrap"><b>NONE</b></div>
                        <?php endif ?>
                    </td>
                    <td class="whitespace-nowrap">
                        <p class="text-slate-500 whitespace-nowrap mt-0.5"><?php echo $value['order_datetime'] ?></p>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-blue-500 mr-3" href="<?php echo base_url('admin/order/detail/'.$value['order_code']) ?>">
                                <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>    
</div>