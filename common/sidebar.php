<ul class="sidebar navbar-nav">
      <li class="nav-item active">
         <a class="nav-link" href="../user/dashboard.php"> <!--../user/index.php -->
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
     </li>
     <li class="nav-item dropdown" id=masterMenu>
        <a class="nav-link dropdown-toggle" id="masterDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-table"></i>
          <span>Master Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="masterDropdown" style="margin: 0 .4rem;">
          <a class="dropdown-item" href="../master/SaleExe.php"> Sales Executives </a>
          <a class="dropdown-item" href="#">Dealers</a>
          <a class="dropdown-item" href="#">Product Catalog</a>
        </div>
      </li>
      <li class="nav-item dropdown" id=mapMenu>
        <a class="nav-link dropdown-toggle" id="mapDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-map"></i>
          <span>Mapping</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="mapDropdown" style="margin: 0 .4rem;">
          <a class="dropdown-item" href="../mapping/mappingSaleExeDealer.php">Dealer & Sales Executive </a>
         
        </div>
      </li>
      <li class="nav-item dropdown" id=reportMenu >
      <a class="nav-link dropdown-toggle" id="reportDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-file"></i>
          <span>Reports</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="reportDropdown" style="margin: 0 .4rem;">
          <a class="dropdown-item" href="../report/CReturnReport.php">Cheque Return Analysis</a>
          <a class="dropdown-item" href="#">Collection Aging-Simple</a>
          <a class="dropdown-item" href="#">Collection Aging-Detailed</a>
        </div>
      </li>
      
    </ul>
