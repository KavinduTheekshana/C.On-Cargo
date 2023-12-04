@if ($invoices->isNotEmpty())
    <h5 class="card-header">Customer Shipments</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Date</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $invoice->date }}</td>
                        <td>{{ $invoice->sender->country }}</td>
                        <td>{{ $invoice->receiver->country }}</td>
                        <td>{{ $invoice->total_fee }}</td>
                        <td>
                            <a type="button" href="{{ route('invoice.preview', ['id' => $invoice->id]) }}" title="Invoice" target="_blank"
                                class="btn btn-icon btn-primary btn-fab demo waves-effect waves-light m-1">
                                <i class="tf-icons mdi mdi-file-document-outline"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>No invoices available for this customer.</p>
@endif
