@extends('layouts.app')

@section('content')
<div class="x_panel">
	<div class="x_title">
		<h2>Empresas</h2>
		<ul class="nav navbar-right panel_toolbox">
			@if( $empresas->isEmpty() )
			<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
			@else
			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
			@endif
			<li><a class="close-link"><i class="fa fa-close"></i></a></li>
		</ul>
		<div class="clearfix"></div>
		
		<!-- Button Cadastro -->
		<button type="button" data-toggle="modal" data-target="#exampleModal" 
			data-rota="{{route('empresa.create')}}" class="btn btn-xs btn-success">
			<i class="fa fa-plus"></i> | Cadastrar Nova Empresa
		</button>
		<!-- END Button Cadastro -->
		
	</div>
	@if( $empresas->isEmpty() )
	<div class="x_content" style="display: none;">
	@else
	<div class="x_content">
	@endif
		<div class="row">
			<div class="col-sm-12">
			
				<div class="table-responsive">
					<table id="tabelacargos" class="table table-bordered table-hover table-striped">
						<thead align="center">
							<tr>
								<th>Fantasia</th>
								<th>CNPJ</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
						@forelse($empresas as $empresa)
							<tr>
								<td>{{$empresa->fantasia}}</td>
								<td>{{$empresa->CNPJ}}</td>
								<td>
									<button type="button" class="btn btn-primary btn-circle" 
									data-toggle="modal" data-target="#exampleModal" data-rota="{{route('empresa.show', $empresa->id)}}">
									<i class="fa fa-search" aria-hidden="true"></i></button>
									
									<!-- @ can('membro_update')  -->
									<button type="button" class="btn btn-sm btn-warning btn-circle" 
									data-toggle="modal" data-target="#exampleModal" data-rota="{{route('empresa.edit', $empresa->id)}}">
										<i class="fa fa-edit" aria-hidden="true"></i></button>
									<!-- @ endcan -->
								</td>
							</tr>
						@empty
							<p><b>Sistema Não Possui Empresas Cadastradas!</b></p>
						@endif
						</tbody>
					</table>
				</div>
			
			</div>
		</div>

	</div>
</div>
@endsection

@push('scripts')
	@include('layouts.modal')
@endpush