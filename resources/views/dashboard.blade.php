@extends('layout.main')
@section('content')
<div class="wrapper">
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-secondary">
                                    <img src="../assets/images/product/uang1.png" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Total Revenue</p>
                                    <h4>{{ $widget['revenue'] }}</h4>
                                </div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                    role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-secondary">
                                    <img src="../assets/images/product/uang.png" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Total Income</p>
                                    <h4>{{ $widget['income'] }}</h4>
                                </div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                    role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-secondary">
                                    <img src="../assets/images/product/3.png" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Total Product</p>
                                    <h4>{{ $widget['product'] }}</h4>
                                </div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                    role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-block card-stretch card-height-helf">
                        <div class="card-body">
                            <div class="d-flex align-items-top justify-content-between">
                                <div>
                                    <p class="mb-0 text-dark">Revenue<span id="revenue-year"></span></p>
                                    <h5 id="revenue-amount">{{ $widget['revenue'] }}</h5>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle dropdown-bg btn text-orange"
                                            id="dropdownMenuButton003" data-toggle="dropdown">
                                            Select Year<i class="ri-arrow-down-s-line ml-1 text-orange"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right shadow-none"
                                            aria-labelledby="dropdownMenuButton003">
                                            <a class="dropdown-item year-option-r" href="#" data-year="2022">2022</a>
                                            <a class="dropdown-item year-option-r" href="#" data-year="2023">2023</a>
                                            <a class="dropdown-item year-option-r" href="#" data-year="2024">2024</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="chart-revenue"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-block card-stretch card-height-helf">
                        <div class="card-body">
                            <div class="d-flex align-items-top justify-content-between">
                                <div>
                                    <p class="mb-0">Income<span id="income-year"></span></p>
                                    <h5 id="income-amount">{{ $widget['income'] }}</h5>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle dropdown-bg btn text-secondary"
                                            id="dropdownMenuButton004" data-toggle="dropdown">
                                            Select Year<i class="ri-arrow-down-s-line ml-1"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right shadow-none"
                                            aria-labelledby="dropdownMenuButton004">
                                            <a class="dropdown-item year-option-i" href="#" data-year="2022">2022</a>
                                            <a class="dropdown-item year-option-i" href="#" data-year="2023">2023</a>
                                            <a class="dropdown-item year-option-i" href="#" data-year="2024">2024</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="chart-income"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Product List</h4>
                            </div>
                            <div><a href="{{ url('/product') }}" class="btn text-secondary">View All</a></div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Profit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($widget['topProducts'] as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td style="text-align: left;">{{ $product->nama_barang }}</td>
                                            <td>
                                                <span
                                                    class="{{ $product->keuntungan < 0 ? 'badge bg-red' : 'badge bg-success' }}">
                                                    {{ 'Rp ' . number_format($product->keuntungan, 0, ',', '.') }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Total Products</h4>
                            </div>
                            <div class="card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                    <span class="dropdown-toggle dropdown-bg btn text-secondary"
                                        id="dropdownMenuButton004" data-toggle="dropdown">
                                        Select Year<i class="ri-arrow-down-s-line ml-1"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right shadow-none"
                                        aria-labelledby="dropdownMenuButton005">
                                        <a class="dropdown-item year-option-p" href="#" data-year="2022">2022</a>
                                        <a class="dropdown-item year-option-p" href="#" data-year="2023">2023</a>
                                        <a class="dropdown-item year-option-p" href="#" data-year="2024">2024</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center mt-2">
                                    <div class="d-flex align-items-center progress-order-left">
                                        <div class="progress progress-round m-0 orange conversation-bar" data-percent="46">
                                            <span class="progress-left">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <div class="progress-value text-secondary">{{ $widget['fashion'] }}</div>
                                        </div>
                                        <div class="progress-value ml-3 pr-5 border-right">
                                            <h5>Fashion</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ml-5 progress-order-right">
                                        <div class="progress progress-round m-0 primary conversation-bar" data-percent="46">
                                            <span class="progress-left">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <div class="progress-value text-primary">{{ $widget['gadget'] }}</div>
                                        </div>
                                        <div class="progress-value ml-3">
                                            <h5>Gadget</h5>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        <div class="card-body pt-0">
                            <div id="chart-product"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownItemsRevenue = document.querySelectorAll('.year-option-r');
            const revenueAmountElement = document.getElementById('revenue-amount');
            const chartContainerRevenue = document.getElementById('chart-revenue');
            let chartRevenue; // Declare chart variable for revenue chart

            dropdownItemsRevenue.forEach(item => {
                item.addEventListener('click', function (event) {
                    event.preventDefault();
                    const year = item.getAttribute('data-year');
                    fetchRevenueData(year);
                });
            });

            function fetchRevenueData(year) {
                fetch('/get-revenue-by-year', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ year: year })
                })
                    .then(response => response.json())
                    .then(data => {
                        // Update total yearly revenue
                        revenueAmountElement.innerText = data.totalYearlyRevenue;

                        // Update chart data
                        if (chartRevenue) {
                            chartRevenue.updateSeries([{
                                name: 'Monthly Revenue',
                                data: data.monthlyRevenue.map(item => parseFloat(item.revenue.replace('Rp ', '').replace(/\./g, '').replace(',', '.')))
                            }]);
                        } else {
                            renderChartRevenue(data.monthlyRevenue);
                        }
                    })
                    .catch(error => console.error('Error fetching revenue data:', error));
            }

            function renderChartRevenue(monthlyRevenue) {
                const months = monthlyRevenue.map(item => `Month ${item.month}`);
                const revenues = monthlyRevenue.map(item => parseFloat(item.revenue.replaceAll('Rp ', '').replaceAll('.', '').replaceAll(',', '.')));

                const options = {
                    series: [{
                        name: 'Monthly Revenue',
                        data: revenues
                    }],
                    colors: ['#FF7E41'],
                    chart: {
                        height: 150,
                        type: 'line',
                        zoom: {
                            enabled: false
                        },
                        dropShadow: {
                            enabled: true,
                            color: '#000',
                            top: 12,
                            left: 1,
                            blur: 2,
                            opacity: 0.2
                        },
                        toolbar: {
                            show: false
                        },
                        sparkline: {
                            enabled: true,
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    title: {
                        text: '',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            }
                        }
                    }
                };

                chartRevenue = new ApexCharts(chartContainerRevenue, options);
                chartRevenue.render();
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const dropdownItemsIncome = document.querySelectorAll('.year-option-i');
            const incomeAmountElement = document.getElementById('income-amount');
            const chartContainerIncome = document.getElementById('chart-income');
            let chartIncome;

            dropdownItemsIncome.forEach(item => {
                item.addEventListener('click', function (event) {
                    event.preventDefault();
                    const year = item.getAttribute('data-year');
                    fetchIncomeData(year);
                });
            });

            function fetchIncomeData(year) {
                fetch('/get-income-by-year', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ year: year })
                })
                    .then(response => response.json())
                    .then(data => {
                        incomeAmountElement.innerText = data.totalYearlyIncome;

                        if (chartIncome) {
                            chartIncome.updateSeries([{
                                name: 'Monthly Income',
                                data: data.monthlyIncome.map(item => parseFloat(item.income.replace('Rp ', '').replace(/\./g, '').replace(',', '.')))
                            }]);
                        } else {
                            renderChartIncome(data.monthlyIncome);
                        }
                    })
                    .catch(error => console.error('Error fetching income data:', error));
            }

            function renderChartIncome(monthlyIncome) {
                const months = monthlyIncome.map(item => `Month ${item.month}`);
                const incomes = monthlyIncome.map(item => parseFloat(item.income.replaceAll('Rp ', '').replaceAll('.', '').replaceAll(',', '.')));

                const options = {
                    series: [{
                        name: 'Monthly Income',
                        data: incomes
                    }],
                    colors: ['#01041b'],
                    chart: {
                        height: 150,
                        type: 'line',
                        zoom: {
                            enabled: false
                        },
                        dropShadow: {
                            enabled: true,
                            color: '#000',
                            top: 12,
                            left: 1,
                            blur: 2,
                            opacity: 0.2
                        },
                        toolbar: {
                            show: false
                        },
                        sparkline: {
                            enabled: true,
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    title: {
                        text: '',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            }
                        }
                    }
                };

                chartIncome = new ApexCharts(chartContainerIncome, options);
                chartIncome.render();
            }
        });

    </script>
    <!-- Script end -->
</div>
</div>
</div>
@endsection