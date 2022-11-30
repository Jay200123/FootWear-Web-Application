@include('layouts.master')
<br>
<div id="employees" class="container">
  <div  class="table-responsive">
    <table id="etable" class="table table-striped table-hover">
      <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Town</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
      <tbody id="ebody">
      </tbody>
    </table>
  </div>
</div>


<div class="modal fade" id="employeeModal" role="dialog" style="display:none">
  <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Customer</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <form id="eform" method="#" action="#" enctype="multipart/form-data">

               <div class="form-group">
                <input type="hidden" class="form-control" id="employee_id" name="id">
              </div>

            <div class="form-group">
                        <label for="fname" class="control-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname">
                    </div>
                    <div class="form-group">
                        <label for="lname" class="control-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname">
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="town" class="control-label">Town</label>
                        <input type="text" class="form-control" id="town" name="town">
                    </div>
                     <div class="form-group">
                        <label for="city" class="control-label">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                      <div class="form-group">
                        <label for="phone" class="control-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>

              <div class="form-group"> 
                <label for="image" class="control-label">Image</label>
                <input type="file" class="form-control" id="uploads" name="uploads" />
               </div>
            </form>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="employeeSubmit" type="submit" class="btn btn-primary">Save</button>
          <button id="employeeUpdate" type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
  </div>
</div>