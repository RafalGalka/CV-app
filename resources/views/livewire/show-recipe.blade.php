<div class="form-row">
    <div class="form-group col-md-4">
        <label for="recipe">Receptura</label>

        <select wire:model="selectedRecipe" name="recipe" class="form-control @error('recipe') is-invalid @enderror">
            <option value=""> --wybierz-- </option>
            @foreach ($recipes as $recipe)
                <option value={{ $recipe->recipe_number }}>{{ $recipe->recipe_number }}</option>
            @endforeach
        </select>
    </div>
        @error('recipe')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

    <div class="form-group col-md-2">
        <label for="compression_class">Klasa betonu</label>
        <input type="text" class="form-control @error('compression_class') is-invalid @enderror"
            id="compression_class" name="compression_class" />
    </div>
        @error('compression_class')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

    <div class="form-group col-md-3">
        <label for="other_class">Inne cechy</label>
        <input type="text" class="form-control @error('other_class') is-invalid @enderror" id="other_class"
            name="other_class" />
    </div>
    @error('other_class')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
