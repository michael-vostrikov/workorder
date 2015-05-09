<?php
use yii\helpers\Url;


function showLink($route, $text)
{
	$hasAccess = Yii::$app->user->can('/*');
	if (!$hasAccess)
	{
		$hasAccess = Yii::$app->user->can($route);
	}
	
	if (!$hasAccess)
	{
		$parts = explode('/', $route);
		array_pop($parts);
		array_push($parts, '*');
		$commonRoute = implode('/', $parts);
		
		$hasAccess = Yii::$app->user->can($commonRoute);
	}
	
	if ($hasAccess)
	{
		?><a href="<?= Url::to([$route]) ?>"><?= $text ?></a><br/><?php
	}
}

?>

<div class="nav-tables">
	<?php
		if (Yii::$app->user->can('admin'))
		{
			showLink('/ad-specification/', 'Ad Specifications');
			showLink('/company/', 'Company');
			showLink('/customer/', 'Customers');
			showLink('/photo-details/', 'Photo Details');
			showLink('/photo-location/', 'Photo Locations');
			showLink('/priority-level/', 'Priority Levels');
			showLink('/spec-information/', 'Spec Information');
			showLink('/status/', 'Status');
			showLink('/work-order-type/', 'Work Order Type');
			showLink('/work-order/', 'Work Orders');
			echo '<a href="">- History</a><br/>';
			echo '<br/><br/>';
			
			showLink('/user/admin', 'Users');
			showLink('/admin/assignment', 'Assignments');
			showLink('/admin/route', 'Routes');
			showLink('/admin/role', 'Roles');
		}
		else if (Yii::$app->user->can('user'))
		{
			showLink('/customer/', 'Customers');
			showLink('/work-order/', 'Work Orders');
		}
	?>
</div>
