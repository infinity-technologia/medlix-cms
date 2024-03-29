<div>
    <div class="card p-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation" wire:ignore.self>
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    wire:ignore.self role="tab" aria-controls="home" aria-selected="true">
                    <i class='bx bxs-like'></i>
                    Keunggulan</button>
            </li>
            <li class="nav-item" role="presentation" wire:ignore.self>
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    wire:ignore.self role="tab" aria-controls="profile" aria-selected="false">
                    <i class='bx bx-windows'></i>
                    Maps</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent" wire:ignore.self>
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"
                wire:ignore.self>
                <div x-data="{ detail: true, edit: false }" x-init="$wire.on('showdetail', (event) => {
                    detail = event[0].detail;
                    edit = event[0].edit;
                })">
                    <div x-show="detail" x-transition>
                        @include('pages.keunggulan.form-detail')
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <button @click="edit = true; detail=false" class="btn btn-primary">
                                <i class='bx bxs-edit'></i>
                                Add/Edit</button>
                        </div>
                    </div>
                    <div x-show="edit" x-transition>
                        <form wire:submit='save'>
                            @include('pages.keunggulan.form-edit')
                            <div class="d-flex justify-content-end gap-3">
                                <button @click="edit = false;detail=true" type="button" class="btn btn-warning mr-2">
                                    <i class='bx bx-x'></i>
                                    Cancel</button>
                                    <button class="btn btn-primary" type="submit"  wire:loading.attr="disabled" :disabled="$isSubmitting">
                                        <i class="bx bx-save"></i>
                                        <span wire:loading.remove>Save</span>
                                        <span wire:loading>Loading...</span>
                                    </button>
                                    <!-- Loading Indicator -->
                                    <span wire:loading>Loading...</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" wire:ignore.self>
                <div x-data="{ details: true, edits: false }" x-init="$wire.on('showdetailKeunggulan', (event) => {
                    details = event[0].details;
                    edits = event[0].edits;
                })" wire:ignore.self>
                    <div x-show="details" x-transition wire:ignore.self>
                        @include('pages.indonesia-keunggulan.form-detail')
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <button @click="edits = true; details=false" class="btn btn-primary">
                                <i class='bx bxs-edit'></i>
                                Edit</button>
                        </div>
                    </div>
                    <div x-show="edits" x-transition wire:ignore.self>
                        <form wire:submit='saveKeunggulan'>
                            @include('pages.indonesia-keunggulan.form-edit')
                            <div class="d-flex justify-content-end gap-3">
                                <button @click="edits = false; details=true" type="button" class="btn btn-warning">
                                    <i class='bx bx-x'></i>
                                    Cancel</button>
                                    <button class="btn btn-primary" type="submit"  wire:loading.attr="disabled" :disabled="$isSubmitting">
                                        <i class="bx bx-save"></i>
                                        <span wire:loading.remove>Save</span>
                                        <span wire:loading>Loading...</span>
                                    </button>
                                    <!-- Loading Indicator -->
                                    <span wire:loading>Loading...</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
    @script
        <script>
            $wire.on('renderDrofi', (event) => {
                setTimeout(() => {
                    $('.dropify').dropify();
                }, 500);
            });
        </script>
    @endscript

    <script></script>
@endpush
