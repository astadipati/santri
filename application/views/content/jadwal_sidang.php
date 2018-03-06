<div id="page-wrapper" style="min-height: 596px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Jadwal Sidang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    
                    <table class="table table-striped" id="mydata">
                        <thead>
                            <tr>
                                <th>Nomor Perkara</th>
                                <th>Tanggal Daftar</th>
                                <th>Jenis Perkara</th>
                                <th>Pihak 1</th>
                                <th>Pihak 2</th>
                                <!-- <th>Tanggal Sidang</th> -->
                                <th>Ruangan</th>
                                <th style="text-align: right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                            
                        </tbody>
                    </table>
                </div>
                 <!-- MODAL EDIT -->
        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product Code</label>
                            <div class="col-md-10">
                              <input type="text" name="product_code_edit" id="product_code_edit" class="form-control" placeholder="Product Code" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product Name</label>
                            <div class="col-md-10">
                              <input type="text" name="product_name_edit" id="product_name_edit" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                              <input type="text" name="price_edit" id="price_edit" class="form-control" placeholder="Price">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->
            </div>
            <!-- /.row -->
        </div>