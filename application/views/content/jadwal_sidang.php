<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Jadwal Sidang</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="panel-body">
                <div id="dataTables-example_wrapper"
                    class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline collapsed" id="mydata" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 71px;">
                                            Nomor Perkara</th>
                                            <th class="sorting" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 91px;">
                                            Tanggal Daftar</th>
                                            <th class="sorting" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 81px;">
                                            Jenis Perkara</th>
                                            <th class="sorting" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 61px;">
                                            Pihak 1</th>
                                            <th class="sorting" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 61px;">
                                            Pihak 2</th>
                                            <th class="sorting" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 61px;">
                                            Ruang</th>
                                            <!-- <th style="width: 61px;">Actions</th> -->
                                        </tr>
                                    </thead>
                                <tbody id="show_data">

                                </tbody>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- MODAL EDIT -->
    <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Ruang Sidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nomor Perkara</label>
                            <div class="col-md-10">
                              <input type="text" name="nomor_perkara" id="nomor_perkara" class="form-control" placeholder="Nomor Perkara" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Pemohon/Penggugat</label>
                            <div class="col-md-10">
                              <input type="text" name="pihak1_text" id="pihak1_text" class="form-control" placeholder="Nama Pemohon/Penggugat" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Termohon/Tergugat</label>
                            <div class="col-md-10">
                              <input type="text" name="pihak2_text" id="pihak2_text" class="form-control" placeholder="Nama Termohon/Tergugat" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Ruang Sidang</label>
                            <div class="col-md-10">
                              <input type="text" name="ruangan" id="ruangan" class="form-control" placeholder="Ruang Sidang">
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


<script type="text/javascript">
$(document).ready(function(){
  
      
show_data();	//call function show all data

$('#mydata').dataTable();
responsive: true
//function show all data
function show_data(){
  $.ajax({
      type  : 'ajax',
      url   : '<?php echo site_url('jadwal_sidang/jadwal_sidang_data')?>',
      async : false,
      dataType : 'json',
      success : function(data){
          var html = '';
          var i;
          for(i=0; i<data.length; i++){
              html += '<tr>'+
                    '<td>'+data[i].nomor_perkara+'</td>'+
                      '<td>'+data[i].tanggal_pendaftaran+'</td>'+
                      '<td>'+data[i].jenis_perkara_nama+'</td>'+
                      '<td>'+data[i].pihak1_text+'</td>'+
                      '<td>'+data[i].pihak2_text+'</td>'+
                      '<td>'+data[i].ruangan+'</td>'+
                      // '<td style="text-align:right;">'+
                          //     '<a href="<?php echo base_URL()?>jadwal_sidang/edit/'+data[i].perkara_id+'" class="btn btn-primary btn-sm" title="Tambah Disposisi">Edit</a>'+
                          // '</td>'+
                      '</tr>';
          }
          $('#show_data').html(html);
      }

  });
}