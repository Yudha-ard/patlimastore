@extends('layout.main')
@section('content')
<div class="wrapper">
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-6">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Revenue</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                                <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton005"
                                    data-toggle="dropdown">
                                    Select Year<i class="ri-arrow-down-s-line ml-1"></i>
                                </span>
                                <div class="dropdown-menu dropdown-menu-right shadow-none"
                                    aria-labelledby="dropdownMenuButtonRevenue">
                                    <a class="dropdown-item year-option-tr" href="#" data-year="2022">2022</a>
                                    <a class="dropdown-item year-option-tr" href="#" data-year="2023">2023</a>
                                    <a class="dropdown-item year-option-tr" href="#" data-year="2024">2024</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center mt-2">
                            <h5 id="total-revenue-display"></h5>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div id="chart-totalrevenue"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Income</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                                <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton005"
                                    data-toggle="dropdown">
                                    Select Year<i class="ri-arrow-down-s-line ml-1"></i>
                                </span>
                                <div class="dropdown-menu dropdown-menu-right shadow-none"
                                    aria-labelledby="dropdownMenuButtonIncome">
                                    <a class="dropdown-item year-option-ti" href="#" data-year="2022">2022</a>
                                    <a class="dropdown-item year-option-ti" href="#" data-year="2023">2023</a>
                                    <a class="dropdown-item year-option-ti" href="#" data-year="2024">2024</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center mt-2">
                            <h5 id="total-income-display"></h5>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div id="chart-totalincome"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Export Data</h4>
                        </div>
                        <a href="{{ url('/product') }}" class="btn btn-secondary-light">View Product</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-tables table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No.</th>
                                        <th>Year</th>
                                        <th>Product Sold</th>
                                        <th>Total Income</th>
                                        <th>Status</th>
                                        <th>Export</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row['year'] }}</td>
                                        <td>{{ $row['products_sold'] }}</td>
                                        <td>Rp {{ number_format($row['total_income'], 0, ',', '.') }}</td>
                                        <td>
                                            @if($row['status'] == 'done')
                                                <span class="badge badge-success">Done</span>
                                            @else
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ ($row['progress'] / 12) * 100 }}%;" aria-valuenow="{{ $row['progress'] }}" aria-valuemin="0" aria-valuemax="12">{{ $row['progress'] }}/12</div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('exportpdf', $row['year'])}}" class="btn btn-secondary">PDF</a>
                                            <a href="{{ url('report/export/excel/'.$row['year']) }}" class="btn btn-success">Excel</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->
</div>
</div>
@endsection
