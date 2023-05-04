<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Profile
    </h2>
</div>

<!-- BEGIN: Profile Info -->
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
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg"><?php echo $member['member_name'] ?></div>
                <div class="text-slate-500">Member</div>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                <div class="truncate sm:whitespace-normal flex items-center">
                    <i data-lucide="mail" class="w-4 h-4 mr-2"></i> <?php echo $member['member_email'] ?>
                </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3">
                    <i data-lucide="contact" class="w-4 h-4 mr-2"></i> <?php echo $member['member_contact'] ?>
                </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-success"> <i data-lucide="alert-circle" class="w-4 h-4 mr-2 text-success"></i> <b>Akun Terverifikasi </b></div>
            </div>
        </div>
    </div>
</div>
<!-- END: Profile Info -->

<div class="grid grid-cols-12 gap-x-5">
    <div class="col-span-12 2xl:col-span-6">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base py-5 mr-auto">
                    Update Profile
                </h2>
            </div>
            <div class="p-5">
                <form method="post">
                    <div class="mt-3">
                        <label for="profile-name" class="form-label ml-2">Full Name</label>
                        <input id="profile-name" type="text" class="form-control" name="member_name" placeholder="Full Name" value="<?php echo $member['member_name'] ?>">
                        <div class="text-danger small ml-2 mt-1"><?php echo form_error('member_name') ?></div>
                    </div>
                    <div class="mt-3">
                        <label for="profile-email" class="form-label ml-2">Email</label>
                        <input id="profile-email" type="text" class="form-control" name="member_email" placeholder="Email" value="<?php echo $member['member_email'] ?>">
                        <div class="text-danger small ml-2 mt-1"><?php echo form_error('member_email') ?></div>
                    </div>
                    <div class="mt-3">
                        <label for="profile-contact" class="form-label ml-2">Contact</label>
                        <input id="profile-contact" type="text" class="form-control" name="member_contact" placeholder="Contact" value="<?php echo $member['member_contact'] ?>">
                        <div class="text-danger small ml-2 mt-1"><?php echo form_error('member_contact') ?></div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary w-20 mt-5">Save</button>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>