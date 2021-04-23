@php
ray($games)
@endphp
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <table id="scoreboard-table" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>You</th>
                                <th>Computer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2"></div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready( function () {
        $('#scoreboard-table').DataTable();
    });
</script>
