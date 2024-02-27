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

        <p class="mb-6">

            <a href="/demo/notes" class="text-blue-500 underline"> Go back to all notes </a>

        </p>

        <p> <?= $note['id'] ?> = > <?= $note['body'] ?></p>

    </div>
</main>

<!-- Footer Start -->
<?php require('partials/footer.php') ?>
<!-- Footer End -->