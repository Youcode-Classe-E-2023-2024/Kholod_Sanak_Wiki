<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ucfirst($page) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




    <link rel="stylesheet" href="<?= PATH ?>assets/css/style.css">
</head>
<body>

    <main>
        <?php include_once 'views/' . $page . '_view.php'; ?>
    </main>


</body>
</html>