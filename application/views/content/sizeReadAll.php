<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Size
    </h2>
</div>

<div class="grid grid-cols-12 gap-x-5">
	<div class="col-span-12 2xl:col-span-6">
		<div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
			<div class="hidden xl:block mx-auto text-slate-500"></div>
			<div class="w-full xl:w-auto flex flex-wrap xl:flex-nowrap items-center gap-y-3 mt-3 xl:mt-0">
				<a href="<?php echo base_url('admin/size/create') ?>" class="btn btn-primary shadow-md mr-2">
					<i data-lucide="plus" class="w-4 h-4"></i>
				</a>
			</div>
		</div>
		<div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
			<table class="table table-report -mt-2">
				<thead>
					<tr>
						<th class="whitespace-nowrap">No.</th>
						<th class="whitespace-nowrap">Category</th>
						<th class="whitespace-nowrap">Size Name</th>
						<th class="text-center whitespace-nowrap">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($size as $key => $value): ?>
						<tr class="intro-x">
							<td class="w-10"><?php echo $key+1 ?>.</td>
							<td class="whitespace-nowrap"><?php echo $value['category_name'] ?></td>
							<td class="whitespace-nowrap"><?php echo $value['size_name'] ?></td>
							<td class="table-report__action w-56">
								<div class="flex justify-center items-center">
									<a class="flex items-center mr-3" href="<?php echo base_url('admin/size/update/'.$value['size_id']) ?>">
										<i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit
									</a>
									<a class="flex items-center text-danger btn-del" href="<?php echo base_url('admin/size/delete/'.$value['size_id']) ?>">
										<i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
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