<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Member
    </h2>
</div>

<div class="grid grid-cols-12 gap-x-5 ml-3 mt-3">
	<div class="col-span-12 2xl:col-span-6">
		<div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
			<table class="table table-report -mt-2">
				<thead>
					<tr>
						<th class="whitespace-nowrap">No.</th>
						<th class="whitespace-nowrap">Name</th>
						<th class="whitespace-nowrap">Email</th>
						<th class="text-center whitespace-nowrap">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($member as $key => $value): ?>
						<tr class="intro-x">
							<td class="w-10"><?php echo $key+1 ?>.</td>
							<td class="whitespace-nowrap"><?php echo $value['member_name'] ?></td>
							<td class="whitespace-nowrap"><?php echo $value['member_email'] ?></td>
							<td class="table-report__action w-56">
								<div class="flex justify-center items-center">
									<a class="flex items-center text-blue-500 mr-3" href="<?php echo base_url('admin/member/detail/'.$value['member_id']) ?>">
										<i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview
									</a>
								</div>
							</td>
						</tr>						
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>