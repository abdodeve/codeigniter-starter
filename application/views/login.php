<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>

</head>

<body class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('<?php echo base_url(); ?>assets/images/bg-1.jpg');background-size: cover;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="<?php echo base_url(); ?>" class="text-success">
                                    <span><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" height="26"></span>
                                </a>
                            </h2>
                            <form method="post" action="<?php echo base_url('auth/login');?>">

                            <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailLogin">Email address</label>
                                        <input class="form-control" type="email" id="identity" name="identity" placeholder="Enter your email">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a>
                                        <label for="passwordLogin">Password</label>
                                        <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">

                                        <div class="checkbox checkbox-custom">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">
                                                Remember me
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button name="signIN"
                                                id="signIN"
                                                class="btn btn-block btn-custom waves-effect waves-light" 
                                                type="submit">Sign In</button>
                                    </div>
                                </div>

                            </form>

                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Vous avez pas encore un compte?
                                        <a href="javascript:void(0);"
                                           class="text-dark m-l-5"
                                           data-toggle="modal"
                                           data-target="#inscrivez-vous-modal">
                                            <b>Inscrivez-vous</b>
                                        </a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- Begin Modal of - Incorrect credentials -->

            <?php if(isset($data['showModal']) && $data['showModal'] == true):?>
            <script>
                jQuery(function($) {
                    $(document).ready(function() {
                        $("#message-modal").modal();
                    });
                });
            </script>
            <?php endif; ?>

            <div id="message-modal" class="modal fade" tabindex="-1" role="dialog"
                 aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h2 class="text-uppercase text-center m-b-30">
                                <a href="<?php echo base_url(); ?>" class="text-success">
                                    <span><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" height="28"></span>
                                </a>
                            </h2>

                            <form class="form-horizontal" action="#">

                                <div class="form-group m-b-25">
                                    <div class="col-12">
                                        <h4 style="text-align: center;color: #f1556c !important;">
                                            <?php echo $data['message']; ?>
                                        </h4>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- END Modal of - Incorrect credentials -->




            <!-- Begin Signup modal content -->
            <div id="inscrivez-vous-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <h2 class="text-uppercase text-center m-b-30">
                                <a href="<?php echo base_url(); ?>" class="text-success">
                                    <span><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" height="28"></span>
                                </a>
                            </h2>


                            <form method="post" action="<?php echo base_url('Auth/signUp');?>">

                                <div class="form-group m-b-25">
                                    <div class="col-12">
                                        <label for="name">Name</label>
                                        <input class="form-control" type="text" id="name" name="name" required="" placeholder="Michael Zenaty">
                                    </div>
                                </div>

                                <div class="form-group m-b-25">
                                    <div class="col-12">
                                        <label for="email">Email address</label>
                                        <input class="form-control" type="email" id="emailSignUP" name="emailSignUP" required="" placeholder="john@deo.com">
                                    </div>
                                </div>

                                <div class="form-group m-b-25">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="passwordSignUP" id="passwordSignUP" required="" placeholder="Enter your password">
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-custom">
                                            <input id="checkbox11" type="checkbox" checked>
                                            <label for="checkbox11">
                                                I accept <a href="#">Terms and Conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Sign Up Free</button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- End Signup modal content -->




            <div class="m-t-40 text-center">
                <p class="account-copyright">2018 © Creasouk. - Creasouk.ma</p>
            </div>

        </div>
        <!-- jQuery  -->
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>

<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

</body>
</html>