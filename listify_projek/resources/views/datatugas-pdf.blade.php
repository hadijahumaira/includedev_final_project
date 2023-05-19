<!DOCTYPE html>
<html>
<head>
    <title>Data Tugas</title>
    <style>
        .table {
            @apply bg-white border-collapse w-full;
        }
        
        .table th, .table td {
            @apply border border-gray-300 py-2 px-4;
        }
        
        .table th {
            @apply bg-green-600 text-white;
        }
        
        .table tr:nth-child(even) {
            @apply bg-gray-100;
        }
        
        .table tr:hover {
            @apply bg-gray-200;
        }
    </style>
</head>
<body class="p-8">
    <h1 class="text-3xl font-bold mb-4">Data Tugas</h1>
    <table class="table">
        <thead>
            <tr>
                <th class="py-4 px-6">No</th>
                <th class="py-4 px-6">Title</th>
                <th class="py-4 px-6">Status</th>
                <th class="py-4 px-6">Deadline</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $row)
                <tr>
                    <td class="py-4 px-6">{{ $no++ }}</td>
                    <td class="py-4 px-6">{{ $row->nama }}</td>
                    <td class="py-4 px-6">{{ $row->status }}</td>
                    <td class="py-4 px-6">{{ \Carbon\Carbon::parse($row->deadline)->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>