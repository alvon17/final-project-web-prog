@extends('layout.layout')

@section('title', 'transaction')
@section('content')

    @if ($transactionHeader->count() == 0)
        <div style="text-align: center;">
            <h3>History is Empty</h3>
        </div>
    @else
        @foreach ($transactionHeader as $th)
            <div class="accordion accordion-container" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            Transaction Date {{ $th->created_at }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <table style="width: 100%;">
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Sub Price
                                    </th>
                                </tr>

                                @foreach ($trdetail as $detail)
                                    @if ($detail->transaction_id == $th->id)
                                        <tr>
                                            <td style="width: 60%;">
                                                @foreach ($products as $product)
                                                    @if ($product->id == $detail->product_id)
                                                        {{ $product->name }}
                                                    @break
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $detail->quantity }}
                                        </td>
                                        <td>
                                            {{ $detail->sub_price }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            <tr>
                                <th>
                                    Total
                                </th>
                                <th>
                                    {{ $th->total_products }}
                                </th>
                                <th>
                                    {{ $th->total_price }}
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
@endsection
