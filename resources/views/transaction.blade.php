@extends('dashboard')

@section('title', 'transaction')
@section('content')

    @for ($i = 0; $i < count($count); $i ++)
        <div class="accordion accordion-container" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        Transaction Date {{$transactionHeader[$i]->created_at}}
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

                            @foreach($trdetail as $detail)
                                @if ($detail->transaction_id == $transactionHeader[$i]->id)
                                    <tr>
                                        <td style="width: 60%;">
                                            {{$detail->product_id}}
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
                                    {{$transactionHeader[$i]->total_products}}
                                </th>
                                <th>
                                    {{$transactionHeader[$i]->total_price}}
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endfor
@endsection
