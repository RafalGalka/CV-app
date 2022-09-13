
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="recipe">Receptura</label>
        <select wire:model="selectedRecipe" name="recipe" class="form-control @error('recipe') is-invalid @enderror">
            @foreach ($recipes as $recipe)
                <option value={{ $recipe->recipe_number }}>{{ $recipe->recipe_number }}</option>
            @endforeach
        </select>
    </div>
        @error('recipe')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

    <div class="form-group col-md-3">
        <label for="recipe_add">Dodaj recepturę</label>
        <a class="btn btn-primary" name="recipe_add" href="recipes.add.html" onclick="window.open('/recipes/add'); return false;">Dodaj recepturę</a>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sd-3">
        <label for="compression_class">Klasa wytrzymałości</label>
        <input type="text" @if ($dataRecipe) value="{{ $dataRecipe->strenght_class }}" @endif class="form-control @error('compression_class') is-invalid @enderror"
        id="compression_class" name="compression_class" readonly/>
    </div>
        @error('compression_class')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror


    <div class="form-group col-sd-2">
        <label for="waterproof">Klasa wodoszczelności</label>
        <input type="text" @if ($dataRecipe) value="{{ $dataRecipe->waterproof }}" @endif class="form-control @error('waterproof') is-invalid @enderror"
        id="waterproof" name="waterproof" readonly/>
        @error('waterproof')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

    </div>

    <div class="form-group col-md-3">
        <label for="other_class">Inne cechy</label>
        <input type="text" @if ($dataRecipe) value="Ś/{{ $dataRecipe->rate_time }}d {{ $dataRecipe->properties}}" @endif class="form-control @error('other_class') is-invalid @enderror" id="other_class"
            name="other_class" readonly/>
    </div>
    @error('other_class')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror

</div>


