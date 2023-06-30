<aside class="sidebar shadow bg-dark">
    <div class="header text-center" style="border-bottom: 2px solid #fff">
        <!-- <img src="assets/images/akrightlogo.png" width="80" alt=""> -->
        <i class="fas fa-home    text-white mt-3 p-1" style="font-size: 2em; 
        border: 1px solid"></i>
        <h5 class="text-center text-white mt-3">Terrazone Construction LTD</h5>
        
    </div>


    <ul class="sidebar-links">
        <li class="mb-4"><a href="dashboard.php">
            <i class="fas fa-home    "></i>
            <span>Dashboard</span>
        </a></li>
        <li class="mb-4"><a href="jobs.php">
            <i class="fas fa-home    "></i>
            <span>Jobs</span>
        </a></li>
        
        <li class="mb-4"><a href="applications.php">
            <i class="fas fa-home    "></i>
            <span>Applications</span>
        </a></li>
        <li class="mb-4"><a href="applicants.php">
            <i class="fas fa-users    "></i>
            <span>Applicants</span>
        </a></li>
        <li class="mb-4"><a href="reports.php">
            <i class="fas fa-money-bill    "></i>
            <span>Reports</span>
        </a></li>
    </ul>    

</aside>

<!-- Modal -->
<div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <a href="category.php" class="btn btn-sm text-white ml-5" style="background-color:  #2a3801;">View category</a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="./backend/addCategory.php" method="post" class="form">
                    <div class="form-group">
                      <label for="">Category Name: </label>
                      <input type="text" name="category" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" name="add" class="btn btn-sm text-white" style="background-color:  #2a3801;">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>