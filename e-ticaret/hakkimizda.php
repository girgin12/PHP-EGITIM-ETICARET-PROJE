<?php include 'header.php'; ?>


<?php 

include '../netting/baglan.php';
//belirli veriyi seçme işlemi
$ayarsor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$ayarsor->execute(array(
  'id' => 0
));
$ayarcek =$ayarsor->fetch(PDO::FETCH_ASSOC);


?>	


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							
							<div class="bigtitle">Hakkımızda</div>
						</div>
						
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title"><?php echo $ayarcek['hakkimizda_baslik'];  ?></div>
				</div>
				<div class="page-content">
					<p>
                    <?php echo $ayarcek['hakkimizda_icerik'];  ?>
					</p>
					
				</div>
			</div>
		
          <!-- sidebar buraya gelecek  -->

          <?php include 'sidebar.php'; ?>	

		</div>
		<div class="spacer"></div>
	</div>
	
<?php include 'footer.php'; ?>	