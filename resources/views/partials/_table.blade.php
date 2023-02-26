<div style="width: 100%; overflow-x: auto;">
    <table class="table ml-auto mr-auto mt-5">
        <thead>
            <tr>
                <th>ID</abbr></th>
                <th>Invested amount</th>
                <th>Cryptocurrency</abbr></th>
                <th>Invested at</abbr></th>
                <th class="pl-5">Chart</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allContracts as $contract)
            <tr>
                <th class="pr-5 pl-5">{{ $contract->id }}</th>
                <td class="pr-5 pl-5">{{ $contract->invested_amount }}</td>
                <td class="pr-5 pl-5">{{ $contract->currency }}</td>
                <td class="pr-5 pl-5">{{ $contract->created_at->format('Y-m-d') }}</td>
                <td class="pr-5 pl-5">
                    <a class="button is-link is-light" href="/contract?contractId={{ $contract->id }}">
                        Chart
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>