	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><h2 style="text-align: center;">Rp.<?= $totalSaldo ?></h2><p style="text-align: center; margin-top: -10px">Jumlah Saldo Bulan Ini</p></li>
			<li class="<?php if($this->uri->segment(1) == 'Home') { echo 'active'; } ?>"><a href="<?= base_url() ?>Home/index"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="<?php if($this->uri->segment(1) == 'Pengeluaran') { echo 'active'; } ?>"><a href="<?= base_url() ?>Pengeluaran/index"><em class="fa fa-calendar">&nbsp;</em> Pengeluaran</a></li>
			<li class="<?php if($this->uri->segment(1) == 'Hutang') { echo 'active'; } ?>"><a href="<?= base_url() ?>Hutang/index"><em class="fa fa-bar-chart">&nbsp;</em> Hutang Piutang</a></li>
			<li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
			<li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->