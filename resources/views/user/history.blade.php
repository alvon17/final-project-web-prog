@extends('layout.layout')

@section('title', 'transaction')
@section('content')

    @if (count($count) == 0)
        <div style="text-align: center;">
            <h3>History is Empty</h3>
        </div>
    @else
        @php $j = $count[0]-1 @endphp
        @for ($i = 0; $i < count($count); $i ++)
            <div class="accordion accordion-container" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            Transaction Date {{$transactionHeader[$j] ->created_at}}
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

                                @foreach($transactionDetail as $detail)
                                    @if ($detail->transaction_id == $transactionHeader[$j]->id)
                                        <tr>
                                            <td style="width: 60%;">
                                                @foreach ($products as $product)
                                                    @if ($detail->product_id == $product->id)
                                                        {{$product->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                {{$detail->quantity}}
                                            </td>
                                            <td>
                                                {{$detail->sub_price}}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                                <tr>
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        {{$transactionHeader[$j]->total_products}}
                                    </th>
                                    <th>
                                        {{$transactionHeader[$j]->total_price}}
                                    </th>
                                </tr>
                                @php $j++ @endphp
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    @endif
@endsection
