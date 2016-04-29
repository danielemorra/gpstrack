<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'GpsTrack 1.3';
?>
<div class="site-index">

<!--     <div class="jumbotron"> -->
<!--         <h1>Congratulations!</h1> -->

<!--         <p class="lead">You have successfully created your Yii-powered application.</p> -->

<!--         <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
<!--     </div> -->

    <div class="body-content">

		<?php $form = ActiveForm::begin([
				'id' => 'statistiche-form',
				'options' => ['class' => 'form-inline'],
				'fieldConfig' => [
//	            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
						'template' => "<div>{label}\n{input}</div><div class=\"col-lg-8\">{error}</div>",
						'labelOptions' => ['class' => 'col-lg-1 control-label'],
				],
		]); ?>

		<div style="background-color: #ccffcc; padding: 4px; margin-bottom: 8px;">
			<h2>
				<?php $modelHomeStat->annoStatistiche = !isset($modelHomeStat->annoStatistiche) ? date('Y') : $modelHomeStat->annoStatistiche; ?>
				Statistiche Annuali per l'anno <?= $form->field($modelHomeStat, 'annoStatistiche')->textInput(array(
//					'value' => date("Y"),
					'maxlength'=>4,
					'placeholder' => date("Y"),
				))->label(false) ?>
			    <div class="form-group">
			        <div class="col-lg-offset-1 col-lg-11">
			            <?= Html::submitButton('Aggiorna', ['class' => 'btn btn-primary', 'name' => 'update-statistiche-button']) ?>
			        </div>
			    </div>
    		</h2>
			<table class="responsive-table riep-curr-year-BDC-labels">
				<thead>
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
					<td><em><?= number_format($array['kmBdcAnnui'],1,',','.'); ?></em></td>
					<td class="border-right-grey text-color-blue"><em><?= number_format($array['salBdcAnnui'],0,',','.'); ?></em></td>
					<td><em><?= number_format($array['kmMtbAnnui'],1,',','.'); ?></em></td>
					<td class="border-right-grey text-color-blue"><em><?= number_format($array['salMtbAnnui'],0,',','.'); ?></em></td>
					<td><em><?= number_format($array['kmRunAnnui'],1,',','.'); ?></em></td>
					<td class="border-right-grey text-color-blue"><em><?= number_format($array['salRunAnnui'],0,',','.'); ?></em></td>
				</tr>
				</tbody>
			</table>


			<h2>
				<?php $modelHomeStat->meseStatistiche = !isset($modelHomeStat->meseStatistiche) ? date('n') : $modelHomeStat->meseStatistiche; ?>
				Statistiche Mensili per <?= $form->field($modelHomeStat, 'meseStatistiche')->dropDownList(
											$listMesi,
										['prompt' => 'Seleziona il mese']
				)
				->label(false) ?>
				<div class="form-group">
					<div class="col-lg-offset-1 col-lg-11">
						<?= Html::submitButton('Aggiorna', ['class' => 'btn btn-primary', 'name' => 'update-statistiche-button']) ?>
					</div>
				</div>
			</h2>
			<table class="responsive-table riep-curr-year-BDC-labels">
				<thead>
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
					<td><em><?= number_format($array['kmBdcMese'],1,',','.'); ?></em></td>
					<td class="border-right-grey text-color-blue"><em><?= number_format($array['salBdcMese'],0,',','.'); ?></em></td>
					<td><em><?= number_format($array['kmMtbMese'],1,',','.'); ?></em></td>
					<td class="border-right-grey text-color-blue"><em><?= number_format($array['salMtbMese'],0,',','.'); ?></em></td>
					<td><em><?= number_format($array['kmRunMese'],1,',','.'); ?></em></td>
					<td class="border-right-grey text-color-blue"><em><?= number_format($array['salRunMese'],0,',','.'); ?></em></td>
				</tr>
				</tbody>
			</table>
		</div>

	    <?php ActiveForm::end(); ?>

		<?php $form = ActiveForm::begin([
			'id' => 'obiettivi-form',
			'options' => ['class' => 'form-inline'],
			'fieldConfig' => [
				'template' => "<div>{label}\n{input}</div><div class=\"col-lg-8\">{error}</div>",
				'labelOptions' => ['class' => 'col-lg-1 control-label'],
			],
		]); ?>

		<div style="background-color: #9acfea; padding: 4px; margin-bottom: 8px;">
			<h2>
				Obiettivi <?= $form->field($modelHomeObiet, 'annoObiettivi')->textInput(array(
//						'value' => date("Y"),
					'maxlength'=>4,
					'placeholder' => date("Y"),
				))->label(false) ?>
				<div class="form-group">
					<div class="col-lg-offset-1 col-lg-11">
						<?= Html::submitButton('Aggiorna', ['class' => 'btn btn-primary', 'name' => 'update-obiettivi-button']) ?>
					</div>
				</div>
			</h2>
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
						<td><em><?= $array['kmBdcAnnui']; ?></em></td>
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
						<td><em><?= $array['kmMtbAnnui']; ?></em></td>
						<td><em><?= $array['totWeekRemain']; ?></em></td>
						<td><em><?= number_format($array['totKmWeekToDo'],2,',','.'); ?></em></td>
					</tr>
					</tbody>
				</table>
			<?php } else echo "Non e' presente nessun obiettivo per la distanza da percorrere in MTB." ?>
		</div>

		<?php ActiveForm::end(); ?>

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
