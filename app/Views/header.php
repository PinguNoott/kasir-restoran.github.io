<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="admin dashboard, html css dashboard, bootstrap 5 admin, responsive admin template">
    <meta name="description" content="Admin Dashboard Template built with Bootstrap 5">
    <meta name="robots" content="noindex,nofollow">

  <?php
$setting = $setting ?? []; // Pastikan tidak error jika data tidak ada
?>
<title><?= esc($setting['judul_website'] ?? 'My Website') ?></title>
<link rel="icon" type="image/png" href="<?= base_url(!empty($setting['logo_website']) ? $setting['logo_website'] : 'images/miaw.png') ?>">


    <!-- Chartist CSS -->
    <link href="<?= base_url('assets/plugins/chartist/dist/chartist.min.css') ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('css/style.min.css') ?>" rel="stylesheet">
    <!-- Optional: Canonical URL -->
    <link rel="canonical" href="https://yourwebsite.com/your-page">
</head>
