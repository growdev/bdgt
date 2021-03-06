<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-navbar">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ route('index') }}">
				<img class="navbar-brand-image" alt="bdgt" src="/favicon.png">
				<span>bdgt</span>
			</a>
		</div>

		<div class="collapse navbar-collapse" id="primary-navbar">
			<ul class="nav navbar-nav">
				@if (Auth::user())
				<li class="{{ (request()->route()->getName() == 'dashboard' ? 'active' : '') }}"><a href="{{ route('dashboard') }}">Dashboard</a></li>
				<li class="{{ (strpos(request()->route()->getName(), 'goals') !== false ? 'active' : '') }}"><a href="{{ route('goals.index') }}">{{ trans('labels.goals.plural') }}</a></li>
				<li class="{{ (strpos(request()->route()->getName(), 'bills') !== false ? 'active' : '') }}"><a href="{{ route('bills.index') }}">{{ trans('labels.bills.plural') }}</a></li>
				<li class="{{ (strpos(request()->route()->getName(), 'import') !== false ? 'active' : '') }}"><a href="{{ route('import.index') }}">{{ trans('labels.import.singular') }}</a></li>
				<li class="dropdown {{ (strpos(request()->route()->getName(), 'reports') !== false ? 'active' : '') }}">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('labels.reports.plural') }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="/reports/categorial">{{ trans('labels.reports.spending_by_category') }}</a></li>
						<li><a href="/reports/spending">{{ trans('labels.reports.spending_over_time') }}</a></li>
					</ul>
				</li>
				@endif
				<li class="dropdown {{ (strpos(request()->route()->getName(), 'calculators') !== false ? 'active' : '') }}">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('labels.calculators.plural') }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ route('calculators.debt') }}">Debt Calculator</a></li>
						<!--<li><a href="{{ route('calculators.savings') }}">Savings Calculator</a></li>-->
					</ul>
				</li>
			</ul>
			<!--
			@if (Auth::user())
			<form class="navbar-form navbar-left" role="search">
				<a href="#addTransactionModal" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i> Add Transaction</a>
			</form>
			@endif
			-->

			<ul class="nav navbar-nav navbar-right">
				@if (Auth::guest())
					<li><a href="/login">{{ trans('labels.auth.login') }}</a></li>
					<?php //<li><a href="/register">{{ trans('labels.auth.register') }}</a></li> ?>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Account <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<form action="/logout" method="POST">
									<button class="btn btn-link" type="submit">{{ trans('labels.auth.logout') }}</button>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</form>
							</li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>
