<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Category
    </h2>
</div>

<div class="grid grid-cols-12 gap-x-5">
    <div class="col-span-12 2xl:col-span-6">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base py-5 mr-auto">
                    Update Category
                </h2>
            </div>
            <div class="p-5">
                <form method="post">
                    <div class="mt-3">
                        <label for="category-name" class="form-label ml-2">Category Name</label>
                        <input id="category-name" type="text" class="form-control" name="category_name" placeholder="Category Name" value="<?php echo $category['category_name'] ?>">
                        <div class="text-danger small ml-2 mt-1"><?php echo form_error('category_name') ?></div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary w-20 mt-5">Save</button>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>