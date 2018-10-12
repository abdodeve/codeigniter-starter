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
                    <?php foreach($produits as $produit): ?>
                    <tr>
                        <td>
                            <img src="<?php echo base_url(); ?>uploads/<?php echo $produit->img_src ; ?>" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal"><?php echo $produit->nom ; ?></h5>
                            <p class="mb-0 text-muted"><small><?php echo $produit->libelle ; ?></small></p>
                        </td>

                        <td>
                            <i class="mdi mdi mdi-cash text-primary"></i> <?php echo $produit->prix ; ?> MAD
                        </td>

                        <td>
                            <?php echo $produit->description ; ?>
                        </td>

                        <td>
                            <a href="<?php echo base_url(); ?>/dashboard/edit/<?php echo $produit->id ; ?>" class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url(); ?>/dashboard/delete/<?php echo $produit->id ; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
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
        <?php 
            // On Update Product
            if(isset($the_product)):
                echo form_open_multipart('dashboard/update');
            else:
                echo form_open_multipart('dashboard/insert');
            endif; 
        ?>
             <div class="form-group">
                <label for="nom">Nom</label>
                <div>
                <input id="id" name="id" type="hidden" value="<?php echo isset($the_product->id) ? $the_product->id : ""; ?>"/>
                    <input id="nom" name="nom" type="text" class="form-control" value="<?php echo isset($the_product->nom) ? $the_product->nom : "";  ?>" placeholder="Pc, tél, parfume .."/>
                </div>
            </div>
            <div class="form-group">
                    <label for="libelle">Libelle</label>
                    <div>
                        <input id="libelle" name="libelle" type="text" class="form-control" value="<?php echo isset($the_product->libelle) ? $the_product->libelle : "";  ?>" placeholder="Jeans 1ere choix italie .."/>
                    </div>
                </div>
            <div class="form-group">
                    <label for="prix">Prix</label>
                    <div>
                        <input id="prix" name="prix" type="text" class="form-control" value="<?php echo isset($the_product->prix) ? $the_product->prix : ""; ?>" placeholder="153, 204 ..."/>
                    </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                        <textarea id="description" name="description"><?php echo isset($the_product->description) ? $the_product->description : ""; ?></textarea>
            </div>

            <div class="form-group row">
                    <label class="col-3 col-form-label">Image de produit</label>
                    <div class="col-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <?php if(isset($the_product->nom)): ?>
                                    <img src="<?php echo base_url(); ?>uploads/<?php echo $the_product->img_src; ?>" alt="image" />
                                <?php else: ?>
                                    <img src="<?php echo base_url(); ?>assets/images/small/img-1.jpg" alt="image" />
                                <?php endif; ?>
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


<!-- Begin Modal of - MsgBox Modal -->

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
                            <?php
                            switch ($data['msgModal']){
                                case 'new_product_inserted':
                                    echo 'Produit est ajouté !';
                                    break;
                                case 'product_modified':
                                    echo "Produit est modifié !";
                                    break;
                                case 'product_deleted':
                                    echo 'Produit est supprimé !';
                                    break;
                                case 'form_validation':
                                    echo validation_errors();
                                    break;

                            }
                            ?>
                            </h4>
                        </div>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- END Modal of - MsgBox Modal -->


<?php
$this->load->view('templates/footer');