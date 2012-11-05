<!-- Estrutura -->
<div class="container">

	<br>
	<div class="page-header">
		<h2>Relatórios<small> do sistema</small></h2>
	</div>
	<br>

	<div class="">

		<ul class="nav nav-tabs">
			<li class="active"><a href="#lA" data-toggle="tab">Auditorias</a></li>
			<li><a href="#lB" data-toggle="tab">Não Conformidades</a></li>
			<li><a href="#lC" data-toggle="tab">Acões Corretivas</a></li>
		</ul>


      	<div class="tab-content">

	        <div class="tab-pane active" id="lA">

	        	<!-- Filtros -->
	        	<div class="">

					<label class="checkbox inline">
				 		<input type="checkbox" id="aud_agendada" value="agendada"> Agendada
					</label>

					<label class="checkbox inline">
				  		<input type="checkbox" id="aud_executada" value="executada"> Executada
					</label>

				</div>

				<br>

				<table id="tab_auditoria" class='table table-bordered table-striped'>
					<thead>
						<tr>
							<th>Projeto</th>
							<th>Unidade</th>
							<th>Departamento</th>
							<th>Status</th>
						</tr>
					</thead>
								
					<tbody>
							{auditorias}
							<tr>
								<td>{projetoNome}</td>
								<td>{unidadeNome}</td>
								<td>{departamentoNome}</td>
								<td><span id="status" class="label label-{statusCode}">{statusNome}</span></td>		
							</tr>
							{/auditorias}
					</tbody>
				</table>


	        </div>


		    <!-- NC -->
		    <div class="tab-pane" id="lB">
		        	
	        	<!-- Filtros -->
	        	<div class="">

					<label class="checkbox inline">
				 		<input type="checkbox" id="nc_aberta" value="aberta"> Aberta
					</label>

					<label class="checkbox inline">
				  		<input type="checkbox" id="nc_fechada" value="fechada"> Fechada
					</label>

				</div>

				<br>

				<table id="tab_nc" class='table table-bordered table-striped'>
					<thead>
						<tr>
							<th>NC</th>
							<th>Artefato</th>
							<th>Status</th>
						</tr>
					</thead>
								
					<tbody>
						{ncs}
							<tr>
								<td>{ncDescricao}</td>
								<td>{artefatoNome}</td>
								<td><span id="status" class="label label-{statusCode}">{statusNome}</span></td>		
							</tr>
						{/ncs}
					</tbody>
				</table>

			</div>

			<!-- AC -->
		    <div class="tab-pane" id="lC">
		        	
	        	<!-- Filtros -->
	        	<div class="">

					<label class="checkbox inline">
				 		<input type="checkbox" id="ac_agendada" value="agendada"> Agendada
					</label>

					<label class="checkbox inline">
				  		<input type="checkbox" id="ac_executada" value="executada"> Executada
					</label>

					<label class="checkbox inline">
				  		<input type="checkbox" id="ac_retornada" value="retornada"> Retornada
					</label>

					<label class="checkbox inline">
				  		<input type="checkbox" id="ac_fechada" value="fechada"> Fechada
					</label>

				</div>

				<br>

				<table id="tab_ac"class='table table-bordered table-striped'>
					<thead>
						<tr>
							<th>AC</th>
							<th>Status</th>
						</tr>
					</thead>
								
					<tbody>
						{acs}
							<tr>
								<td>{acDescricao}</td>
								<td><span id="status" class="label label-{statusCode}">{statusNome}</span></td>
							</tr>
						{/acs}
					</tbody>
				</table>

			</div>

      	</div>
  	</div>

	<br>

<script type="text/javascript">
    var path = '<?php echo site_url(); ?>'
</script>
