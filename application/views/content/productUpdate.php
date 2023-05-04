<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Product
    </h2>
</div>

<div class="grid grid-cols-12 gap-x-5">
    <div class="col-span-12 2xl:col-span-9">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base py-5 mr-auto">
                    Update Product
                </h2>
            </div>
            <div class="p-5">
                <form method="post" enctype="multipart/form-data">
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-12 2xl:col-span-9">
                            <div class="flex flex-col-reverse xl:flex-row flex-col">
                                <div class="flex-1 mt-6 xl:mt-0">
                                    <div class="grid grid-cols-12 gap-x-5 mt-3">
                                        <div class="col-span-12 2xl:col-span-4">
                                            <label for="product-code" class="form-label ml-2">Product Code</label>
                                            <input id="product-code" type="text" class="form-control" name="product_code" placeholder="Product Code" value="<?php echo $product['product_code'] ?>">
                                            <div class="text-danger small ml-2 mt-1"><?php echo form_error('product_code') ?></div>
                                        </div>
                                        <div class="col-span-12 2xl:col-span-8">
                                            <label for="product-name" class="form-label ml-2">Product Name</label>
                                            <input id="product-name" type="text" class="form-control" name="product_name" placeholder="Product Name" value="<?php echo $product['product_name'] ?>">
                                            <div class="text-danger small ml-2 mt-1"><?php echo form_error('product_name') ?></div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 gap-x-5 mt-3">
                                        <div class="col-span-12 2xl:col-span-4">
                                            <label for="categori-id" class="form-label ml-2">Category</label>
                                            <select id="categori-id" class="form-control" name="category_id">
                                                <option disabled selected>Select Category</option>
                                                <?php foreach ($category as $key => $value): ?>
                                                    <option value="<?php echo $value['category_id'] ?>" <?php echo $product['category_id'] == $value['category_id'] ? 'selected="selected"' : '' ?>>
                                                        <?php echo $value['category_name'] ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="text-danger small ml-2 mt-1"><?php echo form_error('category_id') ?></div>
                                        </div>
                                        <div class="col-span-12 2xl:col-span-4">
                                            <label for="product-price" class="form-label ml-2">Product Price</label>
                                            <input id="product-price" type="text" class="form-control" name="product_price" placeholder="Product Price" value="<?php echo $product['product_price'] ?>">
                                            <div class="text-danger small ml-2 mt-1"><?php echo form_error('product_price') ?></div>
                                        </div>
                                        <div class="col-span-12 2xl:col-span-4">
                                            <label for="product-image" class="form-label ml-2">Change Product Image</label>
                                            <input id="product-image" type="file" class="form-control mt-2" name="product_image">
                                            <div class="text-danger small ml-2 mt-1"><?php echo form_error('product_image') ?></div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 gap-x-5 mt-3">
                                        <div class="col-span-12 2xl:col-span-12">
                                            <label for="product-description" class="form-label ml-2">Product Description</label>
                                            <textarea id="product-description" class="form-control" name="product_description" placeholder="Product Description"><?php echo $product['product_description'] ?></textarea>
                                            <div class="text-danger small ml-2 mt-1"><?php echo form_error('product_description') ?></div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="btn btn-primary w-20 mt-5">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 2xl:col-span-3">
                            <div class="w-52 mx-auto xl:mr-0 xl:ml-6 mt-10">
                                <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                        <img class="rounded-md" src="<?php echo base_url('assets/img/product/'.$product['product_image']) ?>">
                                    </div>
                                    <div class="mx-auto text-center mt-5">
                                        <strong>Product Image</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>