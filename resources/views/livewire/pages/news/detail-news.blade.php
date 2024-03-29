@push('style')
    <style>
        .image {
            text-align: center;
        }

        img {
            max-width: 500px;
        }
    </style>
@endpush
<div>
    <div class="card p-3">
        <div class="card-header">
            <div class="d-flex justify-content-start">
                <a href="{{ route('news') }}" class="h5">
                    <i class='bx bx-arrow-back'></i> Back
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="container">
                {!! $news->description !!}
            </div>
        </div>
    </div>
</div>
