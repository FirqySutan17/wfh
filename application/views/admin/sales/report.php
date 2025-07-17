<style>
	.pre-posttest h3 {
		font-weight: 700;
		border-bottom: 2px solid #000;
		padding-bottom: 10px;
		margin-bottom: 10px;
	}

	.pre-posttest h4 {
		font-weight: 500;
	}

	h4 {
		font-family: 'cjFont' !important;
	}

	.desktop-h4 {
		display: block;
	}

	.mobile-h4 {
		display: none;
	}

	.qna {
		margin-bottom: 20px;
	}

	.qna label {
		font-weight: 500 !important;
	}

	.answer {
		margin-top: 10px;
	}

	input {
		display: inline-block;
		vertical-align: middle;
		margin-top: 2px !important;
		margin-right: 8px !important;
	}

	.question {
		font-size: 17px;
		font-weight: 600;
	}

	h3.sub-title {
		font-size: 20px;
		font-weight: 700;
		text-decoration: none;
		margin-top: 20px;
		margin-bottom: 20px;
		font-size: 14px !important;
	}

	.box-att {
		background: #007bff;
		color: #fff;
		padding: 20px;
		border-radius: 10px;
	}

	.divi-delayed-button-2 {
		text-align: center;
		padding: 15px;
		font-weight: 800;
		font-size: 18px;
		border: none;
		/* border-top-right-radius: 10px; */
		background: #007bff;
		color: #fff;
		border-radius: 8px;
		margin-bottom: 20px;
	}

	.divi-delayed-button-2:hover {
		background: #58a9ff;
	}

	.content-task {
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
		margin-bottom: 20px;
	}

	.answer {
		margin-left: 25px;
		display: flex;
		justify-content: left;
		align-content: center;
	}

	[type="checkbox"],
	[type="radio"] {
		width: 15px !important;
	}

	@media (max-width: 600px) {
		.answer {
			margin-left: 0px;
		}

		input {
			margin-right: 10px !important;
		}

		[type="checkbox"],
		[type="radio"] {
			width: 30px !important;
		}

		.question {
			line-height: 25px;
			font-size: 18px;
		}
	}
</style>

