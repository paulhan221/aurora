<div class="form-item -inline -padded" id="normal-search-container">
  {{ Form::open(['action' => 'UsersController@search']) }}
    {{ Form::text('search_by', NULL, ['class' => 'text-field -search', 'placeholder' => 'Search a user']) }}
    {{ Form::submit('Search', ['name' => 'type', 'class' => 'button -secondary']) }}
  {{ Form::close () }}
</div>

<a href="#" id="advanced-search-link">Advanced Search Options</a>

<div id="advanced-search-container" class="container__block -narrow">
  {{ Form::open(array('url' => '/advanced-search')) }}
  {{ Form::label('source', 'Source', ['class' => 'field-label']) }}
  <label class="option -radio">
    {{ Form::radio('source', 'agg', false) }}
    <span class="option__indicator"></span>
    {{ Form::label('Agg') }}
  </label>
  <label class="option -radio">
    {{ Form::radio('source', 'cgg', false) }}
    <span class="option__indicator"></span>
    {{ Form::label('Cgg') }}
  </label>
  <label class="option -radio">
    {{ Form::radio('source', 'drupal', false) }}
    <span class="option__indicator"></span>
    {{ Form::label('Drupal') }}
  </label>
  <label class="option -radio">
    {{ Form::radio('source', 'services', false) }}
    <span class="option__indicator"></span>
    {{ Form::label('Services') }}
  </label>
  <div class="form-item -inline">
    {{ Form::label('country', 'Country', ['class' => 'field-label']) }}
    {{ Form::text('country', NULL, ['class' => 'text-field']) }}
  </div>
  {{ Form::submit('Search', ['class' => 'button -secondary'])}}
  {{ Form::close() }}
</div>