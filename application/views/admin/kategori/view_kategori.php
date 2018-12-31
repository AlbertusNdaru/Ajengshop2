<section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('kategori/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                      
                                                <th>Nama Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                             
                                                <td><?php echo $r->jenis_barang?></td>
                                                <td class="center">
                                                   <?php echo anchor('kategori/edit/'.$r->id_kategori,'Edit','class="btn btn-default"'); ?>
                                                   <?php echo anchor('kategori/delete/'.$r->id_kategori,'Delete','class="btn btn-default"'); ?>
                                                </td>
                                            </tr>
                                        <?php  } ?>
                                        </tbody>
                                    </table>
                                   
                                </div>
                                <?php
                                        echo $this->pagination->create_links();
                                    ?>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                </section>