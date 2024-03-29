<div class="row mb-3">
    <div class="col">
        <x-componen-form.input-image-dropify label='Thumbnail News' wireModel="thumbnail" imageDefault=""
            imageDefault="{{ $thumbnail }}" name="thumbnail">
            @slot('classInputValidate')
            @error('thumbnail')
            is-invalid
            @enderror
            @endslot
        </x-componen-form.input-image-dropify>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <x-componen-form.input-form idInput="title" label="Title News" wireModel="title" placeholder="News Title"
            name="title" classInput="col" classLabels="col-sm-3">
            @slot('classInputInsite')
            @error('title')
            is-invalid
            @enderror
            @endslot
        </x-componen-form.input-form>
        @error('title')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
</div>
<div x-data="{ link: false, descriptions: false }" x-init="link = {{ $check ? 'true' : 'false' }};
         descriptions = {{ $description ? 'true' : 'false' }};">
    <div class="row mb-3 p-3">
        <div class="form-check col-lg-2">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                @click="link = true; descriptions = false" x-bind:checked="link">
            <label class="form-check-label" for="flexRadioDefault1">
                Links
            </label>
        </div>
        <div class="form-check col-lg-2">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                @click="link = false; descriptions = true" x-bind:checked="descriptions">
            <label class="form-check-label" for="flexRadioDefault2">
                Article
            </label>
        </div>
    </div>
    <div class="row mb-3" wire:ignore>
        <hr>
        <div class="col-md-12" x-show="descriptions">
            <h5 class="text-center mt-3 mb-2">The News Artile</h5>
            {{-- <label class="h5">The News Article</label> --}}
            <textarea class="form-control @error('description') is-invalid @enderror" wire:model='description'
                placeholder="Leave a comment here" id="editor" style="height: 500px"></textarea>
        </div>
        <div class="col" x-show="link">
            <x-componen-form.input-form idInput="Link" type="url" label="News Link" wireModel="check"
                placeholder="URL-to://" name="check" classInput="col" classLabels="col-sm-3">
                @slot('classInputInsite')
                @error('check')
                is-invalid
                @enderror
                @endslot
            </x-componen-form.input-form>
            @error('check')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="d-flex flex-row-reverse bd-highlight">
    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Submit</button>
</div>
