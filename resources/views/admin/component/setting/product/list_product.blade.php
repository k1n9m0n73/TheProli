<div class="col-md-12 col-lg-9 col-sm-9 col-xs-12 content-pane-4" >  
                     
                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
                             <div class="table-responsive data-table">
                                  <span class="panel-title">Product List</span>
                                  <table  class="table"  data-toggle="table-" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                         data-cookie-id-table="saveId"  data-sortable="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                      <thead>
                                      <tr>
                                          <th>S/N</th>
                                          <th>Category</th>
                                          <th>Subcategory</th>
                                          <th>Type</th>
                                          <th>Min price</th>
                                          <th>Max price</th>
                                          <th>Total Fraction</th>
                                           <th>Agg Fraction</th>
                                          <th>Store Fraction</th>
                                           <th>Vat Fraction</th>
                                           <th>Isp Fraction</th>
                                            <th>Log Fraction</th>
                                           <th>Proli Fraction</th>
                                      
                                      </tr>
                                      </thead>
                                      <tbody>
                              <?php
                              
                                        foreach ($data as $key => $value) {
                                        
                                        
                              ?>           	
                                      <tr>
                                          <td><?=$key+1?></td>
                                          <td><?=$value->category_name?> </td>
                                          <td><?=$value->subcategory_name?>  </td>
                                          <td><?=$value->type_name?></td>
                                         
                                          <td><?=$value->min_price?></td>
                                          <td><?=$value->max_price?></td>
                                          <td><?=$value->fraction?></td>
                                          <td><?=$value->agg_frac?></td>
                                          <td><?=$value->war_frac?></td>
                                          <td><?=$value->vat_frac?></td>
                                          <td><?=$value->isp_frac?></td>
                                          <td><?=$value->log_frac?></td>
                                          <td><?=$value->proli_frac?></td>
                                        
                                      </tr>
                                      <?php  }?>
                                    
                                      </tbody>
                                  </table>
                              </div>
  
  
                     </div>
                   
                 </div> 

                 <script type="text/javascript">
                     window.addEventListener("load",()=>{
                        // console.log(repopulateTable)
                        repopulateTable(".data-table",{})
                     })
                 </script>