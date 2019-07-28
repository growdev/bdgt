<option></option>
@foreach ($categories->sortBy('label') as $category)
	<option value="{{ $category->id }}">{{ $category->label }}</option>
@endforeach