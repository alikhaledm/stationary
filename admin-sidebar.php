<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-text"><span>Supplies Hub</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="admin-dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="admin-profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
            <li class="nav-item">
                <button class="nav-link btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#databaseTables" aria-expanded="false" aria-controls="databaseTables">
                    <i class="fas fa-database"></i><span>Database Tables</span>
                </button>
                <div class="collapse" id="databaseTables">
                    <ul class="navbar-nav text-light">
                        <li class="nav-item"><a class="nav-link active" href="admin-ViewUsers.php"><i class="fas fa-table"></i><span>Users</span></a></li>
                        <li class="nav-item"><a class="nav-link active" href="admin-ViewSchools.php"><i class="fas fa-table"></i><span>Schools</span></a></li>
                        <li class="nav-item"><a class="nav-link active" href="admin-ViewProducts.php"><i class="fas fa-table"></i><span>Products</span></a></li>
                        <li class="nav-item"><a class="nav-link active" href="admin-ViewSuppliesList.php"><i class="fas fa-table"></i><span>Supplies Lists</span></a></li>
                        <li class="nav-item"><a class="nav-link active" href="admin-ViewOrders.php"><i class="fas fa-table"></i><span>Excess Products</span></a></li>
                        <li class="nav-item"><a class="nav-link active" href="admin-ViewOrders.php"><i class="fas fa-table"></i><span>Orders</span></a></li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
        </div>
    </div>
</nav>
<style>
    .sidebar-brand-text {
        font-size: larger;
    }
</style>