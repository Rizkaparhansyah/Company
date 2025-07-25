@extends('index')
@section('title')
    Dashboard
@endsection
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            
        </div>
        <div class="row">
            {{-- Loop Donasi --}}
            @foreach ($datas['donasi'] as $item)
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card card-img-holder">
                        <div class="card-body">
                            <h4 class="font-weight-normal mb-3">
                                {{ $item['label'] }}
                                @if (isset($item['icon']))
                                    <i class="mdi {{ $item['icon'] }} mdi-24px float-right"></i>
                                @endif
                            </h4>
                            <h2 class="mb-2">{{ 'Rp ' . number_format($item['value'], 0, ',', '.') }}</h2>

                            @if (isset($item['change']))
                                @if ($item['change'] > 0)
                                    <h6 class="card-text text-success">Increased by {{ $item['change'] }}%</h6>
                                @elseif ($item['change'] < 0)
                                    <h6 class="card-text text-danger">Decreased by {{ abs($item['change']) }}%</h6>
                                @else
                                    <h6 class="card-text text-muted">No change</h6>
                                @endif
                            @else
                                <h6 class="card-text text-muted">No previous data</h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            {{-- Loop Zakat --}}
            @foreach ($datas['zakat'] as $item)
                <div class="col-md-3 stretch-card grid-margin">
                    <div class="card card-img-holder">
                        <div class="card-body">
                            <h4 class="font-weight-normal mb-3">{{ $item['label'] }}</h4>
                            <h2 class="mb-5">{{ 'Rp ' . number_format($item['value'], 0, ',', '.') }}</h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>



        

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
</div>
@endsection


