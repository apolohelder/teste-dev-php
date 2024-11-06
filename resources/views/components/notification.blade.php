<div class="position-absolute top-0 end-0">

    {{--  @if (session('status'))
        {{ session('status') }}
    @endif  --}}

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <p class="m-0"><strong>Aviso</strong></p>
            <p class="m-0">{{ session('success') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <p class="m-0"><strong>Aviso</strong></p>
            <p class="m-0">{{ session('error') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                <p class="m-0"><strong>Aviso</strong></p>
                <p class="m-0">{{ $error }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
</div>
