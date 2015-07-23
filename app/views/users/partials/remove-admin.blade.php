<div class="make-admin-header">
	Danger Zone
</div>
<div class="container__block make-admin-container">
	<h4>Remove this user an admin</h4>
	<p>Admin user is able to modify other users information</p>
	{{ Form::open(['route' => array('admin.remove', $northstar_profile['_id'])]) }}
	{{ Form::submit('Remove admin', ['class' => 'button -secondary']) }}
	{{ Form::close() }}
</div>