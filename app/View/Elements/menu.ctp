			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="sidebar-search">
							<div class="input-group custom-search-form">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">
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
							<a href="index.html"><i class="fa fa-dashboard fa-fw"></i>Search Products</a>
						</li>
						<?php
						}
						?>
						<li>
							<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Product Register<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="flot.html">Flot Charts</a>
								</li>
								<li>
									<a href="morris.html">Morris.js Charts</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-wrench fa-fw"></i> Data Management<span class="fa arrow"></span></a>
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
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="#">Second Level Item</a>
								</li>
								<li>
									<a href="#">Second Level Item</a>
								</li>
								<li>
									<a href="#">Third Level <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
									</ul>
									<!-- /.nav-third-level -->
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="blank.html">Blank Page</a>
								</li>
								<li>
									<a href="login.html">Login Page</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>