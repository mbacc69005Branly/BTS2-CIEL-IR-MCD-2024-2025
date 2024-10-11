<div id="viewContainer">
    <div id="listView" style="display:none;">
        <table class="table table-hover rounded overflow-hidden border">
            <thead>
                <tr class="gradient-gold-5-4 text-blue-7">
                    <th>Name</th>
                    <th>Image</th>
                    @foreach($columns as $column)
                    @if(strtolower($column) != 'name')
                    <th>{{ $column }}</th>
                    @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr class="gradient-blue-6-7 align-middle">
                    <td>{{ $item->name }}</td>
                    <td>
                        <img src="{{ asset('img/' . $title . '/' . strtolower(str_replace(' ', '_', $item->name)) . '.webp') }}"
                            alt="{{ $item->name }}"
                            style="width: 50px; height: 50px; object-fit: cover;"
                            onerror="this.src='{{ asset('img/placeholder.png') }}'">
                    </td>
                    @foreach($columns as $key => $column)
                    @if(strtolower($column) != 'name')
                    <td>{{ $item->$key }}</td>
                    @endif
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="gridView" class="row m-3">
        @foreach($items as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('img/' . $title . '/' . strtolower(str_replace(' ', '_', $item->name)) . '.webp') }}"
                    class="card-img-top p-3"
                    alt="{{ $item->name }}"
                    onerror="this.src='{{ asset('img/placeholder.png') }}'">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    @foreach($columns as $key => $column)
                    @if($key != 'name')
                    <p class="card-text"><strong>{{ $column }}:</strong> {{ $item->$key }}</p>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tableViewBtn = document.getElementById('tableViewBtn');
        const gridViewBtn = document.getElementById('gridViewBtn');
        const listView = document.getElementById('listView');
        const gridView = document.getElementById('gridView');

        tableViewBtn.addEventListener('click', function() {
            listView.style.display = 'block';
            gridView.style.display = 'none';
            tableViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
        });

        gridViewBtn.addEventListener('click', function() {
            listView.style.display = 'none';
            gridView.style.display = 'flex';
            gridViewBtn.classList.add('active');
            tableViewBtn.classList.remove('active');
        });

        if($viewMode == "grid")
            gridViewBtn.click();
        else
            tableViewBtn.click();
    });
</script>