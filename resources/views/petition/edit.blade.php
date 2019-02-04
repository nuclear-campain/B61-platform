@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Petition text</h1>
            <div class="page-subtitle">Modify the text</div>

            <div class="page-options d-flex">
                <a href="" class="btn tw-rounded shadow-sm btn-primary">
                    <i class="fe fe-edit-2 mr-1"></i> Signatures
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <form method="POST" action="" class="card card-body">
            @csrf {{-- Form field protection --}}
            @include ('flash::message') {{-- Flash session view partial --}}
        </form>
    </div>
@endsection