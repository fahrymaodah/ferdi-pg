<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Order History
    </h2>
</div>

<div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
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