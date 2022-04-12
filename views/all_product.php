<!-- ============================================================== -->
<!-- navbar -->
<!-- ============================================================== -->
<?php include("navbar.php"); ?>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->
<?php include("left_sidebar.php"); ?>
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<style>
    .error {
        color: red;
    }
</style>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Products</h2>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="?controller=Admin&function=all_product" class="breadcrumb-link">Products</a></li>
                                    <li class="breadcrumb-item active page_name" aria-current="page">All Product </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">
                <!-- All products  -->
                <!-- ============================================================== -->

                <div class="col-12 product_data">
                    <div class="mb-2">
                        <?php if (isset($_SESSION['addproduct_token'])) {
                            if ($_SESSION['addproduct_token']) { ?>
                                <script>
                                    setTimeout(() => {
                                        document.getElementById("add").style.display = 'none';
                                    }, 4000);
                                </script>
                                <div class="alert alert-success alert-dismissible fade show" id="add" role="alert">
                                    Product added successfully!!.
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                            <?php  } else { ?>
                                <script>
                                    setTimeout(() => {
                                        document.getElementById("err").style.display = 'none';
                                    }, 4000);
                                </script>
                                <div class="alert alert-danger alert-dismissible fade show" id="err" role="alert">
                                    Sorry data is not added!!.
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                        <?php }
                            unset($_SESSION['addproduct_token']);
                        } ?>

                        <!-- delete alert -->
                        <?php if (isset($_SESSION['deleteproduct_token'])) {
                            if ($_SESSION['deleteproduct_token']) { ?>
                                <script>
                                    setTimeout(() => {
                                        document.getElementById("delete").style.display = 'none';
                                    }, 4000);
                                </script>
                                <div class="alert alert-success alert-dismissible fade show" id="delete" role="alert">
                                    Product deleted successfully!!.
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                            <?php  } else { ?>
                                <script>
                                    setTimeout(() => {
                                        document.getElementById("err").style.display = 'none';
                                    }, 4000);
                                </script>
                                <div class="alert alert-danger alert-dismissible fade show" id="err" role="alert">
                                    Sorry data is not deleted!!.
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                        <?php }
                            unset($_SESSION['deleteproduct_token']);
                        } ?>
                        <!-- update alert -->

                        <?php if (isset($_SESSION['updateproduct_token'])) {
                            if ($_SESSION['updateproduct_token']) { ?>
                                <script>
                                    setTimeout(() => {
                                        document.getElementById("update").style.display = 'none';
                                    }, 4000);
                                </script>
                                <div class="alert alert-success alert-dismissible fade show" id="update" role="alert">
                                    Product updated successfully!!.
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                            <?php  } else { ?>
                                <script>
                                    setTimeout(() => {
                                        document.getElementById("err").style.display = 'none';
                                    }, 4000);
                                </script>
                                <div class="alert alert-danger alert-dismissible fade show" id="err" role="alert">
                                    Sorry data is not updated!!.
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                        <?php }
                            unset($_SESSION['updateproduct_token']);
                        } ?>
                        <a href="?controller=Admin&function=add_product" class="btn btn-primary active">Add Product</a>
                    </div>
                    <div class="card">

                        <h5 class="card-header">All Product </h5>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first" id="product_table">
                                    <thead>
                                        <tr>

                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>


                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end product  -->
                <!-- update product -->
                <div class="row d-flex justify-content-center update_product" style="display:none!important">
                    <div class="col-10">
                        <div class="card">
                            <h5 class="card-header">Update Product</h5>
                            <div class="card-body">
                                <form id="validate_form" action="?controller=Product&function=update_productdata" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <input type="hidden" class="product-id" name="id">
                                        <label for="inputText1" class="col-form-label">Product Name</label>
                                        <input id="inputText1" type="text" class="form-control product_name" name="product_name" placeholder="Product Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Product Description</label>
                                        <textarea class="form-control product_desc" name="product_desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Price (Per Unit)</label>
                                        <input id="inputText4" type="number" name="product_price" class="form-control product_price" placeholder="Price">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText6" class="col-form-label">Quantity</label>
                                        <input id="inputText6" type="number" name="product_quantity" class="form-control product_quantity" placeholder="Quantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="Category">Category</label><br>
                                        <select class="form-control product_category" name="product_category" id="Category">
                                            <option value="" selected>Select</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Sub_Category">Sub Category</label><br>
                                        <select class="form-control product_subcategory" name="product_subcategory" id="Sub_Category">
                                            <option value="" selected>Select</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">IsTrending</label>
                                        <div>
                                            <div class="switch-button switch-button-success">
                                                <input type="checkbox" name="istrend" id="switch16"><span>
                                                    <label for="switch16"></label></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_color">Product Color</label><br>
                                        <select class="form-control product_color" id="product_color" name="product_color">
                                            <option value="" selected>Select</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_size">Product Size</label><br>
                                        <select class="form-control product_size" id="product_size" name="product_size">
                                            <option value="" selected>Select</option>

                                        </select>
                                    </div>

                                    <!-- <div class="custom-file mb-3">

                                        <input type="file" name="files_image" accept=".png, .jpg, .jpeg" class="custom-file-input" id="files_image" multiple>
                                        <label class="custom-file-label form-control" for="chooseFile">Choose Image</label>

                                    </div>
                                    <div class="mb-2">
                                        <div class="imgGallery" style="width:100px;">
                                          
                                        </div>
                                    </div> -->

                                    <button type="submit" class="btn btn-primary btn-block">Update Product</button>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<script src="./assets/js/product.js"></script>