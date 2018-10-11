<?php
$this->load->view('templates/header');
$this->load->view('templates/left_sidebar');
$this->load->view('templates/top_bar');
?>

<!-- Begin row -->
<div class="row">
    <div class="col-lg-8">
        <div class="card-box">
            <h4 class="header-title mb-3">Produits liste</h4>

            <div class="table-responsive">
                <table class="table table-hover table-centered m-0">

                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Déscription</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <img src="<?php echo base_url(); ?>assets/images/users/avatar-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Tomaslau</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-btc text-primary"></i> BTC
                        </td>

                        <td>
                            0.00097036 BTC
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <img src="<?php echo base_url(); ?>assets/images/users/avatar-3.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Erwin E. Brown</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-eth text-primary"></i> ETH
                        </td>

                        <td>
                            1.70360009 ETH
                        </td>

                        <td>
                                <a href="#" class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?php echo base_url(); ?>assets/images/users/avatar-4.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Margeret V. Ligon</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-eur text-primary"></i> EUR
                        </td>

                        <td>
                            12.58 EUR
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?php echo base_url(); ?>assets/images/users/avatar-5.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Jose D. Delacruz</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-cny text-primary"></i> CNY
                        </td>

                        <td>
                            30.83 CNY
                        </td>

                        <td>
                                <a href="#" class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?php echo base_url(); ?>assets/images/users/avatar-6.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Luke J. Sain</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-btc text-primary"></i> BTC
                        </td>

                        <td>
                            1.00097036 BTC
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

<div class="col-lg-4">
    <div class="card-box">
        <h4 class="header-title m-t-0">Produit</h4>
        <p class="text-muted font-14 m-b-20">
            Editer votre produit par ce formulaire
        </p>

        <!-- Form Begin -->
        <?php echo form_open_multipart('dashboard/insert');?>

             <div class="form-group">
                <label for="nom">Nom</label>
                <div>
                    <input id="nom" name="nom" type="text" class="form-control" placeholder="Pc, tél, parfume .."/>
                </div>
            </div>
            <div class="form-group">
                    <label for="libelle">Libelle</label>
                    <div>
                        <input id="libelle" name="libelle" type="text" class="form-control"  placeholder="Jeans 1ere choix italie .."/>
                    </div>
                </div>
            <div class="form-group">
                    <label for="prix">Prix</label>
                    <div>
                        <input id="prix" name="prix" type="text" class="form-control"  placeholder="153, 204 ..."/>
                    </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                        <textarea id="description" name="description"></textarea>
            </div>

            <div class="form-group row">
                    <label class="col-3 col-form-label">Image de produit</label>
                    <div class="col-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?php echo base_url(); ?>assets/images/small/img-1.jpg" alt="image" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <button type="button" class="btn btn-custom btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Selectionner image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    <input type="file" id="img_produit" name="img_produit" class="btn-light" />
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- end row -->
            <div class="form-group m-b-0">
                <div>
                    <button type="submit" class="btn btn-custom waves-effect waves-light">
                        Valider
                    </button>
                    <button type="reset" class="btn btn-light waves-effect m-l-5">
                        Annuler
                    </button>
                </div>
            </div>
        </form>

    </div> <!-- end card-box -->
</div> <!-- end col -->
</div>
<!-- end row -->
<?php
$this->load->view('templates/footer');