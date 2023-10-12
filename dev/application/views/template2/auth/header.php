<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?=$rs->nama_rs?></title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=site_url('uploads/images/rs/'.$rs->icon_rs)?>" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?=site_url('assets/backend/')?>css/bootstrap.min.css">
        <!-- Typography CSS -->
        <link rel="stylesheet" href="<?=site_url('assets/backend/')?>css/typography.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="<?=site_url('assets/backend/')?>css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="<?=site_url('assets/backend/')?>css/responsive.css">
    </head>
    <body>
        
        <!-- loader Start -->
        <div id="loading" style="background: #fff url('<?=site_url("uploads/images/rs/".$rs->icon_rs)?>') no-repeat scroll center center;  ">
            <div id="loading-center">
            </div>
        </div>
        <!-- loader END -->