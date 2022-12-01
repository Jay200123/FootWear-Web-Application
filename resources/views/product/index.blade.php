@include('layouts.master')
<br>
<div id="products" class="container">
     <!-- <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#productModal"  >add<span  class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> -->
  <div  class="table-responsive">
    <table id="ptable" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Brand</th>
          <th>Image</th>
          <th>Description</th>
          <th>Sell Price</th>
          <th>Cost Price</th>
          <th>Action</th>
          </tr>
      </thead>
      <tbody id="pbody">
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="productModal" role="dialog" style="display:none">
  <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Product</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <form id="pform" method="#" action="#" enctype="multipart/form-data">

            <div class="form-group">
                <input type="hidden" class="form-control" id="product_id" name="id">
              </div>

             <div class="form-group">
                  <label for="desc" class="control-label">Description</label>
                  <input type="text" class="form-control" id="description" name="description"  >
             </div>

             <div class="form-group">
                  <label for="desc" class="control-label">Brand</label>
                  <input type="text" class="form-control" id="brand" name="brand"  >
             </div>

             <div class="form-group"> 
                <label for="sell" class="control-label">Sell price</label>
                <input type="text" class="form-control " id="sell_price" name="sell_price">
              </div>

              <div class="form-group"> 
                <label for="cost" class="control-label">Cost Price</label>
                <input type="text" class="form-control " id="cost_price" name="cost_price" >
              </div>

              <div class="form-group"> 
                <label for="image" class="control-label">Image</label>
                <input type="file" class="form-control" id="uploads" name="uploads" />
               </div>
            </form>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="productUpdate" type="submit" class="btn btn-primary">Update</button>
          <button id="productSubmit" type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
  </div>
</div>

