<!-- Modal -->
<form method="post">
    <div class="modal fade" id="editmodal<?php echo $category['id_cat']; ?>" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered   modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmodalLabel">Modifier : <span class="text-warning"><?php echo $category['nom_cat']; ?></span> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $category['id_cat']; ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" value="<?php echo $category['nom_cat']; ?>" name="nom_cat">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Category Code</label>
                                        <input type="text" value="<?php echo $category['code_cat']; ?>" name="code_cat">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description_cat"><?php echo $category['description_cat']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                    <input type="submit" class="btn btn-primary" name="update" value="Save changes">
                                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<!-- Button trigger modal -->