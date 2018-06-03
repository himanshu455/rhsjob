<form class="form-horizontal" name="form1" method="post" action="http://localhost:8000/admin/generate-pdf">
           <input type="hidden" name="_token" value="vY2AwwvLMY8acNFKbVcZizBm3eKlZ1fMv7rNs4SK">
        <!-- /.col -->
        <div class="col-md-8">
        
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="radio" id="archive" checked=""  name="readacted" value="1" > Redacted

                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="radio" id="archive"  name="readacted" value="2" > Full
                      </label>
                    </div>
                  </div>
                </div>
                  <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" id="archive"  name="archive" value="1" > Print associate Doc
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Set Status</label>

                  <div class="col-sm-6">
                    <select name="status"  id="status" onchange="updateStatus(this)" class="form-control" id="inputEmail3" placeholder="">
                       <option value="1">All</option>
                       <option value="2">Active</option>
                      <option value="3">Short Listed</option>
                    <select>
                  </div>
                </div>
                
               
              </div>
              
          
        </div>
      </div>
    </section>
        <!-- /.col -->
      </div>
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" value="" id="checkAll"></th>
                  <th>Letter</th>
                  <th>Name</th>
                </tr>
                </thead>
                <tbody class="tb">
                                                              <tr>
                  <td><input type="checkbox"  name="alldata[]" value="5"></td>
                  <td>Applicant  F</td>
                  <td>Himanshu</td>
                </tr>
                                                  <tr>
                  <td><input type="checkbox"  name="alldata[]" value="6"></td>
                  <td>Applicant  G</td>
                  <td>Rajvir</td>
                </tr>
                                                       
                </tbody>
              </table>
              <input type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">
         

            </div>
            <!-- /.box-body -->
          </div>
          </form>

