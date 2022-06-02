<div>
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="client_id">Zleceniodawca</label>
        <select wire:model="selectedClient" name="client_id" class="form-control @error('client_id') is-invalid @enderror">
            <option value=""> --wybierz-- </option>
            @foreach ($clients as $client)
                <option value={{ $client->id }}>{{ $client->short_name }}</option>
            @endforeach
        </select>
        @error('client_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="invest_id">Inwestycja</label>
        <select wire:model="selectedInvest" class="form-control @error('invest_id') is-invalid @enderror" id="invest_id" name="invest_id" @if (empty($selectedClient)) disabled @endif >
            <option selected value=""> --wybierz-- </option>
            @foreach ($invests as $invest)
                <option value={{ $invest->id }}>{{ $invest->short_name }}</option>
            @endforeach
        </select>
        @error('invest_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        </select>
    </div>
    @error('invest_id')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror

</div>

@if ( $prot == "PO")

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="recipe">Receptura</label>
        <select wire:model="selectedRecipe" name="recipe" class="form-control @error('recipe') is-invalid @enderror" @if (empty($selectedInvest && $selectedClient)) disabled @endif>
            <option value="" checked> --wybierz-- </option>
            @foreach ($recipes as $recipe)
                <option value={{ $recipe->recipe_number }}>{{ $recipe->recipe_number }}</option>
            @endforeach
        </select>
    </div>
        @error('recipe')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
</div>

<div class="form-row">
    <div class="form-group col-md-2">
        <label for="compression_class">Klasa betonu</label>
        <input type="text" @if ($dataRecipe) value="{{ $dataRecipe->strenght_class }}" @endif class="form-control @error('compression_class') is-invalid @enderror"
            id="compression_class" name="compression_class" readonly/>
    </div>
        @error('compression_class')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror


    <div class="form-group col-sd-2">
        <label for="waterproof">Klasa wodoszczelności</label>
        <input type="text" @if ($dataRecipe) value="@if($dataRecipe->waterproof){{ $dataRecipe->waterproof}}/{{ $dataRecipe->w_days}}d @endif" @endif class="form-control @error('waterproof') is-invalid @enderror" id="waterproof"
            name="waterproof" readonly />
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

@endif
</div>
