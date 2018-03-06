<style type="text/css">
.table-container {
    height: 18em;
}
table {
    display: flex;
    flex-flow: column;
    height: 100%;
    width: 100%;
}
table thead {
    /* head takes the height it requires, 
    and it's not scaled when table is resized */
    flex: 0 0 auto;
    width: calc(100% - 0.9em);
}
table tbody {
    /* body takes all the remaining available space */
    flex: 1 1 auto;
    display: block;
    overflow-y: scroll;
}
table tbody tr {
    width: 100%;
}
table thead, table tbody tr {
    display: table;
    table-layout: fixed;
}
</style>
<table class="table table-bordered table-container" align="center" style="margin: 0px auto !important;">    
                                <thead>
                                <tr>
                                    <th width="100px">No.</th>
                                    <th>Tanggal Transaksi</th>
                                    <th width="35%">Uraian</th>
                                    <th>Pemasukkan</th>
                                    <th>Pengaluaran</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no =1;
                                $debet = 0;
                                $kredit = 0;
                                while ($rows = odbc_fetch_object($x1_am)) {
                                $debet =  $debet + ($rows->var_perk[0].$rows->var_perk[1] == '01' ? $rows->nil_trans : '0');
                                $kredit = $kredit + ($rows->var_perk[0].$rows->var_perk[1] == '02' ? $rows->nil_trans : '0');  
                                    ?>
                                        <tr>
                                            <td width="100px"><?= $no; ?></td>
                                            <td><?= date("Y-m-d", strtotime($rows->tgl_trans)); ?></td>
                                            <td width="35%"><?= $rows->keterangan; ?></td>

                                            <td><div align="right"><?= ($rows->var_perk[0].$rows->var_perk[1] == '01' ? number_format($rows->nil_trans,0,',','.') : '0'); ?></div></td>
                                            <td><div align="right"><?= ($rows->var_perk[0].$rows->var_perk[1] == '02' ? number_format($rows->nil_trans,0,',','.') : '0'); ?></div></td>
                                        </tr>
                                    <?php
                                    $no++;
                                }   
                                ?>
                                <tr>
                                    <td width="100px"></td>
                                    <td width="53%" colspan="2"><b>Jumlah</b></td>
                                    <td><b><div align="right"><?= number_format($debet,0,',','.'); ?></div></b></td>
                                    <td><b><div align="right"><?= number_format($kredit,0,',','.'); ?></div></b></td>
                                </tr>
                                </tbody>
                                </table>

                                <div class="col-md-12" >
                            <a href="<?php echo site_url(); ?>antrian/cetak_panjar/<?php echo $nomor_perkara; ?>"><h3 style="color: fff!important;">CETAK</h3></a>
                             </div>  

<script type="text/javascript">
    //following code is used for column resize
   $(function(){
        $("table").find("th").each(function(i,item){
            var $th=$(this);
            var text=$th.text();
            $th.html("");
            var $colHandle=$("<div class='colHandle'></div>");
            var  colResizer=$("<div class='colResizer'></div>").html(text).append($colHandle);
            $th.append(colResizer);
            $colHandle.mousedown(function(e){
                var startX=e.clientX;
                $(document).bind("mousemove",function(e){
                    $th.width($th.width()+(e.clientX-startX));
                    startX=e.clientX;
                });
                $(document).mouseup(function(){
                    $(document).unbind("mousemove");
                });
            });
        
        });

    });
</script>