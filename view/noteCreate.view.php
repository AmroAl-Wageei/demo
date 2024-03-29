<!-- Head Start -->
<?php require('partials/head.php') ?>
<!-- Head End -->

<!-- NAV Start -->
<?php require('partials/nav.php') ?>
<!-- NAV End -->

<!-- Header Start -->
<?php require('partials/header.php') ?>
<!-- Header End -->

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <!-- 
        <form method="POST" action="/demo/notes">
            <label for="body">Description</label>
            <div>
                <textarea name="body" id="body"> </textarea>
            </div>
            <p class="mt-2 text-blue-500">
                <button type="submit">Create</button>
            </p>
        </form> -->

        <form method="POST">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Write
                                A New Note</label>
                            <div class="mt-2">
                                <textarea id="body" name="body" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $_POST['body'] ?? '' ?></textarea>


                                <?php if (isset($error['body'])) : ?>
                                <p class="text-red-500 text-xs mt-4 font-bold"><?= $error['body'] ?></p>
                                <?php endif ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
        </form>


    </div>
</main>

<!-- Footer Start -->
<?php require('partials/footer.php') ?>
<!-- Footer End -->