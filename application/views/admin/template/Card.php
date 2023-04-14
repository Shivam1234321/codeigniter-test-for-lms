 <div class="row state-overview">
      <div class="col-lg-3 col-sm-6">
	      <a href="<?php echo BASE_URL; ?>admincategory">
          <section class="card">
              <div class="symbol terques">
                  <i class="fa fa-list-alt"></i>
              </div>
              <div class="value">
                  <h1 class="count">
                      <?php $count=$this->dm->counting('category');
                        if($count==0){
                          $count=0;
                        }
                      ?>
                      <script type="text/javascript">
                        document.addEventListener("DOMContentLoaded", function(){
                            getCount(<?= $count; ?>,"count")
                        });
                      </script>
                  </h1>
                  <p>Category</p>
              </div>
          </section>
		  </a>
      </div>
 </div>


  </div>
