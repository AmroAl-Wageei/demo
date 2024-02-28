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
        <ul>
            <?php foreach ($notes as $note) : ?>
            <li>- <a href="/demo/note?id=<?= $note['id'] ?>"><?= htmlspecialchars($note['body'] )?> </a>
            </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-6">
            <a href="/demo/notes/create" class="text-blue-500 underline"> Create Note</a>
        </p>

    </div>
</main>

<!-- Footer Start -->
<?php require('partials/footer.php') ?>
<!-- Footer End -->