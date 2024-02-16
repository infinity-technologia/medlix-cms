<div>
    <div class="card">
        <form wire:submit="save" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                imageDefault="{{ $image }}" name="image" />
                        </div>

                    </div>
                    <div class="col-md-6" id="inpList">
                        <div class="form-group">
                            <label for="inpTitle">About Title</label>
                            <input type="text" class="form-control" wire:model="title" id="inpTitle">
                        </div>

                        <div class="form-group mt-3">
                            <label>About List</label>
                            <br>
                            @if (!$model)
                                <div class="input-group mb-3">

                                    <textarea name="fistList" class="form-control" id="" cols="30" rows="2" wire:model="fistList"></textarea>
                                    <button type="button" class="btn btn-danger" wire:click="removeArr">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            @endif

                            @foreach ($lists as $index => $post)
                                <div class="input-group mb-2">
                                    <textarea name="lists.{{ $index }}" class="form-control" id="" cols="30" rows="2"
                                        wire:model="lists.{{ $index }}"></textarea>

                                    {{-- <input type="text" class="form-control" wire:model="lists.{{ $index }}"> --}}
                                    <button type="button" class="btn btn-danger"
                                        wire:click="removeItem({{ $index }})">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            @endforeach

                            <button type="button" class="btn btn-success btn-sm" wire:click="addItem">
                                <i class="bx bx-plus"></i> Add Item
                            </button>

                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>
                    Submit</button>
            </div>
        </form>
    </div>
</div>
