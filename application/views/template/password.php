<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Password
    </h2>
</div>

<?php $prefix = $this->uri->segment(1) == 'admin' ? 'administrator_' : 'member_' ?>

<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5">
            <div class="relative flex items-center p-5">
                <div class="w-12 h-12 image-fit">
                    <img class="rounded-full" src="<?php echo base_url('assets/img/user.png') ?>">
                </div>
                <div class="ml-4 mr-auto">
                    <div class="font-medium text-base"><?php echo $user[$prefix.'name'] ?></div>
                    <div class="text-slate-500"><?php echo $user[$prefix.'email'] ?></div>
                </div>
            </div>
            <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400 flex">
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->

    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <!-- BEGIN: Change Password -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Change Password
                </h2>
            </div>
            <div class="p-5">
                <form method="post">
                    <div class="mt-1">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="password" name="<?php echo $prefix ?>password">
                        <div class="text-danger small ml-2 mt-1"><?php echo form_error($prefix.'password') ?></div>
                    </div>

                    <div class="mt-3 mb-4">
                        <label for="password-confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="password-confirmation" name="password_confirmation">
                        <div class="text-danger small ml-2 mt-1"><?php echo form_error('password_confirmation') ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Change Password</button>
                </form>
            </div>
        </div>
        <!-- END: Change Password -->
    </div>
</div>