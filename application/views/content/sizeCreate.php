<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Size
    </h2>
</div>

<div class="grid grid-cols-12 gap-x-5">
    <div class="col-span-12 2xl:col-span-6">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base py-5 mr-auto">
                    Create Size
                </h2>
            </div>
            <div class="p-5">
                <form method="post">
                    <div class="mt-3">
                        <label for="categori-id" class="form-label ml-2">Category</label>
                        <select id="categori-id" class="form-control" name="category_id">
                            <option disabled selected>Select Category</option>
                            <?php foreach ($category as $key => $value): ?>
                                <option value="<?php echo $value['category_id'] ?>" <?php echo set_select('category_id', $value['category_id'], FALSE) ?>>
                                    <?php echo $value['category_name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <div class="text-danger small ml-2 mt-1"><?php echo form_error('category_id') ?></div>
                    </div>
                    <div class="mt-3">
                        <label for="size-name" class="form-label ml-2">Size Name</label>
                        <input id="size-name" type="text" class="form-control" name="size_name" placeholder="Size Name" value="<?php echo set_value('size_name') ?>">
                        <div class="text-danger small ml-2 mt-1"><?php echo form_error('size_name') ?></div>
                    </div>
                    <div class="mt-3">
                        <label for="size-description" class="form-label ml-2">Size Description</label>
                        <input id="size-description" type="text" class="form-control" name="size_description" placeholder="Size Description" value="<?php echo set_value('size_description') ?>">
                        <div class="text-danger small ml-2 mt-1"><?php echo form_error('size_description') ?></div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary w-20 mt-5">Save</button>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>