<div id="konten">
	<div id="pageTitle">
		<?php echo $page_title;?>
	</div>
    <br>
<?php $this->load->view($main_body); ?>
<script type="text/javascript" src="<?php echo base_url();?>resources/js/jquery.simplePagination.js"></script>
<?php
$url = base_url().$page_url.'/page/';
?>
<script language="javascript">
</script>
</div>
<?php $this->load->view('footer'); ?>