<style>
	table.dataTable th {
		position: relative;
		text-align: center;
	}

	table.dataTable thead .sorting:after,
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_asc_disabled:after,
	table.dataTable thead .sorting_desc_disabled:after {
		position: absolute;
		bottom: 5px;
		right: 5px;
	}

	table.dataTable thead > tr > th.sorting_asc,
	table.dataTable thead > tr > th.sorting_desc,
	table.dataTable thead > tr > th.sorting,
	table.dataTable thead > tr > td.sorting_asc,
	table.dataTable thead > tr > td.sorting_desc,
	table.dataTable thead > tr > td.sorting {
		padding: 10px 20px;
	}

	.table > tbody > tr > td,
	.table > tbody > tr > th,
	.table > tfoot > tr > td,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > thead > tr > th {
		vertical-align: middle;
	}

	select.input-sm {
		height: 40px;
		line-height: 30px;
		text-align: center;
	}

	.box-header {
		background: #3c8dbc;
		border: 4px solid #000;
		border-radius: 10px 10px 0px 0px;
		padding: 25px 0px;
	}

	.box.box-solid.box-primary {
		border-top: none;
		border: 0px solid transparent;
	}

	.box-title {
		font-size: 24px;
		font-weight: 700;
		text-transform: uppercase;
		color: #fff;
	}

	.box.box-info {
		border-top-color: transparent;
	}

	.content {
		padding: 0px;
	}

	.date-range {
		background-color: #000;
		color: #fff;
		text-align: center;
		width: 100%;
		padding: 8px 16px;
		border-radius: 0px 0px 10px 10px;
		border: 2px solid #000;
		font-weight: 600;
	}

	.box-header.with-border {
		border-bottom: 1px solid #f4f4f4;
	}

	.b-style {
		font-family: cjFont;
		font-size: 14px;
		color: #0f172a;
		margin-bottom: 0px;
		background: transparent;
		padding: 0px;
		padding-top: 5px;
	}

	table.table-bordered.dataTable th {
		font-size: 12px !important;
        text-transform: uppercase !important;
	}

	table.table-bordered.dataTable td {
		font-size: 11px !important;
        text-transform: uppercase !important;
	}

	table.dataTable thead .sorting:after,
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_asc_disabled:after,
	table.dataTable thead .sorting_desc_disabled:after {
		bottom: 10px !important;
	}

	select.input-sm {
		height: 30px;
		line-height: 20px;
		margin: 0px 5px;
	}

	div.dataTables_wrapper div.dataTables_length select {
		width: 50px;
	}
	div.dataTables_wrapper div.dataTables_info {
		padding-top: 8px;
		white-space: nowrap;
		font-size: 10px !important;
	}
	.pagination > .disabled > a,
	.pagination > .disabled > a:focus,
	.pagination > .disabled > a:hover,
	.pagination > .disabled > span,
	.pagination > .disabled > span:focus,
	.pagination > .disabled > span:hover {
		font-size: 11px;
	}
	.pagination > .active > a,
	.pagination > .active > a:focus,
	.pagination > .active > a:hover,
	.pagination > .active > span,
	.pagination > .active > span:focus,
	.pagination > .active > span:hover {
		font-size: 11px;
	}
	div.dataTables_wrapper div.dataTables_length label {
		font-size: 11px;
	}
	td {
		height: auto;
		padding: 12px !important;
	}
	div.dataTables_wrapper div.dataTables_filter label {
		font-weight: normal;
		white-space: nowrap;
		text-align: left;
		font-size: 11px;
		display: inline-block;
		vertical-align: middle;
	}
	.pagination > li > a,
	.pagination > li > span {
		position: relative;
		float: left;
		padding: 6px 12px;
		margin-left: -1px;
		line-height: 1.42857143;
		color: #337ab7;
		text-decoration: none;
		background-color: #fff;
		border: 1px solid #ddd;
		font-size: 11px;
	}
	
	.table-w-message {
		width: 100%;
	}
	.maps-frame {
        border:2px solid #C1C1C1; 
        border-radius: 10px;
        width: 100%;
        height: 100px;
    }
	.dot {
		display: none;
	}
	td {
		text-align: center;
	}
	input, select {
		width: 65%;
		margin-left: 8px
	}
	span.label-span {
		width: 48%
	}
	span.label-span.sales-span {
		width: 15% !important;
	}
    .btn.btn-primary.btn-block:hover {
        background: #000;
        color: #fff
    }
    .btn-show-detail {
        width: 100%;
        background: yellow;
        color: #000;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 5px;
        border: 2px solid #000
    }
    .btn-show-cancel {
        width: 100%;
        background: red;
        color: #fff;
        border-radius: 8px;
        padding: 10px;
        border: 2px solid #000
    }
    .btn-show-detail:hover {
        width: 100%;
        background: transparent;
        color: #000;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 5px;
        border: 2px solid #000
    }
    .btn-show-cancel:hover {
        width: 100%;
        background: transparent;
        color: #000;
        border-radius: 8px;
        padding: 10px;
        border: 2px solid #000
    }
	.btn.btn-primary.btn-block {
		height: 36px;
		width: 15%;
		border: 2px solid #000;
		border-radius: 8px;
		margin-left: -20px;
	}
	/* Modal box */
    .modal-wrapper {
        display: none;
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .modal-punya {
      background: white;
      border-radius: 10px;
      padding: 20px;
      width: 90%;
      max-width: 90%;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      top: 50%; margin: auto; position: absolute; left: 50%;
      transform: translate(-50%, -50%);
      animation: fadeIn 0.3s ease;
      max-height: 92vh;
      overflow: auto;
    }

	.modal-punya input {
		margin: 0px !important;
	}

    /* Close button */
    .modal-punya .close-btn {
        position: absolute;
        top: 0px;
        right: 15px;
        font-size: 40px;
        color: #888;
        cursor: pointer;
    }

    .modal-td {
        padding: 5px !important;
        margin: 0px !important;
    }
	.modal-punya th, .modal-punya td, .modal-punya textarea, .modal-punya input {
		font-size: 13px !important;
		text-align: center;
	}
    .cust-btn-save {
        width: 50%;
        font-size: 14px
    }
    .cust-btn-danger {
        width: 50%
    }
    .cust-btn-save:hover {
        background: transparent;
        color: #3c8dbc;
        font-weight: 700;
    }

    .cust-btn-danger:hover {
        background: transparent;
        color: #dd4b39;
        font-weight: 700;
    }
    span.important {
        color: red;
        font-size: 14px
    }
    .tabs {
      display: flex;
      border-bottom: 2px solid #000;
      width: 100%;
      margin-bottom: 20px
    }

    .tab {
      padding: 10px 20px;
      cursor: pointer;
      border: none;
      background-color: #f1f1f1;
      border-radius: 15px 15px 0 0;
      transition: background-color 0.3s;
      
    }

    .tab.active {
      border-radius: 15px 15px 0 0;
      background-color: #ffffff;
      border: 2px solid #000;
      border-bottom: 0px solid transparent;
      font-weight: bold;
    }

    .tab-content {
      display: none;
      /* padding: 20px;
      border: 1px solid #ccc; */
      width: 100%;
      border-top: none;
    }

    .tab-content.active {
      display: block;
    }
    .approved {
        color: white;
        background: green;
        border-radius: 8px;
        padding: 5px;
        font-weight: 700
    }
    .rejected {
        color: white;
        background: red;
        border-radius: 8px;
        padding: 10px;
        font-weight: 700
    }
    .waiting-approval {
        color: white;
        background: blue;
        border-radius: 8px;
        padding: 10px;
        font-weight: 700
    }
    input, textarea {
        text-transform: uppercase !important;
    }
	.paging-style {
		display: flex;
		flex-direction: row;
		align-content: center;
		justify-content: flex-end;
		align-items: center;
	}

	th {
		font-size: 12px !important;
    	text-transform: uppercase !important;
		text-align: center !important;
	}
	td {
		font-size: 11px !important;
    	text-transform: uppercase !important;
	}
	.select2-container--bootstrap4 .select2-selection--single {
		height: 35px;
	}
	.select2-container .select2-selection--single .select2-selection__rendered {
		margin-top: 3px !important;
	}

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
	
	@media (max-width: 600px) {
		.desktop-h4 {
			display: none;
		}

		.mobile-h4 {
			display: block;
		}
		.table-responsive-new {
			width: 100%;
			overflow: auto;
		}
		.filter-style {
			flex-direction: column;
			align-content: flex-start;
			justify-content: center;
			align-items: flex-start;
		}
		.dot {
			display: block;
		}
		.filter-style .label-span {
			margin-bottom: 5px;
			
		}
		span.label-span.sales-span {
			width: 100% !important;
		}
		.btn-filter {
			margin: 10px 0px
		}
		.table-container {
			width: 100%;
			overflow-x: auto;
			position: relative; /* Agar sticky header berfungsi */
		}

		input, select {
			width: 100%;
			margin-left: 0px
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		table thead {
            display: none;
        }
        table, table tbody, table tr, table td {
            display: flex;
            flex-direction: column;
            width: 100%;
        } 
		tr {
			padding: 15px;
			border-radius: 0px;
			margin: 0px 0px !important;
			background: #f5f5f5;
		}
        th, td {
            font-size: 12px !important;
            text-align: left !important;
			width: auto !important;
        }
		td {
			padding: 5px 12px !important;
			border: 0px solid #C1C1C1 !important;
		}
        table tbody tr td {
            text-align: center;
            padding-left: 50%;
            position: relative;
            white-space: normal !important;
            font-size: 12px !important;
        }

		table td:before {
            content: attr(data-label);
            width: 100%;
            font-weight: 600;
            font-size: 13px;
            text-align: left;
            text-transform: uppercase;
			margin-right: 15px;
			border-bottom: 1px solid #000;
			padding-bottom: 5px;
			margin-bottom: 10px;
        }

		table.table-bordered.dataTable td {
			font-size: 13px !important;
			display: flex;
			flex-direction: column;
        	align-items: flex-start;
		}

		thead th {
			position: sticky;
			top: 0;
			background-color: white;
			z-index: 10; /* Z-index untuk header */
			box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4); /* Beri sedikit bayangan untuk efek header tetap */
		}

		thead th.fixed-column {
			position: sticky !important;
			top: 0;
			left: 0;
			z-index: 11; /* Lebih tinggi agar tetap di atas ketika di-scroll */
			background-color: white;
			box-shadow: 2px 0 2px -1px rgba(0, 0, 0, 0.4); /* Efek bayangan horizontal untuk kolom tetap */
		}

		tbody td.fixed-column {
			position: sticky;
			left: 0;
			background-color: white;
			z-index: 1; /* Lebih rendah dari header */
			box-shadow: 2px 0 2px -1px rgba(0, 0, 0, 0.4); /* Efek bayangan pada kolom */
		}
		.table-bordered {
			border: 0px solid #C1C1C1;
			font-size: 12px;
		}
		.table-responsive {
			border: 0px solid #ddd;
		}
		.btn-show-detail {
			width: 100%;
			margin-top: 10px
		}
		.btn-show-detail svg {
			font-size: 25px
		}
		.dataTables_length {
			display: none;
		}
		div.dataTables_wrapper div.dataTables_filter label {
			font-size: 14px !important;
			text-transform: uppercase;
		}
		div.dataTables_wrapper div.dataTables_filter input {
			font-size: 16px;
		}
		.btn.btn-primary.btn-block {
			margin-left: 0px;
			margin-top: 15px;
			width: 100%;
		}
		.modal-punya {
			width: 100%;
			max-width: 100%;
		}
		.modal-punya td {
			display: block !important;
			margin-bottom: 5px
		}
		.modal-punya textarea, .modal-punya input {
			margin-top: 10px !important;
        	line-height: 23px;
		}
		.modal-punya tr {
			border-radius: 10px;
			margin: 5px 0px !important;
			padding: 10px 5px;
		}
		.cust-btn-save {
			width: 50%
		}
		.cust-btn-danger {
			width: 50%
		}
		.col-lg-12.col-sm-12 {
			flex-direction: column
		}
		.approved {
			color: white;
			background: green;
			border-radius: 8px;
			padding: 10px;
			font-weight: 700;
			margin-top: -15px;
			width: 100%;
			text-align: center;
		}
		h3.sub-title {
			line-height: 25px;
			font-size: 15px !important;
		}
		.img-top {
			margin-top: 20px;
			object-fit: cover;
		}

		.modal-punya tr.mobile-space {
			border-radius: 0px;
			margin: 0px 0px !important;
			padding: 10px 5px;
		}
		.mobile-bg {
			background: rgb(0, 190, 238) !important;
			color: #fff !important;
			border-radius: 8px
		}
	}

	@media (max-width: 480px) {
      .modal-punya {
        padding: 15px;
		border-radius: 0px;
		max-height: 100vh;
      }
    }
</style>

<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>REPORT ACTIVITY - SALES RPA</strong>
    </h3>
	<form class="form-horizontal" action="<?= admin_url('sales/activity/report') ?>" method="POST" style="margin-bottom: 20px">
        <div class="row" style="padding: 0px 10px; border-bottom: 2px solid #000; padding-bottom: 8px;margin: 0px 0px;  ">
			<div class="col-md-5 col-sm-12 filter-style"  style="display: flex;">
				<span class="label-span" style="width: 40%; display: inline-block; vertical-align: middle; margin-top: 9px; font-weight: 600">DATE : </span> 
				<input type="date" name="sdate" value="<?= $filter['sdate'] ?>" class="form-control" required> 
				<span style="margin-top: 9px; font-weight: 600">-</span> 
				<input type="date" name="edate" value="<?= $filter['edate'] ?>" class="form-control" required>
			</div>
			<div class="col-md-4 col-sm-12 filter-style" style="display: flex;">
                <span class="label-span sales-span" style="display: inline-block; vertical-align: middle; margin-top: 9px; font-weight: 600; width: 40%">SALES : </span> 
                <select id="sales" class="form-control" name="sales" style="width: 100%">
                    <option value="*" selected>- ALL SALES -</option>
                     <?php foreach ($sales as $field): ?>
                        <option <?= $filter['sales'] == $field['EMPLOYEE_ID'] ? 'selected' : '' ?> value="<?= $field['EMPLOYEE_ID'] ?>"><?= $field['EMPLOYEE_ID'] ?> - <?= $field['FULL_NAME'] ?></option>
                     <?php endforeach ?>
                </select>
            </div>
			<div class="col-md-3 col-sm-12 filter-style"  style="display: flex;">
				<button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search" style="font-size: 20px"></i></button> 
			</div>
        </div>
    </form>
	<div class="table-responsive table-container">
		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<?= $this->session->flashdata('success') ?>
			</div>
		<?php endif; ?>
		<?php
			$groupedPlans = [];
			foreach ($plans as $row) {
				$key = $row['ACTIVITY_NO'];
				if (!isset($groupedPlans[$key])) {
					$groupedPlans[$key] = [
						'ACTIVITY_DATE' => $row['ACTIVITY_DATE'],
						'SALES_NAME' => $row['SALES_NAME'],
						'SALES_NPK' => $row['SALES_NPK'],
						'customers' => []
					];
				}
				$groupedPlans[$key]['customers'][] = [
					'CUSTOMER_CODE' => $row['CUSTOMER_CODE'],
					'CUSTOMER_NAME' => $row['CUSTOMER_NAME'],
					'TARGET_PLAN' => $row['TARGET_PLAN'],
					'REMARK' => $row['REMARK'],
				];
			}

			// Pagination setup (contoh 5 group per halaman)
			$perPage = 5;
			$totalGroups = count($groupedPlans);
			$totalPages = ceil($totalGroups / $perPage);
			$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
			$start = ($page - 1) * $perPage;
			$groupedPlansPage = array_slice($groupedPlans, $start, $perPage, true);

			?>

			<table class="table table-bordered table-hover" style="margin-bottom: 0px">
				<thead>
					<tr>
						<th>NO</th>
						<th>ACTIVITY NUMBER</th>
						<th>DATE</th>
						<th>SALES</th>
						<th>CUSTOMER NAME</th>
						<th>PLAN</th>
						<th>ACTUAL</th>
					</tr>
				</thead>
				<tbody>
				<?php $no = $start + 1; ?>
				<?php if (empty($groupedPlansPage)): ?>
					<tr>
						<td colspan="8" class="text-center"><strong>DATA TIDAK ADA</strong></td>
					</tr>
				<?php else: ?>
					<?php foreach ($groupedPlansPage as $activityNo => $data): ?>
						<?php $customerCount = count($data['customers']); ?>
						<?php foreach ($data['customers'] as $index => $cust): ?>
							<tr>
								<?php if ($index === 0): ?>
									<td class="mobile-bg" data-label="NO" rowspan="<?= $customerCount ?>"><?= $no ?></td>
									<td data-label="ACTIVITY NUMBER" rowspan="<?= $customerCount ?>"><strong>
										<a href="#" 
										onclick="openModal(this)" 
										class="btn btn-sm btn-show-detail"
										data-activity-no="<?= $activityNo ?>"
										>#<?= $activityNo ?></a></strong></td>
									<td data-label="ACTIVITY DATE" rowspan="<?= $customerCount ?>"><strong><?= date('d M Y', strtotime($data['ACTIVITY_DATE'])) ?></strong></td>
									<td data-label="SALES" rowspan="<?= $customerCount ?>"><?= $data['SALES_NAME'] ?> (<?= $data['SALES_NPK'] ?>)</td>
								<?php endif; ?>
								<td data-label="CUSTOMER"><?= htmlspecialchars($cust['CUSTOMER_NAME']) ?> (<?= htmlspecialchars($cust['CUSTOMER_CODE']) ?>)</td>
								<td data-label="PLAN">
									<?php if ($cust['TARGET_PLAN'] == null): ?>
										ON SITE
									<?php else: ?>
										<?= htmlspecialchars($cust['TARGET_PLAN']) ?>
									<?php endif; ?>
									
								</td>
								<td data-label="ACTUAL">
									<?php if ($cust['REMARK'] == NULL): ?>
										ON PROGRESS
									<?php else: ?>
										<?= htmlspecialchars($cust['REMARK']) ?>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
						<?php $no++; ?>
					<?php endforeach; ?>
				<?php endif; ?>
				</tbody>
			</table>

			<!-- Pagination simple -->
			<div class="paging-style">
				<ul class="pagination">
					<?php if ($page > 1): ?>
						<li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">PREV</a></li>
					<?php endif; ?>

					<?php for ($p = 1; $p <= $totalPages; $p++): ?>
						<li class="page-item <?= $p == $page ? 'active' : '' ?>">
							<a class="page-link" href="?page=<?= $p ?>"><?= $p ?></a>
						</li>
					<?php endfor; ?>

					<?php if ($page < $totalPages): ?>
						<li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">NEXT</a></li>
					<?php endif; ?>
				</ul>
			</div>
	</div>
</div>

<!-- Modal Structure -->
<div class="modal-wrapper" id="modalWrapper" onclick="closeModalOutside(event)" style="display:none;">
  <div class="modal-punya">
    <span class="close-btn" onclick="closeModal()">&times;</span>
    <div id="modalContent">

      <h4 style="line-height: 30px">SALES ACTIVITY : #<span id="modal_title_reqno" style="font-weight: bold;"></span></h4>
	  
      <input type="hidden" id="modal_req_no" name="req_no">
      <input type="hidden" id="modal_seq" name="seq">
      <input type="hidden" id="modal_app_level" name="approval_level">

      <table class="table table-bordered" style="margin-bottom: 20px">
        <thead>
          <tr>
            <th style="text-align: left">DATE</th>
            <th style="text-align: left">SALES</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td data-label="DATE">
              <input type="text" class="form-control" style="font-size: 14px; width: 100%" name="activity_date" readonly />
            </td>
            <td data-label="SALES NAME">
              <input type="hidden" name="sales_npk" />
              <input type="text" name="sales_name" class="form-control" style="font-size: 14px; width: 100%" readonly />
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Container Dinamis untuk Plan Activities -->
      <div id="activities_container"></div>
      <div id="others_container"></div>

	  <a href="javascript:void(0)" onclick="closeModal()" class="btn btn-sm btn-show-cancel">CLOSE</a>
    </div>
  </div>
</div>

<script src="<?= asset('vendor/select2/js/select2.min.js') ?>"></script>
<script src="<?= asset('vendor/select2/js/en.js') ?>"></script>
<script src="<?= asset('vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?= asset('vendor/lightbox2/dist/js/lightbox-plus-jquery.min.js') ?>"></script>

<script>
    $(function () {
      $('#example1').DataTable(
        {"language": {"paginate": { "previous": "&lt","next": "&gt",}}}
      );
    });

	function openModal(el) {
	const activityNo = el.getAttribute('data-activity-no');

	fetch(`<?= base_url('dashboard/sales/activity/get_modal_detail/') ?>${activityNo}`)
		.then(response => response.text())
		.then(text => {
		const data = JSON.parse(text);
			console.log(text);
		document.getElementById('modal_title_reqno').textContent = data.plan.ACTIVITY_NO || '';

		document.querySelector('[name="activity_date"]').value = data.plan.ACTIVITY_DATE || '';
		document.querySelector('[name="sales_npk"]').value = data.plan.SALES_NPK || '';
		document.querySelector('[name="sales_name"]').value = data.plan.SALES_NAME || '';

		const activitiesContainer = document.getElementById('activities_container');
		activitiesContainer.innerHTML = ''; // kosongkan dulu

		// ✅ Tambahkan pengecekan ini
		if (Array.isArray(data.plan_activities)) {
			data.plan_activities.forEach((activity, index) => {
				// Parse koordinat
				const coords = (activity.COORDINATE || '-6.2301638, 106.8311237').split(',');
				const lat = coords[0].trim();
				const long = coords[1].trim();
				let imageHtml = '';

				if (activity.IMAGES && activity.IMAGES.length > 0) {
					activity.IMAGES.forEach(img => {
						imageHtml += `
							<div style="display:inline-block; margin:5px; text-align:center;">
								<a class="buttons" href="<?= base_url('uploads/plan/') ?>${img.IMAGE_PATH}" data-lightbox="mygallery">
									<img src="<?= base_url('uploads/plan/') ?>${img.IMAGE_PATH}" alt="" width="100" style="object-fit: cover">
								</a>
							</div>
						`;
					});
				} else {
					imageHtml = '<p style="text-align:center; font-style:italic;">No images uploaded.</p>';
				}

				activitiesContainer.innerHTML += `
				<h3 style="margin-top: 20px; padding: 20px; background:#00cdb0; border: 1px solid #ddd; margin-bottom: 0px !important; color: #fff" class="sub-title">
					<strong>${activity.CUST || ''}</strong> &nbsp;-&nbsp; ${activity.CUST_NAME || ''}
				</h3>
				<table class="table table-bordered" style="margin-bottom: 0px">
					<thead>
					<tr class="mobile-space">
						<th width="50%">CUSTOMER'S ADDRESS</th>
						<th width="50%">ACTUAL LOCATION</th>
					</tr>
					</thead>
					<tbody>
					<tr class="mobile-space">
						<td data-label="CUSTOMER'S ADDRESS">
							<textarea name="address[]" placeholder="CTH : TULIS REMARK DISINI.." rows="5" class="form-control" readonly>${activity.ADDRESS || ''}</textarea>
						</td>
						<td data-label="ACTUAL LOCATION">
							<iframe style="height: 170px; width: 100%; margin-top: 10px" class="maps-frame" 
								src="https://maps.google.com/maps?q=${lat},${long}&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							<p style="text-transform: uppercase">${activity.ADDRESS_ACTUAL || ''}</p>
						</td>
					</tr>
					</tbody>
				</table>
				<table class="table table-bordered" style="margin-bottom: 0px">
					<thead>
					<tr class="mobile-space">
						<th width="50%">PLAN</th>
						<th width="50%">ACTUAL RESULT</th>
					</tr>
					</thead>
					<tbody>
					<tr class="mobile-space">
						<td data-label="PLAN">
						<textarea name="target_plan[]" placeholder="CTH : TULIS REMARK DISINI.." rows="5" class="form-control" readonly>${activity.TARGET_PLAN || 'ON PROGRESS'}</textarea>
						</td>
						<td data-label="ACTUAL RESULT">
						<textarea name="remark[]" placeholder="CTH : TULIS REMARK DISINI.." rows="5" class="form-control" readonly>${activity.REMARK || 'ON PROGRESS'}</textarea>
						</td>
					</tr>
					</tbody>
				</table>
				<table class="table table-bordered" style="margin-bottom: 20px">
					<thead>
					<tr class="mobile-space"><th>IMAGE</th></tr>
					</thead>
					<tbody>
					<tr class="mobile-space">
						<td data-label="IMAGE">
						<div style="margin-bottom: 10px; text-align: center; width: 100%">
							${imageHtml}
						</div>
						</td>
					</tr>
					</tbody>
				</table>
				`;
			});
		} else {
			activitiesContainer.innerHTML = `<p style="text-align:center; font-style:italic; color: red;">Tidak ada data aktivitas yang bisa ditampilkan.</p>`;
			console.log('plan_activities bukan array:', data.plan_activities);
		}

		// Render other activities tetap seperti modal kamu
		const othersContainer = document.getElementById('others_container');
		othersContainer.innerHTML = ''; // kosongkan dulu
		// ✅ Tambahkan pengecekan ini
		if (Array.isArray(data.other_activities)) {
			data.other_activities.forEach((other, index) => {
				// Parse koordinat
				const coords = (other.COORDINATE || '-6.2301638, 106.8311237').split(',');
				const lat = coords[0].trim();
				const long = coords[1].trim();
				let imageoHtml = '';

				if (other.OTHER_IMAGES && other.OTHER_IMAGES.length > 0) {
					other.OTHER_IMAGES.forEach(img => {
						imageoHtml += `
							<div style="display:inline-block; margin:5px; text-align:center;">
								<a class="buttons" href="<?= base_url('uploads/other/') ?>${img.IMAGE_PATH}" data-lightbox="mygallery">
									<img src="<?= base_url('uploads/other/') ?>${img.IMAGE_PATH}" alt="" width="100" style="object-fit: cover">
								</a>
							</div>
						`;
					});
				} else {
					imageoHtml = '<p style="text-align:center; font-style:italic;">No images uploaded.</p>';
				}

				othersContainer.innerHTML += `
				<h3 style="margin-top: 20px; padding: 20px; background:#00beee; border: 1px solid #ddd; margin-bottom: 0px !important; color: #fff; text-transform: uppercase" class="sub-title">
					NEW CUSTOMER - ${other.CUSTOMER || ''}
				</h3>
				<table class="table table-bordered" style="margin-bottom: 0px">
					<thead>
					<tr class="mobile-space">
						<th width="50%">CUSTOMER'S ADDRESS</th>
						<th width="50%">ACTUAL LOCATION</th>
					</tr>
					</thead>
					<tbody>
					<tr class="mobile-space">
						<td data-label="CUSTOMER'S ADDRESS">
							<input type="hidden" name="other_id[]" value="${other.ID || ''}">
							<textarea name="address_plan[]" placeholder="CTH : TULIS REMARK DISINI.." rows="5" class="form-control" readonly>${other.ADDRESS_PLAN || ''}</textarea>
						</td>
						<td data-label="ACTUAL LOCATION">
							<iframe style="height: 170px; width: 100%; margin-top: 10px" class="maps-frame" 
								src="https://maps.google.com/maps?q=${lat},${long}&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							<p style="text-transform: uppercase">${other.ADDRESS || ''}</p>
						</td>
					</tr>
					</tbody>
				</table>
				<table class="table table-bordered" style="margin-bottom: 0px">
					<thead>
					<tr class="mobile-space">
						<th width="50%">PLAN</th>
						<th width="50%">ACTUAL RESULT</th>
					</tr>
					</thead>
					<tbody>
					<tr class="mobile-space">
						<td data-label="PLAN">
						<textarea name="other_plan[]" placeholder="CTH : TULIS REMARK DISINI.." rows="5" class="form-control" readonly>${other.TARGET_PLAN || 'ON PROGRESS'}</textarea>
						</td>
						<td data-label="ACTUAL RESULT">
						<textarea name="other_remark[]" placeholder="CTH : TULIS REMARK DISINI.." rows="5" class="form-control" readonly>${other.REMARK || 'ON PROGRESS'}</textarea>
						</td>
					</tr>
					</tbody>
				</table>
				<table class="table table-bordered" style="margin-bottom: 20px">
					<thead>
					<tr class="mobile-space"><th>IMAGE</th></tr>
					</thead>
					<tbody>
					<tr class="mobile-space">
						<td data-label="IMAGE">
						<div style="margin-bottom: 10px; text-align: center; width: 100%">
							${imageoHtml}
						</div>
						</td>
					</tr>
					</tbody>
				</table>
				`;
			});
		} else {
			othersContainer.innerHTML = `<p style="text-align:center; font-style:italic; color: red;">Tidak ada data aktivitas yang bisa ditampilkan.</p>`;
			console.log('other_activities bukan array:', data.other_activities);
		}

		// Tampilkan modal
		document.getElementById('modalWrapper').style.display = 'block';
		})
		.catch(err => {
		console.error("Gagal parsing JSON:", err);
		});
	}

    function closeModal() {
        document.getElementById('modalWrapper').style.display = 'none';
    }

    function closeModalOutside(e) {
        if (e.target.id === 'modalWrapper') {
            closeModal();
        }
    }
</script>
