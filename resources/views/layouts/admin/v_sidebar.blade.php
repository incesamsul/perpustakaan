
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ auth()->user()->foto == "" ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/'.auth()->user()->foto) }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ auth()->user()->name }}
									<span class="user-level">{{ auth()->user()->role }}</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">MENU PENGGUNA</h4>
                        </li>
                        <li class="nav-item" id="liDahshboard">
                            <a href="{{ URL::to('/dashboard') }}" class="collapsed" >
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item" id="liProfile">
							<a href="{{ URL::to('/profile') }}" class="collapsed" >
								<i class="fas fa-user"></i>
								<p>Profile</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">MENU {{ auth()->user()->role }}</h4>
						</li>
                        @if (auth()->user()->role == 'Administrator')
                        <li class="nav-item" id="liPengguna">
							<a href="{{ URL::to('/admin/pengguna') }}" class="collapsed" >
								<i class="fas fa-users"></i>
								<p>Pengguna</p>
							</a>
						</li>
                        <li class="nav-item" id="liKategori">
							<a href="{{ URL::to('/admin/kategori') }}" class="collapsed" >
								<i class="fas fa-swatchbook"></i>
								<p>Kategori</p>
							</a>
						</li>
                        <li class="nav-item" id="liBuku">
							<a href="{{ URL::to('/admin/buku') }}" class="collapsed" >
								<i class="fas fa-book"></i>
								<p>Buku</p>
							</a>
						</li>
                        <li class="nav-item" id="liPinjamkan">
							<a href="{{ URL::to('/admin/pinjamkan') }}" class="collapsed" >
								<i class="fas fa-calendar"></i>
								<p>Peminjaman</p>
							</a>
						</li>
                        <li class="nav-item" id="liPengembalian">
							<a href="{{ URL::to('/admin/pengembalian') }}" class="collapsed" >
								<i class="fas fa-calendar"></i>
								<p>Pengembalian</p>
							</a>
						</li>

                        @endif
						<li class="mx-4 mt-2">
							<a href="{{ URL::to("logout") }}" class="btn bg-main text-white btn-block"><span class="btn-label mr-2"> <i class="fa fa-sign-out-alt"></i> </span>Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

