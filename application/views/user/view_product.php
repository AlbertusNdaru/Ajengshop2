<section class="content-header">
      <h1>
        Product
        <small>Preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
        <li class="active">Product</li>
      </ol>
    </section>
    <div class="carousel">
      <!-- COba corousel-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom: 10px; margin-top: 10px;">
          <!-- Indicators -->
          <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" align="center">
            <?php 
               
                $noact = 0;
                $active= '';
                foreach($databarang->result() as $rr)
                    { 
                    if($noact==0){
                    $active = 'active';
                    }else{
                    $active='';
                    }
            ?>
            <div class="item <?php echo $active; ?>">  
              <img class="d-block img-fluid" src="<?php echo base_url().'assets/img_product/'.$rr->foto?>" style="height:250px;" alt="" ></div>
              <?php
                  $noact++;
                  }
              ?>
            </div>
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>
      </div>
    <!-- Main content -->
    <section class="content">
     <div class="row">
     <?php $no=1; foreach ($databarang->result() as $data) { ?>
        <div class="col-md-3" style="padding: 0px 5px 0px 5px;">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $data->nama_barang ?></h3>

              <div class="box-tools pull-right">
                <button style="height:30px; padding:3px 16px 3px 16px" type="button" class="btn btn-primary">Buy
                </button>
              </div> 
            </div>
            <div class="box-body">
              <div class="chart" align="center">
           <img style="height:250px; width: 220px;" src="<?php echo base_url().'assets/img_product/'.$data->foto?>">
           <div>Rp 
           <?php echo number_format($data->harga,2) ?>
           </div>
            </div>
      
            </div>
            
            <!-- /.box-body -->
          </div>
        

      <!-- /.row -->
          </div>
          <?php $no++; }
                  
                  ?>
    </section>
    <div align="center">
<?php
  echo $this->pagination->create_links();
  
?>
</div>
<script>
setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(2000)
    .next()
    .fadeIn(2000)
    .end()
    .appendTo('#slideshow');
},  3000);
</script>
 
    <!-- /.content -->