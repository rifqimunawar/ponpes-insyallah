@extends('layouts.default')

@section('title', 'Wizards')

@push('scripts')
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/render.highlight.js"></script>
@endpush

@section('content')
	<!-- BEGIN breadcrumb -->
	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
		<li class="breadcrumb-item active">Wizards</li>
	</ol>
	<!-- END breadcrumb -->
	<!-- BEGIN page-header -->
	<h1 class="page-header">Wizards <small>header small text goes here...</small></h1>
	<!-- END page-header -->

	<!-- BEGIN row -->
	<div class="row">
		<!-- BEGIN col-6 -->
		<div class="col-xl-6">
			<!-- BEGIN panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">Wizard layout 1</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<p>Wizard layout include the number of step and text. Please do note that all the wizard is for uxui ONLY but do not include any javascript or backend logic.</p>
		
					<div class="nav-wizards-container">
						<nav class="nav nav-wizards-1 mb-2">
							<div class="nav-item col">
								<a class="nav-link completed" href="#">
									<div class="nav-no">1</div>
									<div class="nav-text">Completed step</div>
								</a>
							</div>
							<div class="nav-item col">
								<a class="nav-link completed" href="#">
									<div class="nav-no">2</div>
									<div class="nav-text">Second step</div>
								</a>
							</div>
							<div class="nav-item col">
								<a class="nav-link active" href="#">
									<div class="nav-no">3</div>
									<div class="nav-text">Active step</div>
								</a>
							</div>
							<div class="nav-item col">
								<a class="nav-link disabled" href="#">
									<div class="nav-no">4</div>
									<div class="nav-text">Disabled step</div>
								</a>
							</div>
							<div class="nav-item col">
								<a class="nav-link disabled" href="#">
									<div class="nav-no">5</div>
									<div class="nav-text">Last step</div>
								</a>
							</div>
						</nav>
					</div>
					<div class="card">
						<div class="card-body">
							wizard content here
						</div>
					</div>
				</div>
				<div class="hljs-wrapper">
					<pre><code class="html" data-url="/assets/data/form-wizards/code-1.json"></code></pre>
				</div>
			</div>
			<!-- END panel -->
		</div>
		<!-- END col-6 -->
	
		<!-- BEGIN col-6 -->
		<div class="col-xl-6">
			<!-- BEGIN panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">Wizard layout 2</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<p>Wizard layout include the number of step and text. Please do note that all the wizard is for uxui ONLY but do not include any javascript or backend logic.</p>
				
					<div class="nav-wizards-container">
						<nav class="nav nav-wizards-2 mb-3">
							<div class="nav-item col">
								<a class="nav-link completed" href="#">
									<div class="nav-text">1. Completed step</div>
								</a>
							</div>
							<div class="nav-item col">
								<a class="nav-link active" href="#">
									<div class="nav-text">2. Active step text</div>
								</a>
							</div>
							<div class="nav-item col">
								<a class="nav-link disabled" href="#">
									<div class="nav-text">3. Disabled step text</div>
								</a>
							</div>
						</nav>
					</div>
					<div class="card">
						<div class="card-body">
							wizard content here
						</div>
					</div>
				</div>
				<div class="hljs-wrapper">
					<pre><code class="html" data-url="/assets/data/form-wizards/code-2.json"></code></pre>
				</div>
			</div>
			<!-- END panel -->
		</div>
		<!-- END col-6 -->
	
		<!-- BEGIN col-6 -->
		<div class="col-xl-6">
			<!-- BEGIN panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">Wizard layout 3</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<p>Wizard layout include the number of step and text. Please do note that all the wizard is for uxui ONLY but do not include any javascript or backend logic.</p>
			
					<div class="nav-wizards-container">
						<nav class="nav nav-wizards-3 mb-2">
							<div class="nav-item col">
								<a class="nav-link completed" href="#">
									<div class="nav-dot"></div>
									<div class="nav-title">Step 1</div>
									<div class="nav-text">Completed step</div>
								</a>
							</div>
							<div class="nav-item col">
								<a class="nav-link completed" href="#">
									<div class="nav-dot"></div>
									<div class="nav-title">Step 2</div>
									<div class="nav-text">Second step</div>
								</a>
							</div>
							<div class="nav-item col">
								<a class="nav-link active" href="#">
									<div class="nav-dot"></div>
									<div class="nav-title">Step 3</div>
									<div class="nav-text">Active step</div>
								</a>
							</div>
							<div class="nav-item col">
								<a class="nav-link disabled" href="#">
									<div class="nav-dot"></div>
									<div class="nav-title">Step 4</div>
									<div class="nav-text">Disabled step</div>
								</a>
							</div>
							<div class="nav-item col">
								<a class="nav-link disabled" href="#">
									<div class="nav-dot"></div>
									<div class="nav-title">Step 5</div>
									<div class="nav-text">Last step</div>
								</a>
							</div>
						</nav>
					</div>
					<div class="card">
						<div class="card-body">
							wizard content here
						</div>
					</div>
				</div>
				<div class="hljs-wrapper">
					<pre><code class="html" data-url="/assets/data/form-wizards/code-3.json"></code></pre>
				</div>
			</div>
			<!-- END panel -->
		</div>
		<!-- END col-6 -->
	</div>
	<!-- END row -->
@endsection
