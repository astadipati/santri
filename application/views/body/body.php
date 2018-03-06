<div id="konten">
	<div id="pageTitle">
		<?php echo $page_title;?>
	</div>
	<div id="right">
    	<div class="total_perkara">
        	Total : <?php  echo number_format($total_rows, 0, ',', '.');?>
    	</div>
	</div>
    <br>
<?php $this->load->view($main_body); ?>

<script type="text/javascript" src="<?php echo base_url();?>resources/js/jquery.simplePagination.js"></script>
<?php
$url = base_url().$page_url.'/page/';
?>

<script language="javascript">
$(function() {
    var totalPage = '<?php echo $total_rows; ?>';
    var page = '<?php echo $page_number;?>';
    $('#selector').pagination({
        items: totalPage,
        itemsOnPage: 50,
        displayedPages: 3,
        cssStyle: 'light-theme',
        currentPage:page,
        onPageClick: function(pageNumber){
            window.open('<?php echo $url;?>'+pageNumber+'/<?php echo $enc; ?>/<?php echo $keyword; ?>/col=<?php echo $column_sorted; ?>','_self')
        	}
        });
    $('#selector_bottom').pagination({
        items: totalPage,
        itemsOnPage: 50,
        displayedPages: 3,
        cssStyle: 'light-theme',
        currentPage:page,
        onPageClick: function(pageNumber){
            window.open('<?php echo $url;?>'+pageNumber+'/<?php echo $enc; ?>/<?php echo $keyword; ?>/col=<?php echo $column_sorted; ?>','_self')
        	}
        });
    });
</script>
</div>
<?php $this->load->view('footer'); ?>
