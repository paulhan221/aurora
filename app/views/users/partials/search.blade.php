  <div class="form-item -inline -padded">
    {{ Form::open(['action' => 'UsersController@search']) }}
      {{ Form::text('search_by', NULL, ['class' => 'text-field -search', 'placeholder' => 'Search by...']) }}

        {{ Form::submit('Email', ['name' => 'type', 'class' => 'button -secondary']) }}
        {{ Form::submit('Mobile', ['name' => 'type', 'class' => 'button -secondary']) }}
        {{ Form::submit('Drupal uid', ['name' => 'type', 'class' => 'button -secondary']) }}

<a class="button -tertiary" id="as-button">Advanced Search</a>
<div id="as-container">
	<h1>waka</h1>
</div>
  </div>
{{ Form::close () }}


<script>
 hide_advanced_search_button()
</script>
