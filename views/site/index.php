<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

<!--     <div class="jumbotron"> -->
<!--         <h1>Congratulations!</h1> -->

<!--         <p class="lead">You have successfully created your Yii-powered application.</p> -->

<!--         <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
<!--     </div> -->

    <div class="body-content">

    	<h2>Statistiche <?= date("Y") ?></h2>
		<table class="responsive-table riep-curr-year-BDC-labels">
			<thead>
<!-- 			<tr> -->
<!-- 				<th colspan="2" class="tb-border-right-white">BDC</th> -->
<!-- 				<th colspan="2" class="tb-border-right-white">MTB</th> -->
<!-- 				<th colspan="2">CORSA</th> -->
<!-- 			</tr> -->
			<tr>
				<th>BDC Km</th>
				<th class="border-right-grey text-color-blue">BDC Dsl</th>
				<th>MTB Km</th>
				<th class="border-right-grey text-color-blue">MTB Dsl</th>
				<th>RUN Km</th>
				<th class="border-right-grey text-color-blue">RUN Dsl</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><em><?= number_format($array['kmBdcCurrYear'],1,',','.'); ?></em></td>
				<td class="border-right-grey text-color-blue"><em><?= number_format($array['salBdcCurrYear'],0,',','.'); ?></em></td>
				<td><em><?= number_format($array['kmMtbCurrYear'],1,',','.'); ?></em></td>
				<td class="border-right-grey text-color-blue"><em><?= number_format($array['salMtbCurrYear'],0,',','.'); ?></em></td>
				<td><em><?= number_format($array['kmRunCurrYear'],1,',','.'); ?></em></td>
				<td class="border-right-grey text-color-blue"><em><?= number_format($array['salRunCurrYear'],0,',','.'); ?></em></td>
			</tr>
			</tbody>
		</table>        		
				
	    <h2>Obiettivi <?= date("Y") ?></h2>
		<h3>km percorsi in BDC</h3>
	    <?php if ($modelParamBdc != null) { ?>
		<table class="responsive-table obiettivo-km-bdc-1-labels">
			<thead>
			<tr>
				<th>Obiettivo</th>
				<th>Numero settimane annue</th>
				<th>Km (ipotetici) da fare/settimana</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><em><?= number_format($modelParamBdc->par_campo_num,2,',','.'); ?></em></td>
				<td><em><?= $array['totWeekOfYear']; ?></em></td>
				<td><em><?= number_format($array['totKmPerWeek'],2,',','.'); ?></em></td>
			</tr>
			</tbody>
		</table>        		
		<table class="responsive-table obiettivo-km-bdc-2-labels">
			<thead>
			<tr>
				<th>Km percorsi</th>
				<th>Settimane mancanti</th>
				<th>Km da fare/settimana</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><em><?= $array['kmBdcCurrYear']; ?></em></td>
				<td><em><?= $array['totWeekRemain']; ?></em></td>
				<td><em><?= number_format($array['totKmWeekToDo'],2,',','.'); ?></em></td>
			</tr>
			</tbody>
		</table>
	    <?php } else echo "Non e' presente nessun obiettivo per la distanza da percorrere in BDC." ?>
		<h3>km percorsi in MTB</h3>
	    <?php if ($modelParamMtb != null) { ?>
		<table class="responsive-table obiettivo-km-mtb-1-labels">
			<thead>
			<tr>
				<th>Obiettivo</th>
				<th>Numero settimane annue</th>
				<th>Km (ipotetici) da fare/settimana</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><em><?= number_format($modelParamMtb->par_campo_num,2,',','.'); ?></em></td>
				<td><em><?= $array['totWeekOfYear']; ?></em></td>
				<td><em><?= number_format($array['totKmPerWeek'],2,',','.'); ?></em></td>
			</tr>
			</tbody>
		</table>        		
		<table class="responsive-table obiettivo-km-mtb-2-labels">
			<thead>
			<tr>
				<th>Km percorsi</th>
				<th>Settimane mancanti</th>
				<th>Km da fare/settimana</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><em><?= $array['kmMtbCurrYear']; ?></em></td>
				<td><em><?= $array['totWeekRemain']; ?></em></td>
				<td><em><?= number_format($array['totKmWeekToDo'],2,',','.'); ?></em></td>
			</tr>
			</tbody>
		</table>
	    <?php } else echo "Non e' presente nessun obiettivo per la distanza da percorrere in MTB." ?>
	    
	    <h2>Usura componenti BDC</h2>
		<strong>Lista componenti ordinata a partire dal + utilizzato</strong>
	    <?php if (count($kmCompBdcArray) > 0): ?>
		<table class="responsive-table usura-componenti-labels">
		  <thead>
		    <tr>
		      <th><?php echo implode('</th><th>', array_keys(current($kmCompBdcArray))); ?></th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php foreach ($kmCompBdcArray as $row): array_map('htmlentities', $row); ?>
		    <tr>
		      <td><?php echo implode('</td><td>', $row); ?></td>
		    </tr>
		  <?php endforeach; ?>
		  </tbody>
		</table>
		<?php endif; ?>

	    <h2>Usura componenti MTB</h2>
		<strong>Lista componenti ordinata a partire dal + utilizzato</strong>
	    <?php if (count($kmCompMtbArray) > 0): ?>
		<table class="responsive-table usura-componenti-labels">
		  <thead>
		    <tr>
		      <th><?php echo implode('</th><th>', array_keys(current($kmCompMtbArray))); ?></th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php foreach ($kmCompMtbArray as $row): array_map('htmlentities', $row); ?>
		    <tr>
		      <td><?php echo implode('</td><td>', $row); ?></td>
		    </tr>
		  <?php endforeach; ?>
		  </tbody>
		</table>
		<?php endif; ?>
	</div>        		
</div>
