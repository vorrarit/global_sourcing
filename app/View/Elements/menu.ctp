			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="sidebar-search">
							<div class="input-group custom-search-form">
								<input type="text" class="form-control" placeholder="Search..." id="txtSidebarSearch">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button" id="btnSidebarSearch">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div>
							<!-- /input-group -->
						</li>
						<?php $currentUser = $this->Session->read('Auth.User');
						if ($currentUser['UserGroup']['m001'] == 'Y') {
						?>
						<li>
							<a href="/Products/index"><i class="fa fa-search fa-fw"></i>Search Products</a>
						</li>
						<?php
						}
						?>
						<?php $currentUser = $this->Session->read('Auth.User');
						if ($currentUser['UserGroup']['m002'] == 'Y') {
						?>
						<li>
							<a href="#"><i class="fa fa-file-text fa-fw"></i> Product Register<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="/Products/xedni">Product Register</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<?php
						}
						?>
						<?php
						if ($currentUser['UserGroup']['m003'] == 'Y') {
						?>
						<li>
							<a href="#"><i class="fa fa-database fa-fw"></i> Data Management<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="/Divisions/index">Division</a>
								</li>
								<li>
									<a href="/Departments/index">Department</a>
								</li>
								<li>
									<a href="/Klasses/index">Class</a>
								</li>
								<li>
									<a href="/SubKlasses/index">Sub Class</a>
								</li>
								<li>
									<a href="/Currencies/index">Currency</a>
								</li>
								<li>
									<a href="/Units/index">Unit</a>
								</li>
                                <li>
									<a href="/SupplierTypes/index">Supplier Type</a>
								</li>
                                <li>
									<a href="/Suppliers/index">Supplier</a>
								</li>
                                <li>
									<a href="/Manufacturers/index">Manufacturer</a>
								</li>
                                <li>
									<a href="/Users/index">User</a>
								</li>
                                <li>
									<a href="/UserGroups/index">User Group</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<?php
						}
						?>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>



<script type="text/javascript">
$("#btnSidebarSearch").click(function() {
	document.frmProductSearch.elements["data[Product][text_search]"].value = $("#txtSidebarSearch").val();
	document.frmProductSearch.action = "/Products/index";
	document.frmProductSearch.submit();
});
</script>